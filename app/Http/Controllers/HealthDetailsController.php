<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HealthDetails;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HealthDetailsController extends Controller
{
    /**
     * Display a listing of the health details.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $healthDetails = HealthDetails::where('userId', $user->id)->get();

        return view('health-details.index', compact('healthDetails', 'user'));
    }

    /**
     * Store a newly created health detail in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addHealthData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required|exists:users,id',
            'physical_disability' => 'required',
            'health_insurance' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()
            ]);
        }

        HealthDetails::create([
            'userId' => $request->input('userId'),
            'physical_disability' => $request->input('physical_disability'),
            'blood_group' => $request->input('blood_group'),
            'illness_history' => $request->input('illness_history'),
            'health_insurance' => $request->input('health_insurance'),
            'insur_name' => $request->input('insur_name'),
            'insur_no' => $request->input('insur_no'),
            'allergies' => $request->input('allergies'),
            'delete_status' =>0,
        ]);

        return redirect()->route('health-details.index')->with('success', 'Health details added successfully.');
    }

    public function edit(string $id){
        $healthData = HealthDetails::findOrFail($id);
        return view('health-details.edit', compact('healthData'));
    }

 public function updateHealthDetails(Request $request, string $id){

    $validator = Validator::make($request->all(),[
        'physical_disability' => 'required',
        'health_insurance' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 400,
            'errors' => $validator->errors(),
        ]);
    }

    $healthData = HealthDetails::findOrFail($id);
     $healthData->update([
        'physical_disability' => $request->input('physical_disability'),
        'blood_group' => $request->input('blood_group'),
        'illness_history' => $request->input('illness_history'),
        'health_insurance' => $request->input('health_insurance'),
        'insur_name' => $request->input('insur_name'),
        'insur_no' => $request->input('insur_no'),
        'allergies' => $request->input('allergies'),
    ]);
    Alert::success('Health detail Updated successful','Health details updated');
    return redirect()->route('health-details.index')->with('success', 'Department updated successfully.');

 }

 public function deleteHealthData(string $id){
    $health = HealthDetails::find($id);

    if(!$health){
        return response()->json([
            'status' => 400,
            'massage' => ' Health detail not found',
        ]);
    }

    $health->update([
        'delete_status' => 1
    ]);
 }

}

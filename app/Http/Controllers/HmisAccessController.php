<?php

namespace App\Http\Controllers;

use App\Models\HMISAccessLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HmisAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hmis = HMISAccessLevel::where('delete_status',0)->get();
        return view('hmis-access.index', compact('hmis'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hmis-access.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'names' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'stauss' => 400,
                'errors' => $validator->errors(),
                ]);
        }

        $hmisCheck = HMISAccessLevel::where('names',$request->name)->first();
         if($hmisCheck){
            return response()->json([
                'status' => 400,
                'message' => 'HMIS access  is already exist',
                'data' => $request->all()
            ]);  
         }

         $hmis = HMISAccessLevel::create([
            'names' => $request->input('names'),
            'status' => $request->input('status'),
            'delete_status' => 0,
         ]);
         Alert::success('HMIS added successful','HMIS added');
         return redirect()->route('hmis.index')->with('success', 'HMIS access added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hmis = HMISAccessLevel::findOrFail($id);
        return view('hmis-access.edit', compact('hmis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'names' => 'required',
            'status' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'names' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        $hmis = HMISAccessLevel::findOrFail($id);
        $hmis->update([
            'names' => $request->input('names'),
            'status' => $request->input('status'),
        ]);

        Alert::success('HMIS updated Successful','HMIS updated');
        return redirect()->route('hmis.index')->with('success', 'HMIS access updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dept = HMISAccessLevel::find($id);

    if (!$dept) {
        return response()->json([
            'status' => 404,
            'message' => 'Hmis access not found',
        ]);
    }

    $dept->update([
        'delete_status' => 1
    ]);

    return redirect()->route('hmis.index')->with('success', 'Hmis access deleted successfully.');
    }
}

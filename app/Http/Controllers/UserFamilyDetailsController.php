<?php

namespace App\Http\Controllers;

use App\Models\HealthDetails;
use App\Models\UserFamilyDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserFamilyDetailsController extends Controller
{
    public function profileFamily(){
        $user = Auth::user();
        $familyData = UserFamilyDetails::where('userId', $user->id)->get();
        
        return view('user_info.profile', compact('user','familyData'));
    }

    // public function addFamilyData(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'full_name' => 'required',
    //         'relationship' => 'required',
    //         'userId' => 'required|exists:users,id',   
    //     ]);

    //     if($validator->fails()){
    //         return response()->json([
    //             'status' => 400,
    //             'error' => $validator->errors()
    //         ]);
    //     }

    //     $familyData = UserFamilyDetails::create([
    //         'full_name' => $request->input('full_name'),
    //         'relationship' => $request->input('relationship'),
    //         'phone_number' => $request->input('phone_number'),
    //         'email' => $request->input('email'),
    //         'occupation' => $request->input('occupatiuon'),
    //         'userId' => $request->input('userId')
    //     ]);
    //     return redirect()->route('profile')->with('success', 'Family Data added successfully.');

    // }

    public function addFamilyData(Request $request) {
        $validator = Validator::make($request->all(), [
            'userId' => 'required|exists:users,id',
            'familyData' => 'required|array|min:2|max:5',
            'familyData.*.full_name' => 'required|string|max:255',
            'familyData.*.relationship' => 'required|string|max:255',
            
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()
            ]);
        }
    
        $userId = $request->input('userId');
        $familyData = $request->input('familyData');
    
        foreach ($familyData as $data) {
            UserFamilyDetails::create([
                'userId' => $userId,
                'full_name' => $data['full_name'],
                'relationship' => $data['relationship'],
                'DOB' => $data['DOB'],
                'phone_number' => $data['phone_number'],
                'occupation' => $data['occupation'] ?? null,
            ]);
        }
    
        return redirect()->route('profile')->with('success', 'Family members added successfully');
    }

    public function addHealthData(Request $request){
     $validator = Validator::make($request->all(), [
        'userId' => 'required|exists:users,id',
        'physical_disability' => 'required',
        'health_insurance' => 'required',
        'allergies' => 'allergies',
     ]);

     $health = HealthDetails::create([
       'physical_disability' => $request->input('physical_disability'),
       'blood_group' => $request->input('blood_group'),
       'illness_history' => $request->input('illness_history'),
       'health_insurance' => $request->input('health_insurance'),
       'insur_name' => $request->input('insur_name'),
       'insur_no' => $request->input('insur_no'),
       'allergies' => $request->input('allergies'),
       'userId' => $request->input('userId'),

     ]);
     return redirect()->route('profile')->with('success', 'heath details added successfully.');

    }

    public function addLanguage(Request $request){
        
    }
    
}

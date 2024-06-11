<?php

namespace App\Http\Controllers;

use App\Models\HMISAccessLevel;
use Illuminate\Http\Request;

class HmisAccessController extends Controller
{
    //
    public function index(){
        $nhif = HMISAccessLevel::all();

        return response()->json([
            'status' => 200,
            'message' => 'Hmis Access List',
            'data' => $nhif
        ]);
        
    }

    public function addQualification(Request $request){
    $valid = HMISAccessLevel::make($request->all(),[
      'names' => 'required',
      'status' => 'required'
    ]); 

    $nhifCheck = HMISAccessLevel::where('names', $request->names)->first();
    if ($nhifCheck) {
        return response()->json([
            'status' => 400,
            'message' => 'This Hmis Access is already exists in the system',
            'data' => $request->all()
        ], 400);
    } 
     $nhif = HMISAccessLevel::create([
        'names' => $request->input('names'),
        'status' => $request->input('status'),
     ]);

     return response()->json([
        'status' => 200,
        'message' => 'Hmis Access is added successfull',
        'data' => $nhif
    ]);
   }

   public function updateNhifQual(Request $request){
    $dept = HMISAccessLevel::find($request->id);
     if(!$dept){
         return response()->json([
             'status' => 400,
             'message' => 'Hmis Access could not found',
             'data' => ''
         ]);
     }
       HMISAccessLevel::where('id',$request->id)->update([
         'names' => $request->names,
         'status' => $request->status,
       ]);

       return response()->json([
         'status' => 200,
         'message' => 'Hmis Access updated successfull',
         'data' => $dept
       ]);
 }
}

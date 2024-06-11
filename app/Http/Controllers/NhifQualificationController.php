<?php

namespace App\Http\Controllers;

use App\Models\NhifQualification;
use Illuminate\Http\Request;

class NhifQualificationController extends Controller
{
    //List all NHIF Qualification
    public function index(){
        $nhif = NhifQualification::all();

        return response()->json([
            'status' => 200,
            'message' => 'NHIF Qualification List',
            'data' => $nhif
        ]);
        
    }

    public function addQualification(Request $request){
    $valid = NhifQualification::make($request->all(),[
      'names' => 'required',
      'status' => 'required'
    ]); 

    $nhifCheck = NhifQualification::where('names', $request->names)->first();
    if ($nhifCheck) {
        return response()->json([
            'status' => 400,
            'message' => 'This NHIF Qualification is already exists in the system',
            'data' => $request->all()
        ], 400);
    } 
     $nhif = NhifQualification::create([
        'names' => $request->input('names'),
        'status' => $request->input('status'),
     ]);

     return response()->json([
        'status' => 200,
        'message' => 'NHIF Qualification is added successfull',
        'data' => $nhif
    ]);
   }

   public function updateNhifQual(Request $request){
    $dept = NhifQualification::find($request->id);
     if(!$dept){
         return response()->json([
             'status' => 400,
             'message' => 'NHIF Qualification could not found',
             'data' => ''
         ]);
     }
       NhifQualification::where('id',$request->id)->update([
         'names' => $request->names,
         'status' => $request->status,
       ]);

       return response()->json([
         'status' => 200,
         'message' => 'NHIF Qualification updated successfull',
         'data' => $dept
       ]);
 }
}

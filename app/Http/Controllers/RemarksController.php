<?php

namespace App\Http\Controllers;

use App\Models\Remark;
use Illuminate\Http\Request;

class RemarksController extends Controller
{
    //

    public function index(){
        $remark = Remark::all();

        return response()->json([
            'status' => 200,
            'message' => 'Remark List',
            'data' => $remark
        ]);
        
    }

    public function addRemark(Request $request){
    $valid = Remark::make($request->all(),[
      'rmk_name' => 'required',
      'status' => 'required'
    ]); 

    $remarkCheck = Remark::where('rmk_name', $request->rmk_name)->first();
    if ($remarkCheck) {
        return response()->json([
            'status' => 400,
            'message' => 'This Remark is already exists in the system',
            'data' => $request->all()
        ], 400);
    } 
     $remark = Remark::create([
        'rmk_name' => $request->input('rmk_name'),
        'status' => $request->input('status'),
     ]);

     return response()->json([
        'status' => 200,
        'message' => 'Remark is added successfull',
        'data' => $remark
    ]);
   }

   public function updateRemark(Request $request){
    $remark = Remark::find($request->id);
     if(!$remark){
         return response()->json([
             'status' => 400,
             'message' => 'Remark could not found',
             'data' => ''
         ]);
     }
     Remark::where('id',$request->id)->update([
         'rmk_name' => $request->names,
         'status' => $request->status,
       ]);

       return response()->json([
         'status' => 200,
         'message' => 'Remark level updated successfull',
         'data' => $remark
       ]);
 }
}

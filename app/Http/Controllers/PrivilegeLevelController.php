<?php

namespace App\Http\Controllers;

use App\Models\PrivilegeLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrivilegeLevelController extends Controller
{
    //
    public function index(){
        $priv = PrivilegeLevel::all();

        return response()->json([
            'status' => 200,
            'message' => 'Privilege List',
            'data' => $priv
        ]);
        
    }

    public function addPrivilege(Request $request){
    $valid = Validator::make($request->all(),[
      'prv_name' => 'required',
      'pvr_status' => 'required'
    ]); 

    $privCheck = PrivilegeLevel::where('prv_name', $request->prv_name)->first();
    if ($privCheck) {
        return response()->json([
            'status' => 400,
            'message' => 'This Privilege is already exists in the system',
            'data' => $request->all()
        ], 400);
    } 
     $priv = PrivilegeLevel::create([
        'prv_name' => $request->input('prv_name'),
        'pvr_status' => $request->input('pvr_status'),
     ]);

     return response()->json([
        'status' => 200,
        'message' => 'Privilege is added successfull',
        'data' => $priv
    ]);
   }

   public function updatePrivilege(Request $request){
    $priv = PrivilegeLevel::find($request->id);
     if(!$priv){
         return response()->json([
             'status' => 400,
             'message' => 'Privilege could not found',
             'data' => ''
         ]);
     }
     PrivilegeLevel::where('id',$request->id)->update([
         'prv_name' => $request->names,
         'prv_status' => $request->pvr_status,
       ]);

       return response()->json([
         'status' => 200,
         'message' => 'Privilege level updated successfull',
         'data' => $priv
       ]);
 }
}

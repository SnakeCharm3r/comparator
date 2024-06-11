<?php

namespace App\Http\Controllers;

use App\Models\IctAccess;
use App\Models\IctAccessResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IctAccessController extends Controller
{
   
    //
    public function __construct(){
        
    }

    public function index(){
        $ict = IctAccessResource::all();

        return response()->json([
            'status' => 200,
            'message' => 'ICT Form List',
            'data' => $ict
        ]);
        
    }

    public function addIctForm(Request $request){
    $valid = Validator::make($request->all(),[
      'remarkId' => 'required',
      'privilegeId' => 'required',
      'email' => 'required',
      'userId' => 'required',
      'hmisId' => 'required',
      'active_drt' => 'required'
   
      
    ]); 

    // $ictCheck = IctAccessResource::where('rmk_name', $request->rmk_name)->first();
    // if ($ictCheck) {
    //     return response()->json([
    //         'status' => 400,
    //         'message' => 'This Remark is already exists in the system',
    //         'data' => $request->all()
    //     ], 400);
    // } 
     $remark = IctAccessResource::create([
        'rmk_name' => $request->input('rmk_name'),
        'status' => $request->input('status'),
     ]);

     return response()->json([
        'status' => 200,
        'message' => 'Remark is added successfull',
        'data' => $remark
    ]);
   }

  
}

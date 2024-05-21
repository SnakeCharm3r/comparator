<?php

namespace App\Http\Controllers;

use App\Models\EmploymentTypes;
use Illuminate\Http\Request;

class EmploymentTypesController extends Controller
{
    public function index(){
        $emp = EmploymentTypes::all();

        return response()->json([
            'status'=> 200,
            'message' => 'employment type list',
            'data' => $emp
        ]);
    }

    public function addEmploymentType(Request $request){
        $validator = EmploymentTypes::make($request->all(), [
            'employment_type' => 'required',
            'description' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors' => $validator->errors()
            ]);
        }

        $emptype= EmploymentTypes::create([
            'employment_type' =>  $request->input('employment_type'),
            'description' =>  $request->input('description'),
        ]);

          return response()->json([
            'status' => 200,
            'message' => 'Employment Type is added successfull',
            'data' => $emptype,
          ]);
    }
}

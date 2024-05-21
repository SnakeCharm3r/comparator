<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $depart = Departments::all();
        
        return response()->json([
            'status' => 200,
            'message' => 'department list',
            'data' => $depart
        ]);
    }

    public function addDepartment(Request $request){
        $validator = Departments::make($request->all(), [
            'dept_name' => 'required',
            'description' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        $deptCheck = Departments::where('dept_name', $request->dept_name)->first();
         if($deptCheck){
            return response()->json([
                'status' => 400,
                'message' => 'Departments is already exist',
                'data' => $request->all()
            ]);

            $depart = Departments::create([
                'dept_name' => $request->input('dept_name'),
                'description' => $request->input('description'),
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'department is added successfull',
                'data' => $depart
            ]);

        }
    }

    public function updateDepartment(Request $request){
       $dept = Departments::find($request->id);
        if(!$dept){
            return response()->json([
                'status' => 400,
                'message' => 'Department could not found',
                'data' => ''
            ]);
        }
          Departments::where('id',$request->id)->update([
            'dept_name' => $request->dept_name,
            'description' => $request->description,
          ]);

          return response()->json([
            'status' => 200,
            'message' => 'departments updated successfull',
            'data' => $dept
          ]);
    }
}

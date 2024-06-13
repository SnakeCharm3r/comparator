<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Departments::all();
        return view('department.index', compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

          }
        $dept = Departments::create([
            'dept_name' => $request->input('dept_name'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('department.index')->with('success', 'Department added successfully.');



//        return response()->json([
//            'status' => 200,
//            'message' => 'department is added successfull',
//            'data' => $dept
//        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

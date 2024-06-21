<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Departments::where('delete_status', 0)->get();
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
            'delete_status' => 0, 
        ]);
        Alert::success('Department added successful','Department Added');
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
        $department = Departments::findOrFail($id);
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'dept_name' => 'required',
            'description' => 'required',
        ]);
    
        $validator = Validator::make($request->all(), [
            'dept_name' => 'required',
            'description' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }
    
        $department = Departments::findOrFail($id);
        $department->update([
            'dept_name' => $request->input('dept_name'),
            'description' => $request->input('description'),
        ]);
    
        Alert::success('Department Updated successful','Department updated');
        return redirect()->route('department.index')->with('success', 'Department updated successfully.');
    }

    /**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    $dept = Departments::find($id);

    if (!$dept) {
        return response()->json([
            'status' => 404,
            'message' => 'Department not found',
        ]);
    }

    $dept->update([
        'delete_status' => 1
    ]);

    return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
}


    // public function softDelete(Request $request)
    // {
    //     $dept = Departments::find($request->id);
    
    //     if (!$dept) {
    //         return response()->json([
    //             'status' => 404,
    //             'message' => 'Department not found',
    //         ]);
    //     }
    
    //     $dept->update([
    //         'delete_status' => 1
    //     ]);
    
    //     return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
    // }    
    
}

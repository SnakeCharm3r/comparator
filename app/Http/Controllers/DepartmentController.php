<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index1()
    {
        $departments = Departments::where('delete_status', 0)->get();
        return view('department.index', compact('departments'));

    }

    public function index()
    {
        $departments = DB::table('departments')
            ->leftJoin('users', 'departments.id', '=', 'users.deptId')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select(
                'departments.id as dept_id',
                'departments.dept_name',
                'departments.description',
                'departments.delete_status',
                DB::raw('CONCAT(users.fname, " ", users.lname) as head_of_department')
            )
            ->where('departments.delete_status', 0)
            ->where(function($query) {
                $query->whereNull('roles.name')
                      ->orWhere('roles.name', 'line-manager');
            })
            ->get();

        return view('department.index', compact('departments'));
    }

    // public function index1(){
    //     $sops = DB::table('sops')->join('departments',
    //     'sops.deptId', '=', 'departments.id')
    //     ->select(
    //         'sops.*', 'departments.dept_name'
    //     )->get();
    //     return view('sops.index', compact('sops'));
    // }

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

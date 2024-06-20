<?php

namespace App\Http\Controllers;

use App\Models\EmploymentTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmploymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp = EmploymentTypes::where('delete_status', 0)->get();

        return view('employment-type.index', compact('emp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employment-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employment_type' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error' > $request->errors(),
                ]);
        }

        $empCheck = EmploymentTypes::where('employment_type',$request->employment_type)->first();
         if($empCheck){
            return response()->json([
                'status' => 400,
                'message' => 'Employment type is already exist',
                'data' => $request->all()
            ]);  
         }

         $emp = EmploymentTypes::create([
            'employment_type' => $request->input('employment_type'),
            'description' => $request->input('description'),
            'delete_status' => 0
         ]);

         return redirect()->route('employment.index')->with('success', 'Employment type added successfully.');

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
        $emp = EmploymentTypes::findOrFail($id);
        
        return view('employment-type.edit', compact('emp'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'employment_type' => 'required',
            'description' => 'required',
        ]);
    
        $validator = Validator::make($request->all(), [
            'employment_type' => 'required',
            'description' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }
    
        $empl = EmploymentTypes::findOrFail($id);
        $empl->update([
            'employment_type' => $request->input('employment_type'),
            'description' => $request->input('description'),
        ]);
    
       
        return redirect()->route('employment.index')->with('success', 'Employment type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = EmploymentTypes::find($id);

    if (!$emp) {
        return response()->json([
            'status' => 404,
            'message' => 'Employmeny type not found',
        ]);
    }

    $emp->update([
        'delete_status' => 1
    ]);

    return redirect()->route('employment.index')->with('success', 'Employment type deleted successfully.');
    }
    
}

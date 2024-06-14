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
        $emp = EmploymentTypes::all();

        return view('employment.index', compact('employmentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employment.create');
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
                'stauss' => 400,
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
        
        return view('employment.edit', compact('employment'));

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
        //
    }
}

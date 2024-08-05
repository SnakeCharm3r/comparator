<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sop;
use App\Models\User;
use App\Models\Departments;
class SopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sops = Sop::all();
        return view('sops.index', compact('sops'));
    }

    public function create()
    {
        $departments = Departments::all();
        return view('sops.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deptId' => 'nullable|integer|',
        ]);

        Sop::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'dept_name' => $request->input('dept_name'),
        ]); dd(123);

        return redirect()->route('sops.index')->with('success', 'SOP created successfully.');   
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
        $sop = SOP::findOrFail($id);
        $departments = Departments::all();
        return view('sops.edit', compact('sop', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'department_id' => 'required|exists:departments,id',
        ]);

      

        return redirect()->route('sops.index')->with('success', 'SOP updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('sops.index')->with('success', 'SOP deleted successfully.');   
     }
}

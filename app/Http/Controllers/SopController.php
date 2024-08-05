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

         $sops = SOP::with('department')->get();  
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
            'deptId' => 'required|integer',
            'pdf' => 'required|file|mimes:pdf|max:2048',
        ]);
    
        // Handle the file upload
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
        }
    
        // Create the SOP record
        $sop = new Sop();
        $sop->title = $request->title;
        $sop->deptId = $request->deptId;
        $sop->pdf_path = $pdfPath; // Save the file path
        $sop->save();
    
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deptId' => 'required|exists:departments,id',
            'pdf_path' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $sop = SOP::findOrFail($id);
        $sop->title = $request->input('title');
        $sop->deptId = $request->input('deptId');

        if ($request->hasFile('pdf_path')) {
            // Handle PDF upload
            $pdfPath = $request->file('pdf_path')->store('pdfs', 'public');
            $sop->pdf_path = $pdfPath;
        }

        $sop->save();

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

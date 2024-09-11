<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sop;
use App\Models\User;
use App\Models\Departments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SopController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    // public function index(){
    //     $sops = DB::table('sops')->join('departments',
    //     'sops.deptId', '=', 'departments.id')
    //     ->select(
    //         'sops.*', 'departments.dept_name'
    //     )->get();
    //     return view('sops.index', compact('sops'));
    // }

    public function index()
{
    $sops = DB::table('sops')
        ->join('departments', 'sops.deptId', '=', 'departments.id')
        ->select('sops.*', 'departments.dept_name')
        ->paginate(15); // Adjust the number of items per page

    return view('sops.index', compact('sops'));
}


    public function create()
    {
        $departments = Departments::all();
        return view('sops.create', compact('departments'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'deptIds' => 'required|array',
            'deptIds.*' => 'integer', // Ensure each item in the array is an integer
            'pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
        }

        // Get selected department IDs
        $selectedDeptIds = $request->input('deptIds');

        // If "All" is selected, fetch all departments
        if (in_array('all', $selectedDeptIds)) {
            $departments = Departments::all();
            $selectedDeptIds = $departments->pluck('id')->toArray(); // Use all department IDs
        } else {
            // Fetch departments based on selected IDs
            $departments = Departments::whereIn('id', $selectedDeptIds)->get();
        }

        // Create the SOP record for each selected department
        foreach ($departments as $department) {
            $sop = new Sop();
            $sop->title = $request->title;
            $sop->deptId = $department->id;
            $sop->pdf_path = $pdfPath; // Save the file path
            $sop->save();
        }

        return redirect()->route('sops.index')->with('success', 'SOP created successfully.');
    }




    public function show(string $id)
    {

    }

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

    public function sops()
    {
        $user = auth()->user();
        $sops = DB::table('sops')
            ->join('departments', 'sops.deptId', '=', 'departments.id')
            ->where('departments.id', $user->deptId) // Filter by user's department
            ->select('sops.*', 'departments.dept_name')
            ->get();

        return view('sops.show', compact('sops'));
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sop = Sop::findOrFail($id);

        if ($sop->pdf_path && Storage::exists('public/' . $sop->pdf_path)) {
            Storage::delete('public/' . $sop->pdf_path);
        }

        $sop->delete();

        return redirect()->route('sops.index')->with('success', 'SOP deleted successfully.');
    }

}

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
    public function index(){
        $sops = DB::table('sops')->join('departments',
        'sops.deptId', '=', 'departments.id')
        ->select(
            'sops.*', 'departments.dept_name'
        )->get();
        return view('sops.index', compact('sops'));
    }

    public function create()
    {
        $departments = Departments::all();
        return view('sops.create', compact('departments'));
    }


public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'deptId' => 'required',
        'pdf' => 'required|mimes:pdf|max:10000',
    ]);

    // Handle file upload
    if ($request->hasFile('pdf')) {
        $pdfPath = $request->file('pdf')->store('sops', 'public');
    }

    if ($request->deptId === 'all') {
        // Logic to associate SOP with all departments
        $departments = Departments::all();
        foreach ($departments as $department) {
            Sop::create([
                'title' => $request->title,
                'deptId' => $department->id,
                'pdf_path' => $pdfPath,
            ]);
        }
    } else {
        // Logic to associate SOP with a single department
        Sop::create([
            'title' => $request->title,
            'deptId' => $request->deptId,
            'pdf_path' => $pdfPath,
        ]);
    }

    return redirect()->route('sops.index')->with('success', 'SOP saved successfully.');
}

    public function show(string $id)
    {
        
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

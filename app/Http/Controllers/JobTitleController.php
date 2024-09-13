<?php

namespace App\Http\Controllers;
use App\Models\JobTitle;
use App\Models\Department;
use App\Models\Departments;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    
    public function index()
    {
        $jobTitles = JobTitle::with('department')->get();
        $departments = Departments::all();
        return view('job_titles.index', compact('jobTitles', 'departments'));
    }

    public function create()
    {
        $departments = Departments::all();
        $jobTitles = JobTitle::all();
        return view('job_titles.create', compact('departments','jobTitles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'deptId' => 'required|exists:departments,id',
        ]);

        JobTitle::create($request->all());
        return redirect()->route('job_titles.index')->with('success', 'Job Title created successfully.');
    }

    public function edit(JobTitle $jobTitle)
    {
        $departments = Departments::all();
        return view('job_titles.edit', compact('jobTitle', 'departments'));
    }

    public function update(Request $request, JobTitle $jobTitle)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'deptId' => 'required|exists:departments,id',
        ]);
    
        // Update the job title
        $jobTitle->update([
            'job_title' => $request->job_title,
            'deptId' => $request->deptId,
        ]);
    
        return redirect()->route('job_titles.index')->with('success', 'Job Title updated successfully.');
    }
    

    public function destroy(JobTitle $jobTitle)
    {
        $jobTitle->delete();
        return redirect()->route('job_titles.index')->with('success', 'Job Title deleted successfully.');
    }
}

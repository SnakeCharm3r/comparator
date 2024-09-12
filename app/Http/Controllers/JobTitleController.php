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
        return view('job_titles.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
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
            'title' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $jobTitle->update($request->all());
        return redirect()->route('job_titles.index')->with('success', 'Job Title updated successfully.');
    }

    public function destroy(JobTitle $jobTitle)
    {
        $jobTitle->delete();
        return redirect()->route('job_titles.index')->with('success', 'Job Title deleted successfully.');
    }
}

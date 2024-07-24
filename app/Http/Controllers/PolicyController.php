<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;
use Illuminate\Support\Facades\Storage;

class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::all();
        return view('policies.index', compact('policies'));
    }

    public function create()
    {
        return view('policies.create');
    }

    public function user()
    {
        $policies = Policy::all();
        return view('policies.user', ['policies' => $policies]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Initialize $pdfPath to null
        $pdfPath = null;

        // Handle file upload
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
        }

        // Create new policy
        Policy::create([
            'title' => $request->title,
            'pdf_path' => $pdfPath,
        ]);

        return redirect()->route('policies.index')->with('success', 'Policy created successfully.');
    }

    public function show(Policy $policy)
    {
        return view('policies.show', compact('policy'));
    }

    public function edit(Policy $policy)
    {
        return view('policies.edit', compact('policy'));
    }

    public function update(Request $request, Policy $policy)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('pdf')) {
            // Delete the old PDF if it exists
            if ($policy->pdf_path) {
                Storage::disk('public')->delete($policy->pdf_path);
            }

            // Store the new PDF
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
            $policy->pdf_path = $pdfPath;
        }

        // Update policy title
        $policy->title = $request->title;
        $policy->save();

        return redirect()->route('policies.index')->with('success', 'Policy updated successfully.');
    }

    public function destroy(Policy $policy)
    {
        // Delete the PDF file if it exists
        if ($policy->pdf_path) {
            Storage::disk('public')->delete($policy->pdf_path);
        }

        // Delete the policy record
        $policy->delete();

        return redirect()->route('policies.index')->with('success', 'Policy deleted successfully.');
    }

    public function accept(Request $request)
    {
        $request->user()->update(['accepted_policies' => true]);
        return redirect()->route('home');
    }
}

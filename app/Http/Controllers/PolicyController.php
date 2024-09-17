<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Policy;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;

class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::all();
        return view('policies.index', compact('policies'));
    }

    public function user()
    {
        $policies = Policy::all();
        $user = auth()->user();
        return view('policies.user', ['policies' => $policies,'user' => $user]);
    }
    public function create()
    {
        return view('policies.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string|max:20000',
    //     ]);

    //     Policy::create($request->all());

    //     return redirect()->route('policies.index')->with('success', 'Policy created successfully.');
    // }
    public function store(Request $request)
{
    // dd($request->all()); // This will dump the request data and halt the process
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string|max:20000',
    ]);

    Policy::create($request->all());

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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $policy->update($request->all());

        return redirect()->route('policies.index')->with('success', 'Policy updated successfully.');
    }

    public function destroy(Policy $policy)
    {
        $policy->delete();
        return redirect()->route('policies.index')->with('success', 'Policy deleted successfully.');
    }

    public function accept(Request $request)
    {
        $request->user()->update(['accepted_policies' => true]);
        return redirect()->route('home');
    }



    public function downloadPolicy(Request $request)
    {
        // Validate the request
        $request->validate([
            'policy_id' => 'required|integer|exists:policies,id',
        ]);
    
        // Find the policy
        $policy = Policy::findOrFail($request->input('policy_id'));
    
        // Get the authenticated user
        $user = auth()->user();
    
        // Generate PDF
        $pdf = PDF::loadView('pdf.index', [
            'policy' => $policy,
            'user' => $user,
        ]);
    
        // Download PDF
        return $pdf->download($policy->title . '.pdf');
    }
    
    
}
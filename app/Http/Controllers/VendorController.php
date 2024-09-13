<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('vendors.index', compact('vendors'));
    }

    public function create()
    {
        return view('vendors.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'business_owner' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'telephone_number' => 'required|string|max:15',
            'email_address' => 'required|string|email|max:255|unique:vendors',
            'physical_address' => 'required|string|max:255',
            'contract_file' => 'nullable|file|mimes:pdf,doc,docx',
            // Additional validations
            'contract_total_value' => 'nullable|numeric',
            'duration_years' => 'nullable|integer',
            'likelihood_rating' => 'nullable|integer',
            'impact_rating' => 'nullable|integer',
            'overall_risk_score' => 'nullable|integer',
            // other fields...
        ]);
    
        // Handle file upload
        if ($request->hasFile('contract_file')) {
            $validatedData['contract_file'] = $request->file('contract_file')->store('contracts');
        }
    
        // Create a new vendor
        $vendor = Vendor::create($validatedData);
    
        // Redirect with success message
        Alert::success('Vendor Added successfully', 'Vendor Added');
        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully.');
    }
    

    public function show(Vendor $vendor)
    {
        return view('vendors.show', compact('vendor'));
    }

    public function edit(Vendor $vendor)
    {
        return view('vendors.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:vendors,email,' . $vendor->id,
            'address' => 'required|string|max:255',
            'contract_file' => 'nullable|file|mimes:pdf,doc,docx',
            'contract_start_date' => 'required|date',
            'contract_end_date' => 'required|date|after:contract_start_date',
        ]);

        $vendor->update($request->all());

        if ($request->hasFile('contract_file')) {
            $vendor->contract_file = $request->file('contract_file')->store('contracts');
        }

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully.');
    }
}
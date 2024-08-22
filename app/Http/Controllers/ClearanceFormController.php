<?php

namespace App\Http\Controllers;

use App\Models\ClearanceForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ClearanceFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // $forms = ClearanceForm::with('user')->get();
        return view('clearance.index', compact( 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clearance.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'date' => 'required|date',
        ]);

        // Create a new Clearance record
        $clearance = new ClearanceForm();
        $clearance->userId = $request->input('userId');
        $clearance->date = $request->input('date');
        $clearance->ccbrt_id_card = $request->input('ccbrt_id_card', 'N/A');
        $clearance->ccbrt_name_tag = $request->input('ccbrt_name_tag', 'N/A');
        $clearance->nhif_cards = $request->input('nhif_cards', 'N/A');
        $clearance->work_permit_cancelled = $request->input('work_permit_cancelled', 'N/A');
        $clearance->residence_permit_cancelled = $request->input('residence_permit_cancelled', 'N/A');
        $clearance->repaid_salary_advance = $request->input('repaid_salary_advance', 'N/A');
        $clearance->loan_balances_informed = $request->input('loan_balances_informed', 'N/A');
        $clearance->repaid_outstanding_imprest = $request->input('repaid_outstanding_imprest', 'N/A');
        $clearance->changing_room_keys = $request->input('changing_room_keys', 'N/A');
        $clearance->office_keys = $request->input('office_keys', 'N/A');
        $clearance->mobile_phone = $request->input('mobile_phone', 'N/A');
        $clearance->camera = $request->input('camera', 'N/A');
        $clearance->ccbrt_uniforms = $request->input('ccbrt_uniforms', 'N/A');
        $clearance->office_car_keys = $request->input('office_car_keys', 'N/A');
        $clearance->other_items = $request->input('other_items');
        $clearance->laptop_returned = $request->input('laptop_returned', 'No');
        $clearance->access_card_returned = $request->input('access_card_returned', 'No');
        $clearance->domain_account_disabled = $request->input('domain_account_disabled', 'No');
        $clearance->email_account_disabled = $request->input('email_account_disabled', 'No');
        $clearance->telephone_pin_disabled = $request->input('telephone_pin_disabled', 'No');
        $clearance->openclinic_account_disabled = $request->input('openclinic_account_disabled', 'No');
        $clearance->sap_account_disabled = $request->input('sap_account_disabled', 'No');
        $clearance->aruti_account_disabled = $request->input('aruti_account_disabled', 'No');

        // Save the clearance record to the database
        $clearance->save();

        Alert::success('Exist Form Submitted Successfully', 'Exist Form Request Successfully');
        return redirect()->route('clearance.index')->with('success', 'Clearance form submitted successfully!');
    }

    
    

    /**
     * Display the specified resource.
     */
    public function show(ClearanceForm $clearanceForm)
    {
        return view('clearance.show', compact('clearanceForm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClearanceForm $clearanceForm)
    {
        return view('clearance.edit', compact('clearanceForm'));
    }

    /**
     * Update the specified resource in storage.
     */
 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClearanceForm $clearanceForm)
    {
        $clearanceForm->delete();

        // Redirect back with a success message
        return redirect()->route('clearance.index')->with('success', 'Form deleted successfully.');
    }
}

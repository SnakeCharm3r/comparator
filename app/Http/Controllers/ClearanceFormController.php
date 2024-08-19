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
        $forms = ClearanceForm::with('user')->get();
        return view('clearance.index', compact('forms', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clearance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'id_card' => 'nullable|boolean',
            'name_tag' => 'nullable|boolean',
            'nhif_cards' => 'nullable|boolean',
            'bonding_agreement' => 'nullable|boolean',
            'work_permit' => 'nullable|boolean',
            'residence_permit' => 'nullable|boolean',
            'changing_room_keys' => 'nullable|boolean',
            'office_keys' => 'nullable|boolean',
            'mobile_phone' => 'nullable|boolean',
            'camera' => 'nullable|boolean',
            'uniforms' => 'nullable|boolean',
            'car_keys' => 'nullable|boolean',
            'other_items' => 'nullable|string',
            'repaid_advance' => 'nullable|boolean',
            'informed_finance' => 'nullable|boolean',
            'repaid_imprest' => 'nullable|boolean',
            'laptop_returned' => 'nullable|boolean',
            'access_card_returned' => 'nullable|boolean',
            'domain_account_disabled' => 'nullable|boolean',
            'email_account_disabled' => 'nullable|boolean',
            'telephone_pin_disabled' => 'nullable|boolean',
            'openclinic_account_disabled' => 'nullable|boolean',
            'sap_account_disabled' => 'nullable|boolean',
            'aruti_account_disabled' => 'nullable|boolean',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()
            ]);
        }

        $clearanceForm = new ClearanceForm([
            'userId' => Auth::id(), // Ensure the user_id is set
            'date' => $request->input('date'),
            'id_card' => $request->input('id_card', false),
            'name_tag' => $request->input('name_tag', false),
            'nhif_cards' => $request->input('nhif_cards', false),
            'bonding_agreement' => $request->input('bonding_agreement', false),
            'work_permit' => $request->input('work_permit', false),
            'residence_permit' => $request->input('residence_permit', false),
            'changing_room_keys' => $request->input('changing_room_keys', false),
            'office_keys' => $request->input('office_keys', false),
            'mobile_phone' => $request->input('mobile_phone', false),
            'camera' => $request->input('camera', false),
            'uniforms' => $request->input('uniforms', false),
            'car_keys' => $request->input('car_keys', false),
            'other_items' => $request->input('other_items', ''),
            'repaid_advance' => $request->input('repaid_advance', false),
            'informed_finance' => $request->input('informed_finance', false),
            'repaid_imprest' => $request->input('repaid_imprest', false),
            'laptop_returned' => $request->input('laptop_returned', false),
            'access_card_returned' => $request->input('access_card_returned', false),
            'domain_account_disabled' => $request->input('domain_account_disabled', false),
            'email_account_disabled' => $request->input('email_account_disabled', false),
            'telephone_pin_disabled' => $request->input('telephone_pin_disabled', false),
            'openclinic_account_disabled' => $request->input('openclinic_account_disabled', false),
            'sap_account_disabled' => $request->input('sap_account_disabled', false),
            'aruti_account_disabled' => $request->input('aruti_account_disabled', false),
        ]);
        //dd($clearanceForm);
        $clearanceForm->save();
        Alert::success('Exist Form Submitted Successfully', 'Exist Form Request Added');
        return redirect()->route('clearance.index')->with('success', 'Clearance form submitted successfully.');
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
    public function update(Request $request, ClearanceForm $clearanceForm)
    {
        $request->validate([
            'date' => 'required|date',
            'id_card' => 'nullable|boolean',
            'name_tag' => 'nullable|boolean',
            'nhif_cards' => 'nullable|boolean',
            'bonding_agreement' => 'nullable|boolean',
            'work_permit' => 'nullable|boolean',
            'residence_permit' => 'nullable|boolean',
            'changing_room_keys' => 'nullable|boolean',
            'office_keys' => 'nullable|boolean',
            'mobile_phone' => 'nullable|boolean',
            'camera' => 'nullable|boolean',
            'uniforms' => 'nullable|boolean',
            'car_keys' => 'nullable|boolean',
            'other_items' => 'nullable|string',
            'repaid_advance' => 'nullable|boolean',
            'informed_finance' => 'nullable|boolean',
            'repaid_imprest' => 'nullable|boolean',
            'laptop_returned' => 'nullable|boolean',
            'access_card_returned' => 'nullable|boolean',
            'domain_account_disabled' => 'nullable|boolean',
            'email_account_disabled' => 'nullable|boolean',
            'telephone_pin_disabled' => 'nullable|boolean',
            'openclinic_account_disabled' => 'nullable|boolean',
            'sap_account_disabled' => 'nullable|boolean',
            'aruti_account_disabled' => 'nullable|boolean',
        ]);

        // Update the clearance form record
        $clearanceForm->update($request->all());

        // Redirect back with a success message
        return redirect()->route('clearance.index')->with('success', 'Form updated successfully.');
    }

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

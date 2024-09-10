<?php

namespace App\Http\Controllers;

use App\Models\Clearance_work_flow;
use App\Models\Clearance_work_flow_history;
use App\Models\ClearanceForm;
use App\Models\User;
use Carbon\Carbon;
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
        $clearance = ClearanceForm::where('userId', $user->id)->first();
        return view('clearance.index', compact( 'user', 'clearance'));
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
      try {
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

        $workflow = $this->saveClearanceWorkflow([
            'user_id' => Auth::user()->id,
            'requested_resource_id' => $clearance->id,
            'work_flow_status' => 'sent to approval',
            'work_flow_completed' => 0,
        ]);
        // dd($workflow);

        $this->saveClearanceWorkflowHistory([
             'work_flow_id' => $workflow->id,
             'forwarded_by' => Auth::user()->id,
             'attended_by' => Auth::user()->id,
             'status' => '1',
             'remark' => 'Clearance Form',
             'attend_date' => Carbon::now()->format('d F Y'),
             'parent_id' => null,
        ]);
     $approver = $this->findLineManagerForRequesterDepartment();

     // Forward for approval
     $this->forwardClearanceWorkflowHistory([
        'work_flow_id' => $workflow->id,
        'forwarded_by' => Auth::user()->id,
        'attended_by' => $approver->id,
        'status' => '0',
        'remark' => 'Forwarded for approval',
        'attend_date' => Carbon::now()->format('d F Y'),
        'parent_id' => $workflow->id,
      ]);

        Alert::success('Exist Form Submitted Successfully', 'Exist Form Request Successfully');
        return redirect()->route('clearance.index')->with('success', 'Clearance form submitted successfully!');
     }catch(\Exception $e){
     dd('Error storing clearance request form: ' . $e->getMessage(), ['exception' => $e]);

      Alert::error('Failed to submit exit form request', 'Error');
      return back()->withInput()->withErrors(['error' => 'Failed to process request. Please try again.']);

      }

    }

    public function saveClearanceWorkflow($input)
    {
        // dd($input);
        return Clearance_work_flow::create($input);
    }


    public function saveClearanceWorkflowHistory($input)
    {
        return Clearance_work_flow_history::create($input);
    }

       // Method to find Line Manager for Requester department
 public function findLineManagerForRequesterDepartment()
 {
    try {
        // Role name of the Line Manager
        $approverRoleName = 'line-manager';

        // Department ID of the Requester (replace with your dynamic logic)
        $requesterDepartmentId = Auth::user()->deptId; // Adjust based on your actual department ID field

        // Query to find the Line Manager with 'line-manager' role and requester's department
        $approver = User::role($approverRoleName)
            ->where('deptId', $requesterDepartmentId)
            ->first();

        if (!$approver) {
            throw new \Exception('Line Manager for Requester department not found or unauthorized');
        }

        return $approver;
    } catch (\Exception $e) {
        // Log the error for debugging purposes
        \Log::error('Error finding Line Manager: ' . $e->getMessage());

        // Throw exception further for error handling in calling method
        throw $e;
    }
}

public function forwardClearanceWorkflowHistory ($input){
    return Clearance_work_flow_history::create($input);
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

    //start of exit approve
    public function approveForm($id)
    {
        $form = ClearanceForm::findOrFail($id);
        $form->status = 'approved';
        $form->save();

        return redirect()->route('exit_forms.approvers')->with('success', 'Form approved successfully.');
    }
    public function getForm($id)
    {
        $form = ClearanceForm::findOrFail($id);
        return view('exit_forms.show', compact('form'));
    }

    public function getApprover()
    {
        $forms = ClearanceForm::where('status', 'pending')->get();
        return view('exit_forms.approvers', compact('forms'));
    }

    public function rejectForm(Request $request, $id)
    {
        $form = ClearanceForm::findOrFail($id);
        $form->status = 'rejected';
        $form->rejection_reason = $request->input('reason');
        $form->save();

        return redirect()->route('exit_forms.approvers')->with('error', 'Form rejected.');
    }





}

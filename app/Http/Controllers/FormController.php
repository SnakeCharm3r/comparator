<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IctAccessResource;
use App\Models\Workflow;
use App\Models\WorkFlowHistory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\IctAccessController;
use App\Models\Clearance_work_flow;
use App\Models\Clearance_work_flow_history;
use App\Models\ClearanceForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovalRequestNotification;
use RealRashid\SweetAlert\Facades\Alert;


class FormController extends Controller
{
    public function getform(Request $request)
    {
        $user = Auth::user();

            $ictForm = IctAccessResource::join('users', 'users.id', '=', 'ict_access_resources.userId')
            ->join('workflows', 'workflows.ict_request_resource_id', '=', 'ict_access_resources.id')
            ->join('work_flow_histories', 'work_flow_histories.work_flow_id', '=', 'workflows.id')
            ->join('privilege_levels', 'privilege_levels.id', '=', 'ict_access_resources.privilegeId')
            ->join('users as user_forwarded', 'user_forwarded.id', '=', 'work_flow_histories.forwarded_by')
            ->join('nhif_qualifications', 'nhif_qualifications.id', '=', 'ict_access_resources.nhifId')
            ->join('employment_types', 'employment_types.id', '=', 'users.employment_typeId')
            ->join('departments', 'departments.id', '=', 'users.deptId')
            ->join('h_m_i_s_access_levels', 'h_m_i_s_access_levels.id', '=', 'ict_access_resources.hmisId')
            ->where('ict_access_resources.id', $request->id)
            ->where('work_flow_histories.attended_by', $user->id)
            ->first([
                'ict_access_resources.*',
                'users.*',
                'workflows.*',
                'work_flow_histories.*',
                'ict_access_resources.id as access_id',
                'privilege_levels.prv_name',
                'nhif_qualifications.name',
                'employment_types.employment_type',
                'departments.dept_name',
                'h_m_i_s_access_levels.names'
            ]);
// dd($ictForm);
        // dd($request->id);

        return view('ict_resource_form', compact('ictForm','user'));
        // dd($ictForm);

    }

//     public function approveForm(Request $request)
//     {
//         //  dd($request->access_id);
//         $workflow = Workflow::where('ict_request_resource_id', $request->access_id)->first();
//         //  dd($workflow);

//         if ($workflow) {
//             // Attempting to find the corresponding WorkflowHistory
//             $workflowHistory = WorkflowHistory::where('work_flow_id', $workflow->id)
//                 ->where('status', 0)
//                 ->first();

//             if ($workflowHistory) {
//                 // Proceed with updating the found WorkflowHistory
//                 $workflowHistory->status = 1;
//                 $workflowHistory->save();
//             } else {
//                 // Handle case where no WorkflowHistory is found
//                 dd("WorkflowHistory not found for Workflow ID {$workflow->id} and status 0");
//             }
//         } else {

//             // Handle case where no Workflow is found
//             dd("Workflow not found for access ID {$request->access_id}");
//         }

//         // dd(Auth::user());
//         $user = Auth::user(); // Get the authenticated user
//        // dd($user);

//         $roles = $user->getRoleNames()->first(); // Get all roles as a collection of role names
//           //dd($roles);
//         // get user based on roles
//         if ($roles == 'line-manager') {
//             // dd(123);

//             $approver = User::role('hr')->first();
//         } elseif ($roles == 'hr') {
//             $approver = User::role('it')->first();
//         } elseif ($roles == 'it') {
//             $approver = User::role('admin')->first();
//         } else {
//             $approver = 'no approval';
//         }

//         // if ($roles->contains('line-manager')) {
//         //     $approver = User::role('hr')->first();
//         // } elseif ($roles->contains('hr')) {
//         //     $approver = User::role('it')->first();
//         // } elseif ($roles->contains('it')) {
//         //     $approver = User::role('admin')->first();
//         // } else {
//         //     $approver = 'no approval';
//         // }

//         // dd($approver );
//         $ict = new IctAccessController();

//         if ($roles == 'admin') {
//             // dd($workflow->id);
//             $workflow = Workflow::find($workflow->id);
//             $workflow->work_flow_status = "aproved";
//             $workflow->work_flow_completed = 1;
//             $workflow->save();
//         } else {
//             $input = [
//                 'work_flow_id' => $workflow->id,
//                 'forwarded_by' => Auth::user()->id,
//                 'attended_by' => $approver->id,
//                 'status' => '0',
//                 'remark' => 'forwarded for approval',
//                 'attend_date' => Carbon::now()->format('d F Y'),
//                 'parent_id' => $workflowHistory->id
//             ];
//             // dd($input);




//             $workflowHistory = $ict->saveWorkflowHistory($input);
//         }

//         // dd($workflowHistory);
// }

public function approveForm(Request $request)
{
    // Find the workflow associated with the access request
    $workflow = Workflow::where('ict_request_resource_id', $request->access_id)->first();

    if (!$workflow) {
        // Handle case where no Workflow is found
        return response()->json(['error' => "Workflow not found for access ID {$request->access_id}"], 404);
    }

    // Find the current workflow history where status is 0 (pending)
    $workflowHistory = WorkflowHistory::where('work_flow_id', $workflow->id)
        ->where('status', 0)
        ->first();

    if (!$workflowHistory) {
        // Handle case where no WorkflowHistory is found
        return response()->json(['error' => "WorkflowHistory not found for Workflow ID {$workflow->id} and status 0"], 404);
    }

    // Update the current WorkflowHistory to approved (status = 1)
    $workflowHistory->status = 1;
    $workflowHistory->save();

    // Determine the role of the current approver
    $user = Auth::user();
    $roles = $user->getRoleNames()->first();

    // Determine the next approver based on the current role
    switch ($roles) {
        case 'line-manager':
            $nextApproverRole = 'hr';
            break;
        case 'hr':
            $nextApproverRole = 'it';
            break;
        case 'it':
            $nextApproverRole = 'admin';
            break;
        case 'admin':
            $workflow->work_flow_status = "approved";
            $workflow->work_flow_completed = 1;
            $workflow->save();
            Alert::success('Approval Completed', 'The request has been fully approved.');
            return redirect()->route('request.index')->with('success', 'ICT Access Resource fully approved.');
        default:
            return response()->json(['error' => 'No valid role found for approval.'], 400);
    }

    // Find the next approver
    $approver = User::role($nextApproverRole)->first();

    if (!$approver) {
        return response()->json(['error' => "Next approver with role {$nextApproverRole} not found."], 404);
    }

    // Forward workflow to the next approver
    $input = [
        'work_flow_id' => $workflow->id,
        'forwarded_by' => Auth::user()->id,
        'attended_by' => $approver->id,
        'status' => '0',
        'remark' => 'Forwarded for approval',
        'attend_date' => Carbon::now()->format('d F Y'),
        'parent_id' => $workflowHistory->id
    ];
    $ict = new IctAccessController();
    $workflowHistory = $ict->saveWorkflowHistory($input);

    // Send notification to the next approver
    $requestDetails = [
        'attended_by' => $approver->id,
        'requestId' => $request->access_id,
        'requestDate' => Carbon::now()->format('d F Y'),
    ];

    $mail = new ApprovalRequestNotification();
    $mail->approver = $approver;
    $mail->requestDetails = $requestDetails;

    Mail::to($approver->email)->send($mail);

    Alert::success('Approval Submitted', 'The request has been forwarded to the next approver.');
    return redirect()->route('request.index')->with('success', 'ICT Access Resource forwarded for further approval.');
}


public function rejectForm(Request $request) {

    $workflow = Workflow::where('ict_request_resource_id', $request->access_id)->first();
     if($workflow){
        $workflowHistory = WorkFlowHistory::where('work_flow_id', $workflow->id)
     ->where('status', 0)
     ->first();

       if($workflowHistory) {
        // Update the status to rejected and save the reason
        $workflowHistory->status = -1;
        $workflowHistory->rejection_reason = $request->reason; // Store the reason
        $workflowHistory->save();

     }
     else {
        // Handle case where no WorkflowHistory is found
        dd("WorkflowHistory not found for Workflow ID {$workflow->id} and status 0");
    }

    }
    else {
        // Handle case where no Workflow is found
        dd("Workflow not found for access ID {$request->access_id}");
    }
}


public function getClearance(Request $request){
$user = Auth::user();
$clearance = ClearanceForm::join('users', 'users.id', '=', 'clearance_forms.userId')
        ->join('clearance_work_flows','clearance_work_flows.requested_resource_id','=','clearance_forms.id')
        ->join('clearance_work_flow_histories','clearance_work_flow_histories.work_flow_id','=','clearance_work_flows.id')
        ->join('users as user_forwarded', 'user_forwarded.id', '=', 'clearance_work_flow_histories.forwarded_by')
            ->where('clearance_forms.id', $request->id)
            ->first([
                'clearance_forms.*',
                'users.*',
                'clearance_work_flows.*',
                'clearance_work_flow_histories.*',
                'clearance_forms.id as access_id']);
        return view('exit_form', compact('clearance','user'));

}

public function approveClearanceForm(Request $request){
    $workflow= Clearance_work_flow::where('requested_resource_id', $request->access_id)->first();

      if($workflow){
        //find the corresponding work flow history
         $workflowHistory = Clearance_work_flow_history::where('work_flow_id', $workflow->id)
         ->where('status', 0)->first();

         if($workflowHistory){
            $workflowHistory->status = 1;
            $workflowHistory->save();
         }else{
            dd("Clearance Workflow History not found for Workflow ID {$workflow->id} and status 0");

         }
      }
      else{
        dd("Clearance Workflow not found for access ID {$request->access_id}");

      }

      $user = Auth::user();
      $roles = $user->getRoleNames()->first();
      if ($roles->contains('line-manager')) {
        $approver = User::role('finance officer')->first();
    } elseif ($roles->contains('finance officer')) {
        $approver = User::role('it')->first();
    } elseif ($roles->contains('it')) {
        $approver = User::role('hr')->first();
    }
    else {
        $approver = 'no approval';
    }
         $clear = new ClearanceFormController();

         if($roles->contains('it')){
            $workflow = Clearance_work_flow::find($workflow->id);
            $workflow->work_flow_status = 'approved';
            $workflow->work_flow_completed = 1;
            $workflow->save();
         } else{
            $input = [
                'work_flow_id' => $workflow->id,
                'forwarded_by' => Auth::user()->id,
                'attended_by' => $approver->id,
                'status' => '0',
                'remark' => 'forwarded for approval',
                'attend_date' => Carbon::now()->format('d F Y'),
                'parent_id' => $workflowHistory->id
            ];
            $workflowHistory = $clear->saveClearanceWorkflowHistory($input);
         }
}


}

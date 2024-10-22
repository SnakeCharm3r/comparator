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
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class FormController extends Controller
{
    // public function getform(Request $request)
    // {
    //     $user = Auth::user();
    //     $roles = $user->getRoleNames()->first();

    //     $ictForm = IctAccessResource::join('users', 'users.id', '=', 'ict_access_resources.userId')
    //         ->join('workflows', 'workflows.ict_request_resource_id', '=', 'ict_access_resources.id')
    //         ->join('work_flow_histories', 'work_flow_histories.work_flow_id', '=', 'workflows.id')
    //         ->join('privilege_levels', 'privilege_levels.id', '=', 'ict_access_resources.privilegeId')
    //         ->join('users as user_forwarded', 'user_forwarded.id', '=', 'work_flow_histories.forwarded_by')
    //         ->join('nhif_qualifications', 'nhif_qualifications.id', '=', 'ict_access_resources.nhifId')
    //         ->join('employment_types', 'employment_types.id', '=', 'users.employment_typeId')
    //         ->join('departments', 'departments.id', '=', 'users.deptId')
    //         ->join('h_m_i_s_access_levels', 'h_m_i_s_access_levels.id', '=', 'ict_access_resources.hmisId')
    //         ->where('ict_access_resources.id', $request->id)
    //         ->where('work_flow_histories.attended_by', $user->id)
    //         ->first([
    //             'ict_access_resources.*',
    //             'users.*',
    //             'workflows.*',
    //             'work_flow_histories.*',
    //             'ict_access_resources.id as access_id',
    //             'privilege_levels.prv_name',
    //             'nhif_qualifications.name',
    //             'employment_types.employment_type',
    //             'departments.dept_name',
    //             'h_m_i_s_access_levels.names'
    //         ]);
    //     // dd($ictForm);
    //     // dd($request->id);

    //     return view('ict_resource_form', compact('ictForm', 'user'));
    //     // dd($ictForm);

    // }

    public function getform(Request $request)
    {
        $user = Auth::user();

        // Fetch the form details
        $ictForm = IctAccessResource::join('users', 'users.id', '=', 'ict_access_resources.userId')
            ->join('workflows', 'workflows.ict_request_resource_id', '=', 'ict_access_resources.id')
            ->join('work_flow_histories', 'work_flow_histories.work_flow_id', '=', 'workflows.id')
            ->join('privilege_levels', 'privilege_levels.id', '=', 'ict_access_resources.privilegeId')
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
                'h_m_i_s_access_levels.names',
                'work_flow_histories.forwarded_by'
            ]);

        // Fetch the approvers based on their roles
        // Assuming you have role ids for Line Manager, IT Officer, and HR
        $lineManager = User::whereHas('roles', function($query ) {
            $query->where('name', 'line-manager')
            ;
        })
        ->where('users.deptId', $ictForm->deptId)
        ->join('work_flow_histories','work_flow_histories.attended_by','=','users.id')
        ->where('work_flow_histories.work_flow_id',$ictForm->work_flow_id)
        ->where('work_flow_histories.status',1)
        ->first();


        // $lineManager = User::where('id', $ictForm->attended_by)->first();

        $hrOfficer = User::whereHas('roles', function($query) {
            $query->where('name', 'hr');
        })
        ->join('work_flow_histories','work_flow_histories.attended_by','=','users.id')
        ->where('work_flow_histories.work_flow_id',$ictForm->work_flow_id)
        ->where('work_flow_histories.status',1)
        ->first();
//  dd($hrOfficer);

        $itOfficer = User::whereHas('roles', function($query) {
            $query->where('name', 'it');
        })
        ->join('work_flow_histories','work_flow_histories.attended_by','=','users.id')
        ->where('work_flow_histories.work_flow_id',$ictForm->work_flow_id)
        ->where('work_flow_histories.status',1)
        ->first();


        return view('ict_resource_form', compact('ictForm', 'user', 'lineManager', 'itOfficer', 'hrOfficer'));
    }


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
        $forwadUser=User::join('workflows','workflows.user_id','=','users.id')
        ->where('workflows.ict_request_resource_id',$request->access_id)
        ->select('users.username')
        ->first();
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
        $ict = new IctAccessController();
        if(  $nextApproverRole =='hr' || $nextApproverRole =='it' ){
            $approver = User::role( $nextApproverRole)->get()->pluck('id');
            foreach($approver as $aprId){
                $input = [
                    'work_flow_id' => $workflow->id,
                    'forwarded_by' => Auth::user()->id,
                    'attended_by' =>$aprId,
                    'status' => '0',
                    'remark' => 'Forwarded for approval',
                    'attend_date' => Carbon::now()->format('d F Y'),
                    'parent_id' => $workflowHistory->id
                ];
                $workflowHistory = $ict->saveWorkflowHistory($input);
            }
            // dd( $approver->pluck('id'));
        }
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
            'forwarded_by' => $forwadUser->username,
            'request' => "IT Access Form",
            'requestDate' => Carbon::now()->format('d F Y'),
        ];

        if ($approver) {
            $mail = new ApprovalRequestNotification();
            $mail->approver = $approver;
            $mail->requestDetails = $requestDetails;
        //dd($approver);
            Mail::to($approver->email)->send($mail);
        } else {
            // Handle the case where approver is null
            throw new \Exception('Approver not found');
        }

        Alert::success('Approval Submitted', 'The request has been forwarded to the next approver.');
        return redirect()->route('request.index')->with('success', 'ICT Access Resource forwarded for further approval.');
    }


    public function rejectForm(Request $request)
    {
        // dd($request);
        $workflow = Workflow::where('ict_request_resource_id', $request->access_id)->first();
        // dd($workflow);
        if ($workflow) {
            $workflowHistory = WorkFlowHistory::where('work_flow_id', $workflow->id)
                ->where('status', 0)
                ->first();

            if ($workflowHistory) {
                // Update the status to rejected and save the reason
                $workflowHistory->status = -1;
                $workflowHistory->attended_by = Auth::user()->id;
                $workflowHistory->rejection_reason = $request->reason; // Store the reason
                $workflowHistory->save();
                // dd($workflowHistory);

            } else {
                // Handle case where no WorkflowHistory is found
                dd("WorkflowHistory not found for Workflow ID {$workflow->id} and status 0");
            }
        } else {
            // Handle case where no Workflow is found
            dd("Workflow not found for access ID {$request->access_id}");
        }
    }


    public function getClearance(Request $request)
    {
        $user = Auth::user();
        $clearance = ClearanceForm::join('users', 'users.id', '=', 'clearance_forms.userId')
            ->join('clearance_work_flows', 'clearance_work_flows.requested_resource_id', '=', 'clearance_forms.id')
            ->join('clearance_work_flow_histories', 'clearance_work_flow_histories.work_flow_id', '=', 'clearance_work_flows.id')
            ->join('departments', 'departments.id', '=', 'users.deptId')
            ->join('job_titles', 'job_titles.id', '=', 'users.job_title')
            ->where('clearance_forms.id', $request->id)
            ->where('clearance_work_flow_histories.attended_by', $user->id)

            ->first([
                'clearance_forms.*',
                'users.*',
                'clearance_work_flows.*',
                'departments.dept_name',
                'job_titles.job_title',
                'clearance_work_flow_histories.*',
                'clearance_forms.id as access_id',
                'clearance_work_flow_histories.forwarded_by'
            ]);

            //  dd($clearance);
        return view('exit_form', compact('clearance', 'user'));
    }

    public function approveClearanceForm(Request $request)
    {
        $workflow = Clearance_work_flow::where('requested_resource_id', $request->access_id)->first();

        if ($workflow) {
            //dd($workflow);
            //find the corresponding work flow history
            $workflowHistory = Clearance_work_flow_history::where('work_flow_id', $workflow->id)
                ->where('status', 0)->first();

            // dd($workflowHistory );
            if ($workflowHistory) {
                $workflowHistory->status = 1;
                $workflowHistory->save();
            } else {
                dd("Clearance Workflow History not found for Workflow ID {$workflow->id} and status 0");
            }
        } else {
            dd("Clearance Workflow not found for access ID {$request->access_id}");
        }

        $user = Auth::user();
        $roles = $user->getRoleNames();


        if ($roles->contains('line-manager')) {
            $approver = User::role('finance officer')->first();
        } elseif ($roles->contains('finance officer')) {
            $approver = User::role('it')->first();
        } elseif ($roles->contains('it')) {
            $approver = User::role('hr')->first();
        } else {
            $approver = 'no approval';
        }
        $clear = new ClearanceFormController();

        if ($roles->contains('hr')) {
            $workflow = Clearance_work_flow::find($workflow->id);
            $workflow->work_flow_status = 'approved';
            $workflow->work_flow_completed = 1;
            $workflow->save();
        } else {
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

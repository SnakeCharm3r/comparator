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





class FormController extends Controller
{
    public function getform(Request $request)
    {
        $user = Auth::user();
        $ictForm = IctAccessResource::join('users', 'users.id', '=', 'ict_access_resources.userId')
            ->join('workflows', 'workflows.ict_request_resource_id', '=', 'ict_access_resources.id')
            ->join('work_flow_histories', 'work_flow_histories.work_flow_id', '=', 'workflows.id')
            ->join('privilege_levels', 'privilege_levels.id', '=', 'ict_access_resources.privilegeId')
            ->join('nhif_qualifications', 'nhif_qualifications.id', '=', 'ict_access_resources.nhifId')
            ->join('employment_types', 'employment_types.id', '=', 'users.employment_typeId')
            ->join('departments', 'departments.id', '=', 'users.deptId')
            ->join('h_m_i_s_access_levels', 'h_m_i_s_access_levels.id', '=', 'ict_access_resources.hmisId')
            ->where('ict_access_resources.id', $request->id)
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

        return view('ict_resource_form', compact('ictForm','user'));
    }


    public function approveForm(Request $request)
    {
        // dd($request->access_id);
        $workflow = Workflow::where('ict_request_resource_id', $request->access_id)->first();
        // dd($workflow);

        if ($workflow) {
            // Attempting to find the corresponding WorkflowHistory
            $workflowHistory = WorkflowHistory::where('work_flow_id', $workflow->id)
                ->where('status', 0)
                ->first();

            if ($workflowHistory) {
                // Proceed with updating the found WorkflowHistory
                $workflowHistory->status = 1;
                $workflowHistory->save();
            } else {
                // Handle case where no WorkflowHistory is found
                dd("WorkflowHistory not found for Workflow ID {$workflow->id} and status 0");
            }
        } else {
            // Handle case where no Workflow is found
            dd("Workflow not found for access ID {$request->access_id}");
        }

        // dd(Auth::user());
        $user = Auth::user(); // Get the authenticated user
        // dd($user);
        $roles = $user->getRoleNames(); // Get all roles as a collection of role names
        //  dd($roles);
        // get user based on roles
        if ($roles->contains('line-manager')) {
            $approver = User::role('HR')->first();
        } elseif ($roles->contains('HR')) {
            $approver = User::role('IT')->first();
        } elseif ($roles->contains('IT')) {
            $approver = User::role('admin')->first();
        } else {
            $approver = 'no approval';
        }

        // dd($approver );
        $ict = new IctAccessController();

        if ($roles->contains('admin')) {
            // dd($workflow->id);
            $workflow = Workflow::find($workflow->id);
            $workflow->work_flow_status = "aproved";
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
            // dd($input);




            $workflowHistory = $ict->saveWorkflowHistory($input);
        }

        // dd($workflowHistory);
}
}

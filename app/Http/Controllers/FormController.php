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
        $ictForm = IctAccessResource::join('users', 'users.id', '=', 'ict_access_resources.userId')
            ->where('ict_access_resources.id', $request->id)
            ->first([
                'ict_access_resources.*',
                'users.*',
                'ict_access_resources.id as access_id'
            ]);
        // dd($request->id);

        return view('ict_resource_form', compact('ictForm'));
        // dd($ictForm);

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
            $approver = User::role('hr')->first();
        } elseif ($roles->contains('hr')) {
            $approver = User::role('it')->first();
        } elseif ($roles->contains('it')) {
            $approver = User::role('admin')->first();
        } else {
            $approver = 'no approval';
        }
        //   dd( $approver);
        //     // where('job_title', 'Human Resource')->first();
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

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
        $workflow= Workflow::where('ict_request_resource_id',$request->access_id)
        ->select('workflows.*')
        ->first();


        $workflowHistory= WorkflowHistory::where('work_flow_id',$workflow->id)->where('status',0)->first();
        $tosaveHistory= WorkflowHistory::find($workflowHistory->id);
        $tosaveHistory->status=1;
        $tosaveHistory->save();


        $approver = User::where('job_title', 'Human Resource')->first();

        $input=[
            'work_flow_id' => $workflow->id,
            'forwarded_by' => Auth::user()->id,
            // 'attended_by' => $approver->id,
            'status' => '0',
            'remark' => 'forwarded for approval',
            'attend_date' => Carbon::now()->format('d F Y'),
            'parent_id' =>$workflowHistory->id
        ];


        $ict= new IctAccessController();



        $workflowHistory = $ict->saveWorkflowHistory($input);

        // dd($workflowHistory);



    }
}

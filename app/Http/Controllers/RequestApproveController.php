<?php

namespace App\Http\Controllers;

use App\Models\Clearance_work_flow;
use Illuminate\Http\Request;
use App\Models\Workflow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User; // Import the User model


class RequestApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch ICT Access Requests
        $pending = Workflow::join('work_flow_histories', 'work_flow_histories.work_flow_id', '=', 'workflows.id')
                            ->join('users as requesters', 'requesters.id', '=', 'workflows.user_id')
                            ->where('work_flow_histories.attended_by', Auth::user()->id)
                            ->select('workflows.*', 'work_flow_histories.*', 'requesters.username as requester_name')
                            ->get();

        // Fetch Clearance Requests
        $clear = Clearance_work_flow::join('clearance_work_flow_histories', 'clearance_work_flow_histories.work_flow_id', '=', 'clearance_work_flows.id')
                                    ->join('users as requesters', 'requesters.id', '=', 'clearance_work_flows.user_id')
                                    ->where('clearance_work_flow_histories.attended_by', Auth::user()->id)
                                    ->select('clearance_work_flows.*', 'clearance_work_flow_histories.*', 'requesters.username as requester_name')
                                    ->get();

        // Pass both datasets to the view
        return view("requestapprove.index", compact("pending", "clear"));
    }



public function showICTForm($id)
{
    $ictRequest = Workflow::findOrFail($id);
    // Return a view with the ICT request details
    return view('ict_resource_form', compact('ictRequest'));
}

public function showClearanceForm($id)
{
    $clearanceRequest = Clearance_work_flow::findOrFail($id);
    // Return a view with the Clearance request details
    return view('requestapprove.show_clearance_form', compact('clearanceRequest'));
}

    //hii haitumiki ipo for ref
    public function indexOld()
    {
        $pending = Workflow::join('work_flow_histories', 'work_flow_histories.work_flow_id', '=', 'workflows.id')
                            ->join('users', 'users.id', '=', 'work_flow_histories.forwarded_by')
                           ->where('work_flow_histories.attended_by', Auth::user()->id)
                           ->select('workflows.*', 'work_flow_histories.*', 'users.username')
                           ->get();

        // dd($pending);
        return view("requestapprove.index", compact("pending"));
    }

public function getClearance(){
    $clear = Clearance_work_flow::join('clearance_work_flow_histories','clearance_work_flow_histories.work_flow_id')
    ->join('users','users as requesters', 'requesters.id', '=' ,'clearance_work_flows.user_id')
    ->where('clearance_work_flow_histories.attended_by', Auth::user()->id)
    ->select('clearance_work_flows.*', 'clearance_work_flow_histories.*', 'requesters.username as requester_name')
    ->get();


}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

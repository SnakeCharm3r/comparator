<?php

namespace App\Http\Controllers;

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
        $pending = Workflow::join('work_flow_histories', 'work_flow_histories.work_flow_id', '=', 'workflows.id')
                            ->join('users as requesters', 'requesters.id', '=', 'workflows.user_id') // Alias `users` as `requesters`
                            ->where('work_flow_histories.attended_by', Auth::user()->id)
                            ->select('workflows.*', 'work_flow_histories.*', 'requesters.username as requester_name') // Select with alias
                            ->get();
// dd($pending);
        return view("requestapprove.index", compact("pending"));
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

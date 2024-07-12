<?php

namespace App\Http\Controllers;

use App\Models\Workflow;
use Auth;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form= Workflow::join('work_flow_histories','work_flow_histories.work_flow_id','=','workflows.id')
        ->where('workflows.user_id',Auth::user()->id)
        ->get();
        // dd( $form);
        return view("myrequest.index" ,compact('form'));
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

<?php

namespace App\Http\Controllers;

use App\Models\HMISAccessLevel;
use App\Models\NhifQualification;
use App\Models\PrivilegeLevel;
use App\Models\Remark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IctAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user()->load('department','employmentType');
        $qualifications = NhifQualification::all();
        $privileges = PrivilegeLevel::all();
        $rmk = Remark::all();
        $hmis = HMISAccessLevel::all();
        return view('ict-access-form.index', compact(
            'user','qualifications','privileges',
            'rmk', 'hmis'
        ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ict-access-form.create');
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

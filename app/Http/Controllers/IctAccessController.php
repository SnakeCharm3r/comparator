<?php

namespace App\Http\Controllers;

use App\Models\IctAccessResource;
use App\Models\HMISAccessLevel;
use App\Models\NhifQualification;
use App\Models\PrivilegeLevel;
use App\Models\Remark;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IctAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->load('department','employmentType');
        $qualifications = NhifQualification::where('delete_status', 0)->get();
        $privileges = PrivilegeLevel::where('delete_status', 0)->get();
        $rmk = Remark::where('delete_status', 0)->get();
        $hmis = HMISAccessLevel::where('delete_status', 0)->get();
        $ictAccessResources = IctAccessResource::where('delete_status', 0)->get();

        return view('ict-access-form.index', compact(
            'user', 'qualifications', 'privileges',
            'rmk', 'hmis', 'ictAccessResources'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $user = Auth::user()->load('department','employmentType');
        $qualifications = NhifQualification::where('delete_status', 0)->get();
        $privileges = PrivilegeLevel::where('delete_status', 0)->get();
        $rmk = Remark::where('delete_status', 0)->get();
        $hmis = HMISAccessLevel::where('delete_status', 0)->get();

        return view('ict-access-form.create', compact('qualifications', 'privileges', 'rmk', 'hmis','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Log the request data
    \Log::info('Request data: ', $request->all());
    
        $validator = Validator::make($request->all(), [
            'remarkId' => 'required|exists:remarks,id',
            'privilegeId' => 'required|exists:privilege_levels,id',
            'userId' => 'required|exists:users,id',
            'hmisId' => 'required|exists:h_m_i_s_access_levels,id',
            'aruti' => 'required|exists:privilege_levels,id',
            'sap' => 'required|exists:privilege_levels,id',
            'nhifId' => 'required|exists:nhif_qualifications,id',
            'active_drt' => 'required|exists:privilege_levels,id',
            'VPN' => 'required|exists:privilege_levels,id',
            'pbax' => 'required|exists:privilege_levels,id',
        ]);

        if($validator->fails()){
            return response()->json([
                'stauss' => 400,
                'errors' => $validator->errors(),
                ]);
        }
        // Convert the hardware_request array to a string
    $hardwareRequest = $request->input('hardware_request') ? implode(',', $request->input('hardware_request')) : null;


       $ict = IctAccessResource::create([
        'remarkId' => $request->input('remarkId'),
        'privilegeId' => $request->input('privilegeId'),
        'email' => $request->input('email'),
        'userId' => $request->input('userId'),
        'hmisId' => $request->input('hmisId'),
        'aruti' => $request->input('aruti'),
        'sap' => $request->input('sap'),
        'nhifId' => $request->input('nhifId'),
        'hardware_request' => $hardwareRequest,
        'active_drt' => $request->input('active_drt'),
        'VPN' => $request->input('VPN'),
        'pbax' => $request->input('pbax'),
        'status' => $request->input('status'),
        'physical_access' => $request->input('physical_access'),
         'delete_status' => 0,


        ]);

        return redirect()->route('form.index')->with('success', 'ICT Access Resource created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ictAccessResource = IctAccessResource::findOrFail($id);

        return view('ict-access-form.show', compact('ictAccessResource'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ictAccessResource = IctAccessResource::findOrFail($id);
        $qualifications = NhifQualification::where('delete_status', 0)->get();
        $privileges = PrivilegeLevel::where('delete_status', 0)->get();
        $rmk = Remark::where('delete_status', 0)->get();
        $hmis = HMISAccessLevel::where('delete_status', 0)->get();

        return view('ict-access-form.edit', compact('ictAccessResource', 'qualifications', 'privileges', 'rmk', 'hmis'));
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
        $ictAccessResource = IctAccessResource::findOrFail($id);
        $ictAccessResource->delete_status = 1;
        $ictAccessResource->save();

        return redirect()->route('ict-access-form.index')->with('success', 'ICT Access Resource deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\IctAccessResource;
use App\Models\HMISAccessLevel;
use App\Models\NhifQualification;
use App\Models\PrivilegeLevel;
use App\Models\Remark;
use App\Models\User;
use App\Notifications\RequestApprovalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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
        $user = Auth::user()->load('department', 'employmentType');
        $qualifications = NhifQualification::active()->get();
        $privileges = PrivilegeLevel::active()->get();
        $remarks = Remark::active()->get();
        $hmisAccessLevels = HMISAccessLevel::active()->get();

        return view('ict-access-form.create', compact(
            'qualifications', 'privileges', 
            'remarks', 'hmisAccessLevels', 'user'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        $user = User::findOrFail($request->input('userId'));
        $departmentId = $user->department->id;

        $hardwareRequest = $request->input('hardware_request') ? implode(',', $request->input('hardware_request')) : null;

        $ictAccessResource = IctAccessResource::create([
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
            'status' => 0,
            'physical_access' => $request->input('physical_access'),
            'delete_status' => 0,
        ]);

        $this->initiateApprovalProcess($ictAccessResource);

        Alert::success('IT access form request submitted successfully', 'IT Access Request Added');
        // return redirect()->route('form.index')->with('success', 'ICT Access Resource created successfully.');
        return redirect()->route('request.index')->with('success', 'ICT Access Resource created successfully.');

    }

    /**
     * Initiate the approval process.
     */
    public function initiateApprovalProcess($ictAccessResource)
    {
        //dd($ictAccessResource->userId );

        $user = User::findOrFail($ictAccessResource->userId);
        $lineManager = User::Role('line-manager')->where('deptId', $user->deptId)->first();
        $hrManager = User::Role('line-manager-hr')->first();
        $itManager = User::Role('it-manager')->first();
        $admin = User::Role('it')->first();

        if ($lineManager) {
            $lineManager->notify(new RequestApprovalNotification($ictAccessResource, 'line-manager'));
        }

        if ($ictAccessResource->approved_by_line_manager && $hrManager) {
            $hrManager->notify(new RequestApprovalNotification($ictAccessResource, 'line-manager-hr'));
        }

        // if ($ictAccessResource->approved_by_hr_manager && $itManager) {
        //     $itManager->notify(new RequestApprovalNotification($ictAccessResource, 'it-manager'));
        // }

        if ($ictAccessResource->approved_by_it_manager && $admin) {
            $admin->notify(new RequestApprovalNotification($ictAccessResource, 'it'));
        }
    }

    /**
     * Display the list of requests based on the user's role.
     */
    public function requestApprovalList()
    {
        $userRole = Auth::user()->getRoleNames()->first();
        $requestList = [];

        switch ($userRole) {
            case 'line-manager':
                $requestList = IctAccessResource::where('status', 0)->get();
                break;
            case 'line-manager-hr':
                $requestList = IctAccessResource::where('status', 1)->get();
                break;
            case 'it-manager':
                $requestList = IctAccessResource::where('status', 2)->get();
                break;
            case 'it':
                $requestList = IctAccessResource::all();
                break;
            default:
                abort(404);
        }

        return view('approval_form', [
            'requestList' => $requestList
        ]);
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
        $qualifications = NhifQualification::active()->get();
        $privileges = PrivilegeLevel::active()->get();
        $remarks = Remark::active()->get();
        $hmisAccessLevels = HMISAccessLevel::active()->get();

        return view('ict-access-form.edit', compact(
            'ictAccessResource', 'qualifications', 'privileges', 'remarks', 'hmisAccessLevels'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implement the update logic here
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

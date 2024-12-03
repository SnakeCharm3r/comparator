<?php

namespace App\Http\Controllers;

use App\Mail\ApprovalRequestNotification;
use App\Models\IctAccessResource;
use App\Models\WorkFlowHistory;
use App\Models\HMISAccessLevel;
use App\Models\HealthDetails;
use App\Models\NhifQualification;
use App\Models\PrivilegeLevel;
use App\Models\Remark;
use App\Models\User;
use App\Models\Workflow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class IctAccessController extends Controller
{

    public function index()
    {
        // Load the authenticated user with their related models
        $user = Auth::user()->load('department', 'employmentType');

        // Fetch the necessary resources
        $qualifications = NhifQualification::where('delete_status', 0)->get();
        $privileges = PrivilegeLevel::where('delete_status', 0)->get();
        $rmk = Remark::where('delete_status', 0)->get();
        $hmis = HMISAccessLevel::where('delete_status', 0)->get();
        $ictAccessResources = IctAccessResource::where('delete_status', 0)->get();
        
         //check if the user has a signature!!
          $hasSignature = !is_null($user->signature);
          if (!$hasSignature) 
          {
            return redirect()->route('signature.index')->with([
                'message' => 'Please add your signature before proceeding.',
            ]);
            
          } 
         // Check if the user's profile is complete
         $profileComplete = $user->userFamilyDetails()->exists()&&
            $user->languageKnowledge()->exists();


           // If the profile is not complete, redirect to the profile edit page
           if (!$profileComplete) {
            return view('user_profile.index')->with([
                'user' => $user,
                'message' => 'Please complete your profile before proceeding.',
            ]);
        } else {
            // If the profile is complete, show the ICT access form
            return view('ict-access-form.index', compact(
                'user',
                'qualifications',
                'privileges',
                'rmk',
                'hmis',
                'ictAccessResources'
            ));
        }
    }

    public function create()
    {

        $user = Auth::user()->load('department', 'employmentType');
        $qualifications = NhifQualification::where('delete_status', 0)->get();
        $privileges = PrivilegeLevel::where('delete_status', 0)->get();
        $hmis = HMISAccessLevel::where('delete_status', 0)->get();

        return view('ict-access-form.index', compact('qualifications', 'privileges', 'rmk', 'hmis', 'user'));
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'privilegeId' => 'required|exists:privilege_levels,id',
            'userId' => 'required|exists:users,id',
            'hmisId' => 'required|exists:h_m_i_s_access_levels,id',
            'aruti' => 'required|exists:privilege_levels,id',
            'sap' => 'required|exists:privilege_levels,id',
            'nhifId' => 'required|exists:nhif_qualifications,id',
            'active_drt' => 'required|exists:privilege_levels,id',
            'VPN' => 'required|exists:privilege_levels,id',
            'pbax' => 'required|exists:privilege_levels,id',
            // 'starting_date' => 'required|date',
            // 'ending_date' => 'required|date|after:starting_date',
        ]);
        // dd( $validator);

        if ($validator->fails()) {
            \Log::error('Validation failed', ['errors' => $validator->errors()]);
            return response()->json([
                'stauss' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        // Start a database transaction
        try {
            \DB::transaction(function () use ($request) {
                // Convert hardware_request array to a comma-separated string
                $hardwareRequest = $request->input('hardware_request') ? implode(',', $request->input('hardware_request')) : null;

                \Log::info('Hardware request processed', ['hardware_request' => $hardwareRequest]);

                // Create ICT Access Resource
                $ict = IctAccessResource::create([
                    'privilegeId' => $request->input('privilegeId'),
                    'email' => $request->input('email'),
                    'userId' => $request->input('userId'),
                    'hmisId' => $request->input('hmisId'),
                    'aruti' => $request->input('aruti'),
                    'sap' => $request->input('sap'),
                    'nhifId' => $request->input('nhifId'),
                    'hardware_request' => $hardwareRequest,
                    'network_folder' => $request->input('network_folder'),
                    'folder_ privilege' => $request->input('folder_privilege'),
                    'active_drt' => $request->input('active_drt'),
                    'VPN' => $request->input('VPN'),
                    'pbax' => $request->input('pbax'),
                    'status' => $request->input('status'),
                    'physical_access' => $request->input('physical_access'),
                    'starting_date' => $request->input('starting_date'),
                    'ending_date' => $request->input('ending_date'),
                    'delete_status' => 0,
                ]);


                \Log::info('ICT Access Resource created', ['ict' => $ict]);

                // Save workflow for ICT Access Resource
                $workflow = $this->saveWorkflow([
                    'user_id' => Auth::user()->id,
                    'ict_request_resource_id' => $ict->id,
                    'work_flow_status' => 'sent to approval',
                    'work_flow_completed' => 0,
                ]);

                \Log::info('Workflow saved', ['workflow' => $workflow]);

                // Save initial workflow history
                $this->saveWorkflowHistory([
                    'work_flow_id' => $workflow->id,
                    'forwarded_by' => Auth::user()->id,
                    'attended_by' => Auth::user()->id,
                    'status' => '1',
                    'remark' => 'ICT Access Resource',
                    'attend_date' => Carbon::now()->format('d F Y'),
                    'parent_id' => null,
                ]);

                \Log::info('Initial workflow history saved');

                // Find the approver based on role (e.g., Line Manager)
                $approver = $this->findLineManagerForRequesterDepartment();
                $user = Auth::user();

                // Send notification email to approver
                    $requestDetails = [
                        'forwarded_by' => $user->username,
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
                    // Mail::to($approver->email)->send(new ApprovalRequestNotification($approver, $requestDetails));
                                    // dd($approver );
                                    \Log::info('Approver found', ['approver' => $approver]);
                    // dd($approver);
                // Forward for approval
                $this->forwardWorkflowHistory([
                    'work_flow_id' => $workflow->id,
                    'forwarded_by' => Auth::user()->id,
                    'attended_by' => $approver->id,
                    'status' => '0',
                    'remark' => 'Forwarded for approval',
                    'attend_date' => Carbon::now()->format('d F Y'),
                    'parent_id' => $workflow->id,
                ]);
                // dd(12345);


            });

            Alert::success('IT access form request submitted successfully', 'IT access Request Added');
                return redirect()->route('request.index')->with('success', 'IT access form request submitted successfully');

        } catch (\Exception $e) {

            // Log the exact error message for better debugging
            \Log::error('Error storing IT Access Resource: ' . $e->getMessage(), ['exception' => $e]);
            Alert::error('Failed to submit IT access form request', 'Error');
            return back()->withInput()->withErrors(['error' => 'Failed to process request. Please try again.']);
        }
    }


    public function saveWorkflow($input)
    {
        // dd($input);
        return Workflow::create($input);
    }


    public function saveWorkflowHistory($input)
    {
        return WorkFlowHistory::create($input);
    }

   // Method to find Line Manager for Requester department
public function findLineManagerForRequesterDepartment()
{
    try {
        // Role name of the Line Manager
        $approverRoleName = 'line-manager';

        // Department ID of the Requester (replace with your dynamic logic)
        $requesterDepartmentId = Auth::user()->deptId; // Adjust based on your actual department ID field

        // Query to find the Line Manager with 'line-manager' role and requester's department
        $approver = User::role($approverRoleName)
            ->where('deptId', $requesterDepartmentId)
            ->first();

        if (!$approver) {
            throw new \Exception('Line Manager for Requester department not found or unauthorized');
        }

        return $approver;
    } catch (\Exception $e) {
        // Log the error for debugging purposes
        \Log::error('Error finding Line Manager: ' . $e->getMessage());

        // Throw exception further for error handling in calling method
        throw $e;
    }
}

    public function forwardWorkflowHistory($input)
    {
        return WorkFlowHistory::create($input);
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
        dd(123);
        $user = Auth::user();
        $qualifications = NhifQualification::where('delete_status', 0)->get();
        $privileges = PrivilegeLevel::where('delete_status', 0)->get();
        $rmk = Remark::where('delete_status', 0)->get();
        $hmis = HMISAccessLevel::where('delete_status', 0)->get();
        $form = Workflow::findOrFail($id);

        try {
            $ictForm = IctAccessResource::findOrFail($id);
            $ictForm->hardware_request = explode(',', $ictForm->hardware_request);

        } catch (ModelNotFoundException $e) {
            return redirect()->route('some.error.route')->with('error', 'Clearance form not found.');
        }

        return view('ict-access-form.edit', compact('ictForm','form', 'user', 'qualifications', 'privileges', 'hmis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
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
            \Log::error('Validation failed', ['errors' => $validator->errors()]);
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        // Start a database transaction
        try {
            \DB::transaction(function () use ($request, $id) {
                // Find the existing ICT Access Resource
                $ict = IctAccessResource::findOrFail($id);

                // Update the existing record with new data
                $hardwareRequest = $request->input('hardware_request') ? implode(',', $request->input('hardware_request')) : null;

                $ict->update([
                    'privilegeId' => $request->input('privilegeId'),
                    'email' => $request->input('email'),
                    'userId' => $request->input('userId'),
                    'hmisId' => $request->input('hmisId'),
                    'aruti' => $request->input('aruti'),
                    'sap' => $request->input('sap'),
                    'nhifId' => $request->input('nhifId'),
                    'hardware_request' => $hardwareRequest,
                    'network_folder' => $request->input('network_folder'),
                    'folder_privilege' => $request->input('folder_privilege'),
                    'active_drt' => $request->input('active_drt'),
                    'VPN' => $request->input('VPN'),
                    'pbax' => $request->input('pbax'),
                    'status' => $request->input('status'),
                    'physical_access' => $request->input('physical_access'),
                    'starting_date' => $request->input('starting_date'),
                    'ending_date' => $request->input('ending_date'),
                    'delete_status' => 0,
                ]);

                \Log::info('ICT Access Resource updated', ['ict' => $ict]);

                // Save new workflow for updated ICT Access Resource
                $workflow = $this->saveWorkflow([
                    'user_id' => Auth::user()->id,
                    'ict_request_resource_id' => $ict->id,
                    'work_flow_status' => 'sent to approval',
                    'work_flow_completed' => 0,
                ]);

                \Log::info('New Workflow saved for update', ['workflow' => $workflow]);

                // Save workflow history for the updated request
                $this->saveWorkflowHistory([
                    'work_flow_id' => $workflow->id,
                    'forwarded_by' => Auth::user()->id,
                    'attended_by' => Auth::user()->id,
                    'status' => '1',
                    'remark' => 'Updated ICT Access Resource',
                    'attend_date' => Carbon::now()->format('d F Y'),
                    'parent_id' => null,
                ]);

                \Log::info('Workflow history saved for update');

                // Find the approver based on role (e.g., Line Manager)
                $approver = $this->findLineManagerForRequesterDepartment();
                $user = Auth::user();

                // Send notification email to approver
                $requestDetails = [
                    'forwarded_by' => $user->username,
                    'request' => "IT Access Form (Updated)",
                    'requestDate' => Carbon::now()->format('d F Y'),
                ];

                if ($approver) {
                    $mail = new ApprovalRequestNotification();
                    $mail->approver = $approver;
                    $mail->requestDetails = $requestDetails;
                    Mail::to($approver->email)->send($mail);
                } else {
                    throw new \Exception('Approver not found');
                }

                \Log::info('Approver found for update', ['approver' => $approver]);

                // Forward for approval
                $this->forwardWorkflowHistory([
                    'work_flow_id' => $workflow->id,
                    'forwarded_by' => Auth::user()->id,
                    'attended_by' => $approver->id,
                    'status' => '0',
                    'remark' => 'Forwarded for approval after update',
                    'attend_date' => Carbon::now()->format('d F Y'),
                    'parent_id' => $workflow->id,
                ]);
            });

            Alert::success('IT access form updated and submitted for approval', 'IT access Request Updated');
            return redirect()->route('request.index')->with('success', 'IT access form updated and submitted for approval');

        } catch (\Exception $e) {
            \Log::error('Error updating IT Access Resource: ' . $e->getMessage(), ['exception' => $e]);
            Alert::error('Failed to update IT access form request', 'Error');
            return back()->withInput()->withErrors(['error' => 'Failed to process request. Please try again.']);
        }
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
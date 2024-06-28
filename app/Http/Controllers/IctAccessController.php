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
        Alert::success('IT access form request submit successful','IT access Request Added');
        return redirect()->route('form.index')->with('success', 'ICT Access Resource created successfully.');
    }

     public function requestApprovalList(){
        //get user logeid in role
         $userRole=Auth::user()->getRoleNames()->first();

         $requestList=[];

        switch ($userRole) {
            case 'Line Manager Department':
                $requestList=IctAccessResource::where('status',0)->get();
                break;
                case 'HR':
                    $requestList=IctAccessResource::where('status',1)->get();
                    break;
                    case 'Linear Manager IT':
                        $requestList=IctAccessResource::where('status',2)->get();
                        break;
                        //add othere required roles for approval
                        // case 'value':
                        //     # code...
                        //     break;
                        case 'Admin':
                            $requestList=IctAccessResource::all();
                            break;
            default:
                abort(404);
                break;
        }
        return view('aproval form',[
            'requestList' =>$requestList
        ]);
     }

     public function viewApprovalRequest(IctAccessResource $form){  

        return view ('getting the form',[
            'formData' => $form
        ]);
     }

     public function approveRequest(Request $request){
        $status=null;

        $userRole=Auth::user()->getRoleNames()->first();

       switch ($userRole) {
           case 'Linear Manager Department':
               $status=1;
               break;
               case 'HR':
                $status=2;
                   break;
                   case 'Linear Manager IT':
                    $status=3;
                       break;
       }

       $form=IctAccessResource::find($request->id);
       $form->status=$status;
       $form->save();

       //return as success

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

<?php

namespace App\Http\Controllers;

use App\Models\Clearance_work_flow;
use App\Models\Clearance_work_flow_history;
use App\Models\HMISAccessLevel;
use App\Models\User;
use App\Models\Workflow;
use App\Models\WorkFlowHistory;
use Auth;
use App\Models\NhifQualification;
use App\Models\PrivilegeLevel;
use App\Models\Remark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index1()
    {
        try {
            if (!Auth::check()) {
                return redirect()->route('login'); // Ensure the user is authenticated
            }

            $userId = Auth::user()->id;

            $form = Workflow::where('user_id', $userId)->get();
        // Initialize an empty array to store histories for each form
        $histories = [];
        // Fetch histories for each form
        foreach ($form as $aform) {
            $history = WorkFlowHistory::where('work_flow_id', $aform->id)->get();
            $histories[$aform->id] = $history; // Store histories keyed by form ID
        }

        // dd($form, $histories);

        return view('myrequest.index', compact('form', 'histories'));

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

//     public function index()
// {
//     try {
//         if (!Auth::check()) {
//             return redirect()->route('login'); // Ensure the user is authenticated
//         }

//         $userId = Auth::user()->id;

//         // Fetch Workflow Forms
//         $form = Workflow::where('user_id', $userId)->get();
//         $histories = [];
//         foreach ($form as $aform) {
//             $history = WorkFlowHistory::where('work_flow_id', $aform->id)->get();
//             $histories[$aform->id] = $history;
//         }

//         // Fetch Clearance Forms
//         $clearForm = Clearance_work_flow::where('user_id', $userId)->get();
//         $clearHistories = [];
//         foreach($clearForm as $exit) {
//             $clearHistory = Clearance_work_flow_history::where('work_flow_id', $exit->id)->get();
//             $clearHistories[$exit->id] = $clearHistory;
//         }

//         // Pass both forms and histories to the view
//         return view('myrequest.index', compact('form', 'histories', 'clearForm', 'clearHistories'));

//     } catch (\Exception $e) {
//         dd($e->getMessage());
//     }
// }

public function index()
{
    try {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userId = Auth::user()->id;

        // Fetch and sort Workflow Forms
        $form = Workflow::where('user_id', $userId)
                        ->orderBy('created_at', 'desc') // Sort by creation date descending
                        ->get();

        $histories = [];
        foreach ($form as $aform) {
            $history = WorkFlowHistory::where('work_flow_id', $aform->id)->get();
            $histories[$aform->id] = $history;
        }

        // Fetch and sort Clearance Forms
        $clearForm = Clearance_work_flow::where('user_id', $userId)
                                        ->orderBy('created_at', 'desc') // Sort by creation date descending
                                        ->get();

        $clearHistories = [];
        foreach ($clearForm as $exit) {
            $clearHistory = Clearance_work_flow_history::where('work_flow_id', $exit->id)->get();
            $clearHistories[$exit->id] = $clearHistory;
        }

        // Pass both forms and histories to the view
        return view('myrequest.index', compact('form', 'histories', 'clearForm', 'clearHistories'));

    } catch (\Exception $e) {
        dd($e->getMessage());
    }
}


    public function getClear(){
        try{
            if(!Auth::check()){
             return redirect()->route('login');
            }
            $userId = Auth::user()->id;
            $clearForm = Clearance_work_flow::where('user_id', $userId)->get();

              $clearHistories = [];
                foreach($clearForm as $exit){
                  $clearHistory = Clearance_work_flow_history::where('work_flow_id', $exit->id)->get();
                  $clearHistories = [$exit->id] = $clearHistory;
                }

                return view('myrequest.index', compact('clearForm', 'clearHistories'));

        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
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
        $user = Auth::user();
        $qualifications = NhifQualification::where('delete_status', 0)->get();
        $privileges = PrivilegeLevel::where('delete_status', 0)->get();
        // $rmk = Remark::where('delete_status', 0)->get();
        $hmis = HMISAccessLevel::where('delete_status', 0)->get();
        $form = Workflow::findOrFail($id);
        return view('ict-access-form.edit', compact('form', 'user','qualifications','privileges','hmis'));
    }


    public function editClearance(string $id)
    {
        $user = Auth::user();
        $qualifications = NhifQualification::where('delete_status', 0)->get();
        $privileges = PrivilegeLevel::where('delete_status', 0)->get();
        // $rmk = Remark::where('delete_status', 0)->get();
        $hmis = HMISAccessLevel::where('delete_status', 0)->get();
        $clearform = Clearance_work_flow::findOrFail($id);
        return view('clearance.edit', compact('clearform', 'user','qualifications','privileges','hmis'));
    }
//     public function edit($id)
// {

//     $request = Request::findOrFail($id);

//     switch ($request->form_type) {
//         case 'form_type_1':
//             return view('myrequest.edit_form_type_1', compact('request'));
//         case 'form_type_2':
//             return view('myrequest.edit_form_type_2', compact('request'));
//         // Add more cases as needed for different form types
//         default:
//             abort(404); // Handle unknown form types
//     }
//}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = Workflow::findOrFail($id);
        $requestData->update($request->all());
        return redirect()->route('request.index')->with('success', 'Request updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = Workflow::findOrFail($id);
        $request->delete();
        return redirect()->route('request.index')->with('success', 'Request deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform your query to filter requests based on the $query parameter
        $requests = Workflow::where('field_to_search', 'like', '%'.$query.'%')->get();

        return view('requests.index', compact('requests'));
    }


}

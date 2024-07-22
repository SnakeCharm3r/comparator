<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Workflow;
use App\Models\WorkFlowHistory;
use Auth;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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

    // Controller method (e.g., RequestsController)
public function search(Request $request)
{
    $query = $request->input('query');

    // Perform your query to filter requests based on the $query parameter
    $requests = Request::where('field_to_search', 'like', '%'.$query.'%')->get();

    return view('requests.index');
}

// public function index()
// {
//     try {
//         if (!Auth::check()) {
//             return redirect()->route('login'); // Ensure the user is authenticated
//         }

//         $userId = Auth::user()->id;

//         $form = Workflow::where('user_id', $userId)->get();

//     // Initialize an empty array to store histories for each form
//     $histories = [];

//     // Fetch histories for each form
//     foreach ($form as $aform) {
//         $history = WorkFlowHistory::where('work_flow_id', $aform->id)->get();
//         $histories[$aform->id] = $history; // Store histories keyed by form ID
//     }

//     // dd($form, $histories);

//     return view('myrequest.index', compact('form', 'histories'));

//     } catch (\Exception $e) {
//         dd($e->getMessage());
//     }
// }

}

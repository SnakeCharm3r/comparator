<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CcbrtRelation;
use App\Models\User;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CcbrtRelationController extends Controller
{
    /**
     * Display the form for adding CCBRT relation details.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $user = Auth::user();
    //     $departments = Departments::all();
    //     $relations = CcbrtRelation::where('userId', $user->id)->get();
    //     // Fetch the authenticated user's data
    //     $user = User::find($user->id);

    //     return view('ccbrt_relation.index', compact('user', 'departments', 'relations'));
    // }

    public function index()
{
    $user = Auth::user();
    $departments = Departments::all()->keyBy('id'); // Use keyBy to access department by ID
    $relations = CcbrtRelation::where('userId', $user->id)->get();

    // Fetch the authenticated user's data
    $user = User::find($user->id);

    // Map relations to include department names
    $relations = $relations->map(function ($relation) use ($departments) {
        $relation->department_name = $departments->get($relation->department)->dept_name ?? 'Unknown';
        return $relation;
    });

    return view('ccbrt_relation.index', compact('user', 'departments', 'relations'));
}

    /**
     * Store newly created CCBRT relation data in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addRelationData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required|exists:users,id',
            'names' => 'required|string|max:255',
            'position' => 'required',
            'department' => 'required', // Ensure deptId is required
            'relation' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()
            ]);
        }

        // Create the relation record
        $relate = CcbrtRelation::create([
            'userId' => $request->input('userId'),
            'names' => $request->input('names'),
            'position' => $request->input('position'),
            'department' => $request->input('department'), // Ensure deptId is saved correctly
            'relation' => $request->input('relation'),
        ]);

        // Optionally, add a success alert
        Alert::success('Relationship added successful', 'CCbrt Related user added');

        // Redirect with success message
        return redirect()->route('ccbrt_relation.index')->with('success', 'Relation details added successfully.');
    }


// Show form to edit a family member's details
public function edit($id)
{
    $relate = CcbrtRelation::findOrFail($id);
    return view('family-details.edit', compact('familyDetail'));
}

public function update(Request $request, $id)
{
    $relation = CcbrtRelation::findOrFail($id);

    $relation->update([
        'names' => $request->names,
        'relation' => $request->relation,
        'department' => $request->department,
        'position' => $request->position,
    ]);
    Alert::success('Successful', 'CCBRT relation updated successful');
    return redirect()->route('ccbrt_relation.index')->with('success', 'Relation updated successfully!');
}


    public function editRelationData(Request $request,$id){

    }
    public function destroy(string $id)
    {
        $relate = CcbrtRelation::find($id);

        if (!$relate) {
            return redirect()->route('ccbrt_relation.index')->with('error', 'Record not found.');
        }

        $relate->delete();

        return redirect()->route('ccbrt_relation.index')->with('success', 'Record deleted successfully.');
    }




}

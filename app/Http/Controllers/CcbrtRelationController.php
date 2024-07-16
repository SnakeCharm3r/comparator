<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CcbrtRelation;
use App\Models\User; // Make sure to import the User model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CcbrtRelationController extends Controller
{
    /**
     * Display the form for adding CCBRT relation details.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // Fetch the authenticated user's data
        $user = User::find($user->id);

        return view('ccbrt_relation.index', compact('user'));
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
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'relation' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        CcbrtRelation::create($request->all());

        return redirect()->route('ccbrt_relation.index')->with('success', 'Relation details added successfully.');
    }
}

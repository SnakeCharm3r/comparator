<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HealthDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HealthDetailsController extends Controller
{
    /**
     * Display a listing of the health details.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $healthDetails = HealthDetails::with('user')->get();

        // Fetch the authenticated user's data with profile picture
        $user = User::find($user->id);

        return view('health-details.index', compact('healthDetails', 'user'));
    }

    /**
     * Store a newly created health detail in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addHealthData(Request $request)
    {
        $request->validate([
            'userId' => 'required|exists:users,id',
            'physical_disability' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:10',
            'illness_history' => 'nullable|string',
            'health_insurance' => 'nullable|string|max:255',
            'insur_name' => 'nullable|string|max:255',
            'insur_no' => 'nullable|string|max:50',
            'allergies' => 'nullable|string',
            'delete_status' => 'nullable|boolean',
        ]);

        $healthDetail = HealthDetails::create($request->all());

        return redirect()->route('health-details.index')
                        ->with('success', 'Health detail added successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CcbrtRelation;
use App\Models\HealthDetails;
use App\Models\LanguageKnowledge;
use App\Models\Policy;
use App\Models\User;
use App\Models\UserAdditionalInfo;
use App\Models\UserFamilyDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()

    {
        $user = Auth::user();
        $policies = Policy::all();
        return view('user_profile.index', compact('user','policies'));
    }

    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'profile_pictures/' . $filename;

            Storage::disk('public')->put($filePath, file_get_contents($file));

            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $user->profile_picture = $filePath;
            $user->save();
        }
        Alert::success('Profile picture update successfully', 'Profile picture updated');
        return back()->with('success', 'Profile picture updated successfully.');
    }

    public function create()
    {
        //
    }

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
        $user = Auth::user();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        return view('user_profile.edit', compact('user'));
    }

public function update(Request $request, string $id)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'DOB' => 'required',
 ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 400,
            'error' => $validator->errors()
        ]);
    }

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user details
    $user->fname = $request->input('fname');
    $user->mname = $request->input('mname');
    $user->lname = $request->input('lname');
    $user->username = $request->input('username');
    $user->DOB = $request->input('DOB');
    $user->gender = $request->input('gender');
    $user->marital_status = $request->input('marital_status');
    $user->email = $request->input('email');
    $user->religion = $request->input('religion');
    $user->mobile = $request->input('mobile');
    $user->home_address = $request->input('home_address');
    $user->district = $request->input('district');
    $user->region = $request->input('region');
    $user->box_no = $request->input('box_no');
    $user->plot_no = $request->input('plot_no');
    $user->popular_landmark = $request->input('popular_landmark');
    $user->professional_reg_number = $request->input('professional_reg_number');
    $user->place_of_birth = $request->input('place_of_birth');
    $user->house_no = $request->input('house_no');
    $user->street = $request->input('street');
    $user->NIN = $request->input('NIN');
    $user->nssf_no = $request->input('nssf_no');
    $user->domicile = $request->input('domicile');

    // Handle CV upload if a new file is provided
    if ($request->hasFile('employee_cv')) {
        $file = $request->file('employee_cv');
        $path = $file->store('cvs'); // Store in the 'cvs' directory
        $user->employee_cv = $path; // Save the new path to the database
    }

    // Save the updated user record
    $user->save();

    // Redirect or respond with success message
    return redirect()->route('profile.index')->with('success', 'User updated successfully.');
}


    public function destroy(string $id)
    {
        //
    }
}

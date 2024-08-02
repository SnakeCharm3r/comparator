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
    /**
     * Display a listing of the resource.
     */
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

            // Store the file in the public disk
            Storage::disk('public')->put($filePath, file_get_contents($file));

            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Update the user profile picture path
            $user->profile_picture = $filePath;
            $user->save();
        }
        Alert::success('Profile picture update successfully', 'Profile picture updated');
        return back()->with('success', 'Profile picture updated successfully.');
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
        return view('user_profile.edit', compact('user'));
    }

  /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|:users,email',
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
    // $user->job_title = $request->input('job_title');
    $user->home_address = $request->input('home_address');
    $user->district = $request->input('district');
    $user->region = $request->input('region');
    $user->professional_reg_number = $request->input('professional_reg_number');
    $user->place_of_birth = $request->input('place_of_birth');
    $user->house_no = $request->input('house_no');
    $user->street = $request->input('street');
    // $user->deptId = $request->input('deptId');
    // $user->employment_typeId = $request->input('employment_typeId');
    // $user->health_info_Id = $request->input('health_info_Id');
    $user->employee_cv = $request->input('employee_cv');
    $user->NIN = $request->input('NIN');
    $user->nssf_no = $request->input('nssf_no');
    $user->domicile = $request->input('domicile');

    // Save the updated user record
    $user->save();

    // Redirect or respond with success message
    return redirect()->route('profile.index')->with('success', 'User updated successfully.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Policy;
use App\Models\JobTitle;
use App\Models\Departments;
use Illuminate\Http\Request;
use App\Models\EmploymentTypes;
use App\Models\UserFamilyDetails;
use App\Models\UserAdditionalInfo;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{

    public function login(){
        return view('auth.login');

    }
    //get All user
    public function getAllUser(){
        $users = User::all();

        return view('role-permission/user.index', compact('users'));
    }

    public function employee($id)
    {

        $user = User::findOrFail($id);
        $policies = Policy::all();
        return view('employees_details.show', compact('user','policies'));
    }

    public function changedept($id)
{
    // Fetch the user by ID

    $user = User::findOrFail($id);
$policies = Policy::all();
    // Pass the user to the view
    return view('employees_details.show', compact('user','policies'));
}


public function update(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'department' => 'required|string|max:255',
        'job_title' => 'required|string|max:255',
        'ccb_code' => 'required|string|max:255',
        'professional_reg_number' => 'required|string|max:255',
        'nssf_no' => 'required|string|max:255',
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user details
    $user->update([
        'department' => $request->input('department'),
        'job_title' => $request->input('job_title'),
        'ccb_code' => $request->input('ccb_code'),
        'professional_reg_number' => $request->input('professional_reg_number'),
        'nssf_no' => $request->input('nssf_no'),
    ]);

    // Return a JSON response for AJAX
    return response()->json([
        'success' => true,
        'message' => 'User details updated successfully.',
    ]);
}


    public function userDetail(){

            $users = User::select('users.*', 'language_knowledge.language')
            ->leftJoin('language_knowledge', 'users.id', '=', 'language_knowledge.userId')
            ->get();

            // dd($users);
        return view('employees_details.index', compact('users'));
    }





    // find user by ID
    public function getUserById($id) {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->withErrors(['user_not_found' => 'User not found']);
        }
        return view('user.show', compact('user'));
    }

    public function handleLogin(Request $request) {
        // Validate the username and password
        $validator = Validator::make($request->all(), [
            'username' => 'required',  // Use the provided username field
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Attempt to authenticate using the provided username and password
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->route('dashboard')->with('success', 'Logged in successfully.');
        } else {
            return redirect()->back()->withErrors(['login_error' => 'Invalid username or password'])->withInput();
        }
    }

public function getJobTitles($deptId){
    $jobTitles = JobTitle::where('deptId', $deptId)->get();
    return response()->json($jobTitles);

}


    public function register() {
        $policies = Policy::all();
        $departments = Departments::all();
        $employmentTypes = EmploymentTypes::all();
        // $jobTitles = JobTitle::all();

        return view('auth.registration', compact('departments', 'employmentTypes','policies'));
    }

    public function handleRegistration(Request $request){
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'job_title' => 'required',
            'email' => 'required|email|unique:users',
            'deptId' => 'required',
            'DOB' => 'required',
            'employment_typeId' => 'required',
            'password' => 'required|min:6',
            'mobile' => 'required',  // Ensure mobile number is required
            'country_code' => 'required',  // Ensure country_code is required
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()
            ]);

        }
        // $dob = \DateTime::createFromFormat('d-m-Y', $request->input('DOB'))->format('Y-m-d');
        $username = strtolower($request->input('fname')) . '.' . strtolower($request->input('lname'));
        $countryCode = $request->input('country_code');
       $mobile = $request->input('mobile');
       $phoneNumber = $countryCode . $mobile;
        $user = User::create([
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'lname' => $request->input('lname'),
            // 'username' => $request->input('username'),
            'username' => $username,
            'DOB' => $request->input('DOB'),
            // 'DOB' => $request->input('DOB'),
            'gender' => $request->input('gender'),
            'marital_status' => $request->input('marital_status'),
            'email' => $request->input('email'),
            'religion' => $request->input('religion'),
            'mobile' => $phoneNumber,
            'job_title' => $request->input('job_title'),
            'home_address' => $request->input('home_address'),
            'district' => $request->input('district'),
            'region' => $request->input('region'),
            'professional_reg_number' => $request->input('professional_reg_number'),
            'place_of_birth'   => $request->input('place_of_birth'),
            'house_no' => $request->input('house_no'),
            'street' => $request->input('street'),
            'deptId' => $request->input('deptId'),
            'employment_typeId' => $request->input('employment_typeId'),
            // 'health_info_Id' => $request->input('health_info_Id'),
            'employee_cv' => $request->input('employee_cv'),
            'NIN' => $request->input('NIN'),
            'nssf_no' => $request->input('nssf_no'),
            'domicile' => $request->input('domicile'),
            'password' => Hash::make($request->input('password')),

        ]);
            $user->assignRole('requester');
            Auth::login($user);
            Alert::success('User Registered Successful','Please Provide Your Signature');
        return redirect()->route('login');

}

   //Function shows edit user form
   public function showEditForm($id){
    $user = User::findOrFail($id);
    $roles = Role::get();
    $userRoles = $user->roles->pluck('name')->toArray(); // Get user roles

    return view('role-permission/user.edit', compact('user','roles', 'userRoles'));
}

//This for user role assigment
    public function editUserRole(Request $request, $userId)
     {
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'required|exists:roles,name',
        ]);
        $user = User::findOrFail($userId);
        $user->syncRoles([$request->roles]);  // Changed to syncRoles to remove any previous roles
        return redirect('users')->with('status', 'Role assigned successfully');
    }

    // Show Assign Role Form
    public function showAssignRoleForm($userId)
    {
        $user = User::findOrFail($userId);
        $roles = Role::all();

        return view('user.assign-role', compact('user', 'roles'));
    }

    // Show Remove Role Form
    public function showRemoveRoleForm($userId)
    {
        $user = User::findOrFail($userId);

        return view('user.remove-role', compact('user'));
    }

    // Remove Role from User
    public function removeRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($userId);
        $user->removeRole($request->role);

        return redirect()->back()->with('status', 'Role removed successfully');
    }

        public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('status', 'User deleted successfully.');
    }


    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showChangePasswordForm()
    {
        return view('user_profile.pass');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|different:current_password',
            'new_password_confirmation' => 'required|string|same:new_password',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        Alert::success('Password changed Successful','Please proceed');
        return redirect()->route('user_profile.pass')->with('success', 'Password changed successfully.');
    }

    public function showForgetPasswordForm()
    {
        return view('auth.forget'); // Assuming you have a view file for this
    }

    public function forgetPassChange(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);

        $res = Password::sendResetLink($request->only('email'));

        return $res === Password::RESET_LINK_SENT
        ? back()->with('status', trans($res)) : back()
        ->withErrors(['email' => trans($res)]);
    }

    public function showResetPasswordForm($token){
        return view('auth.reset', ['token' => $token]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);
        //Attempt to reset password
        $res = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        // Check the response and return appropriate message
    return $res === Password::PASSWORD_RESET
    ? redirect()->route('login')->with('status', trans($res))
    : back()->withErrors(['email' => trans($res)]);
    }

}

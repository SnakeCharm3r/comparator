<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Policy;
use App\Models\Departments;
use Illuminate\Http\Request;
use App\Models\EmploymentTypes;
use App\Models\UserFamilyDetails;
use App\Models\UserAdditionalInfo;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    // Pass the user to the view
    return view('employees_details.show', compact('user'));
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

    // Redirect with a success message
    return redirect()->route('employees_details.show', $id)->with('success', 'User details updated successfully.');
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

    //Function shows edit user form
    public function showEditForm($id){
        $user = User::findOrFail($id);
        $roles = Role::get();
        $userRoles = $user->roles->pluck('name')->toArray(); // Get user roles

        return view('role-permission/user.edit', compact('user','roles', 'userRoles'));
    }

    public function handleLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->route('dashboard')->with('success', 'Logged in successfully.');
        } else {
            return redirect()->back()->withErrors(['login_error' => 'Invalid username or password'])->withInput();
        }
    }



    public function register() {
        $policies = Policy::all();
        $departments = Departments::all();
        $employmentTypes = EmploymentTypes::all();

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
        //   'signature' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()
            ]);

        }
        // $dob = \DateTime::createFromFormat('d-m-Y', $request->input('DOB'))->format('Y-m-d');

        $user = User::create([
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'lname' => $request->input('lname'),
            'username' => $request->input('username'),
            'DOB' => $request->input('DOB'),
            // 'DOB' => $request->input('DOB'),
            'gender' => $request->input('gender'),
            'marital_status' => $request->input('marital_status'),
            'email' => $request->input('email'),
            'religion' => $request->input('religion'),
            'mobile' => $request->input('mobile'),
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
            // Example of assigning role
            $user->assignRole('requester');
            Alert::success('User Registered Successful','Please login');
         return redirect()->route('dashboard')->with(
            'success', 'User registered successfully. Please login.');
}

    public function editUserRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);
        $user = User::findOrFail($userId);
        $user->syncRoles([$request->role]);  // Changed to syncRoles to remove any previous roles
        return redirect('role')->with('status', 'Role assigned successfully');
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

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function nextOfKins()
    {
        $user_id = session('userId');
        return view('auth.next_of_kins', compact('userId'));
    }
    public function changePass($id){
        $user = User::findOrFail($id);

        return view('password.index', compact('user'));
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

}

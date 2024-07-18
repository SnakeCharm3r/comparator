<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\EmploymentTypes;
use App\Models\User;
use App\Models\UserAdditionalInfo;
use App\Models\UserFamilyDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;


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
        $departments = Departments::all();
        $employmentTypes = EmploymentTypes::all();

        return view('auth.registration', compact('departments', 'employmentTypes'));
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
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()
            ]);

        }
        //$dob = \DateTime::createFromFormat('d-m-Y', $request->input('DOB'))->format('Y-m-d');

        $user = User::create([
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'lname' => $request->input('lname'),
            'username' => $request->input('username'),
            'DOB' => $request->input('DOB'),
            'gender' => $request->input('gender'),
            'marital_status' => $request->input('marital_status'),
            'email' => $request->input('email'),
            'religion' => $request->input('religion'),
            'mobile' => $request->input('mobile'),
            'job_title' => $request->input('job_title'),
            'home_address' => $request->input('home_address'),
            'district' => $request->input('district'),
            'professional_reg_number' => $request->input('professional_reg_number'),
            'place_of_birth' => $request->input('place_of_birth'),
            'house_no' => $request->input('house_no'),
            'street' => $request->input('street'),
            'deptId' => $request->input('deptId'),
            'employment_typeId' => $request->input('employment_typeId'),
            'health_info_Id' => $request->input('health_info_Id'),
            'employee_cv' => $request->input('employee_cv'),
            'NIN' => $request->input('NIN'),
            'nssf_no' => $request->input('nssf_no'),
            'domicile' => $request->input('domicile'),
//            'deptId' => $request->input('deptId'),
//            'employment_typeId' => $request->input('employment_typeId'),
            'password' => Hash::make($request->input('password')),

        ]);
            // Example of assigning role
            $user->assignRole('super-admin');
            Alert::success('User Registered Successful','Please login');
         return redirect()->route('dashboard')->with(
            'success', 'User registered successfully. Please login.');


    }


    // public function editUserRole(Request $request, $userId)
    // {
    //     $request->validate([
    //         'role' => 'required|exists:roles,name',
    //     ]);
    //     $user = User::findOrFail($userId);
    //     $user->assignRole($request->role);
    //     return redirect()->back()->with('status', 'Role assigned successfully');
    // }
    public function editUserRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);
        $user = User::findOrFail($userId);
        $user->syncRoles([$request->role]);  // Changed to syncRoles to remove any previous roles
        return redirect('role')->with('status', 'Role assigned successfully');
    }
    
//     public function editUserRole(Request $request, $id)
// {
//     $user = User::findOrFail($id);
    
//     $validated = $request->validate([
//         'username' => 'required|string|max:255',
//         'roles' => 'required|string|exists:roles,name',
//     ]);

//     $user->username = $request->input('username');
//     $user->save();

//     // Assuming user roles are stored in a many-to-many relationship
//     $user->roles()->sync([$request->input('roles')]);

//     return redirect()->route('users.index')->with('success', 'User role updated successfully.');
// }

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

}

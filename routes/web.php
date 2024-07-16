<?php

use App\Models\HealthDetails;
use App\Models\PrivilegeLevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HslbController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\RemarkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IctAccessController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HmisAccessController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DataSecurityController;
use App\Http\Controllers\CcbrtRelationController;
use App\Http\Controllers\HealthDetailsController;
use App\Http\Controllers\HumanResourceController;
use App\Http\Controllers\IdCardRequestController;
use App\Http\Controllers\EmploymentTypeController;
use App\Http\Controllers\PrivilegeLevelController;
use App\Http\Controllers\RequestApproveController;
use App\Http\Controllers\ChangeManagementController;
use App\Http\Controllers\NhifQualificationController;
use App\Http\Controllers\UserFamilyDetailsController;

// use App\Http\Controllers\UserFamilyDetailsController;
// use App\Http\Controllers\UserAdditionalInfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.handleLogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'handleRegistration'])->name('register.handleRegistration');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('policies', PolicyController::class);
Route::post('/policies/accept', [PolicyController::class, 'accept'])->name('policies.accept');

Route::group(['middleware'=> 'auth'], function ()
{
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/next-of-kins', [AuthController::class, 'nextOfKins'])->name('auth.next_of_kins');
Route::get('/departments', [DepartmentController::class, 'index']);
// Route::get('/next_of_kins', [UserAdditionalInfoController::class, 'next_of_kins'])->name('next_of_kins');
// Route::post('/nextOfKins', [UserAdditionalInfoController::class, 'addNextOfKins'])->name('nextOfKins.addNextOfKins');

// Route::get('/profile', [UserAdditionalInfoController::class, 'profile'])->name('profile')->middleware('auth');



 Route::get('/family-details', [UserFamilyDetailsController::class, 'index'])->name('family-details.index');
Route::post('/familyData', [UserFamilyDetailsController::class, 'addFamilyData'])->name('family-details.addFamilyData');


Route::get('/health-details', [HealthDetailsController::class, 'index'])->name('health-details.index');
Route::post('/health', [HealthDetailsController::class, 'addHealthData'])->name('health-details.addHealthData');
Route::get('/health-details/{id}/edit', 'HealthDetailsController@edit')->name('health-details.edit');
Route::delete('/health-details/{id}', 'HealthDetailsController@delete')->name('health-details.delete');



Route::get('/relation-details', [CcbrtRelationController::class, 'index'])->name('relation-details.index');
Route::post('/relation', [CcbrtRelationController::class, 'addRelationData'])->name('relation-details.addRelationData');


// Route::post('family-details', UserFamilyDetailsController::class);
// Route::post('/healthDetails', [UserFamilyDetailsController::class, 'addHealthData'])->name('healthDetails.addHealthData');
// Route::post('/languageData', [UserFamilyDetailsController::class, 'addLanguage'])->name('languageData.addLanguage');
// Route::post('/ccbrtRelation', [UserFamilyDetailsController::class, 'addRelation'])->name('ccbrtRelation.addRelation');


Route::resource('/profile', ProfileController::class);
Route::middleware(['auth'])->post('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
Route::post('picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.update.picture');
Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');

//ict-access controller
Route::resource('/form', IctAccessController::class);
Route::resource('/hr', HumanResourceController::class);
Route::resource('/data', DataSecurityController::class);
Route::resource('/change', ChangeManagementController::class);
Route::resource('/department', DepartmentController::class);
Route::resource('/nhif', NhifQualificationController::class);
Route::resource('/hmis', HmisAccessController::class);
Route::resource('/remark', RemarkController::class);
Route::resource('/privilege', PrivilegeLevelController::class);
Route::resource('/employment', EmploymentTypeController::class);
Route::resource('/role',RoleController::class);
Route::resource('/permission',PermissionController::class);
Route::resource('/request',RequestController::class);
Route::resource('/requestapprove',RequestApproveController::class);
Route::resource('/card',IdCardRequestController::class);
Route::resource('/hslb',HslbController::class);
Route::post('hslb/hr-confirm/{id}', [HslbController::class, 'hrConfirm'])->name('hslb.hrConfirm');

Route::get('/users', [AuthController::class, 'getAllUser'])->name('users.index');
Route::get('/users/{id}/edit', [AuthController::class, 'showEditForm'])->name('users.showEditForm');
Route::post('/users/{id}/edit', [AuthController::class, 'editUserRole'])->name('users.edit');
Route::put('/users/{id}/destroy', [AuthController::class, 'destroyUserRole'])->name('users.destroy');
// Route::put('users/{id}', [AuthController::class, 'update'])->name('users.update');
Route::post('users/{id}/role', [AuthController::class, 'editUserRole'])->name('users.edit.role');
Route::delete('/permission/{id}', 'PermissionController@destroy')->name('permission.delete');
Route::post('roles/permissions', [PermissionController::class, 'updateRolePermissions'])->name('role.updatePermissions');
Route::get('role/{roleId}/permissions', [PermissionController::class, 'getRolePermissions']);

Route::post('/approve_form', [FormController::class, 'approveForm'])->name('approve_form');


Route::get('/show_form/{id}', [FormController::class, 'getForm']);


Route::get('/requests/search', 'RequestsController@search')->name('search.requests');



// Route::get('/user', [AuthController::class, 'getAllUser'])->name('users');
// Route::get('/users/create', [AuthController::class, 'create'])->name('users.create');
// Route::get('/user', [AuthController::class, 'assignRole'])->name('role-permission-user.assignRole');
// Route::get('/user', [AuthController::class, 'assignPermission'])->name('role-permission-user.assignPermission');

Route::get('role-permission/{roleId}/give-permission', [RoleController::class, 'addPermissionToRole']);
Route::put('role-permission/{roleId}/give-permission', [RoleController::class, 'givePermissionToRole']);


});



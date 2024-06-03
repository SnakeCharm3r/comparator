<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmploymentTypesController;
use App\Http\Controllers\UserAdditionalInfoController;
use App\Http\Controllers\UserFamilyDetailsController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.handleLogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'handleRegistration'])->name('register.handleRegistration');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/next-of-kins', [AuthController::class, 'nextOfKins'])->name('auth.next_of_kins');



Route::get('/departments', [DepartmentController::class, 'index']);
Route::get('/employment-types', [EmploymentTypesController::class, 'index']);

Route::get('/next_of_kins', [UserAdditionalInfoController::class, 'next_of_kins'])->name('next_of_kins');
Route::post('/nextOfKins', [UserAdditionalInfoController::class, 'addNextOfKins'])->name('nextOfKins.addNextOfKins');

Route::get('/profile', [UserAdditionalInfoController::class, 'profile'])->name('profile')->middleware('auth');


// Route::get('/profile', [UserFamilyDetailsController::class, 'profileFamily'])->name('profileFamily');
Route::post('/familyData', [UserFamilyDetailsController::class, 'addFamilyData'])->name('familyData.addFamilyData');
Route::post('/healthDetails', [UserFamilyDetailsController::class, 'addHealthData'])->name('healthDetails.addHealthData');
Route::post('/languageData', [UserFamilyDetailsController::class, 'addLanguage'])->name('languageData.addLanguage');
Route::post('/ccbrtRelation', [UserFamilyDetailsController::class, 'addRelation'])->name('ccbrtRelation.addRelation');





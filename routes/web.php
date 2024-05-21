<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmploymentTypesController;
use App\Http\Controllers\UserAdditionalInfoController;

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
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'handleRegistration'])->name('register.handleRegistration');

Route::get('/departments', [DepartmentController::class, 'index']);
Route::get('/employment-types', [EmploymentTypesController::class, 'index']);

Route::get('/next_of_kins', [UserAdditionalInfoController::class, 'next_of_kins'])->name('next_of_kins');
Route::post('/nextOfKins', [UserAdditionalInfoController::class, 'addNextOfKins'])->name('nextOfKins.addNextOfKins');




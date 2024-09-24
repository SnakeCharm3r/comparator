<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Models\HealthDetails;
use App\Models\LanguageKnowledge;
use App\Models\Announcement;
use App\Models\JobTitle;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {

        // Logic to fetch and pass data based on roles and permissions
        $policies = Policy::all();
        $announcements = Announcement::with('user')->latest()->get();
        $user = Auth::user()->load('jobTitle');
        $totalUsers = \App\Models\User::count();
        $healthDetails = HealthDetails::join('users', 'health_details.userId', '=', 'users.id')
        ->where('health_details.userId', Auth::user()->id)
        ->select('health_details.*', 'users.*')
        ->get();

        $languageData = LanguageKnowledge::join('users', 'language_knowledge.userId', '=', 'users.id')
        ->where('language_knowledge.userId', Auth::user()->id)
        ->select('language_knowledge.*', 'users.*')
        ->get();




        $data = [];

        if ($user->hasRole('requester')) {
            $data['requester_content'] = 'Content for requesters';
        }

        if ($user->hasRole('head of hr')) {
            $data['hr_content'] = 'Content for HR heads';
        }

        if ($user->hasRole('head of it')) {
            $data['it_content'] = 'Content for IT heads';
        }

        if ($user->hasRole('head of department')) {
            $data['hod_content'] = 'Content for heads of department';
        }

        if ($user->hasRole('acting hod')) {
            $data['acting_hod_content'] = 'Content for acting heads of department';
        }

        if ($user->hasRole('super admin')) {
            $data['admin_content'] = 'Content for super admin';
        }

        return view('dashboard', compact('data','policies','user','healthDetails','languageData','totalUsers','announcements'));
    }

    public function dashboard()
    {
        $showAlert = false;

        if (auth()->check()) {
            $user = auth()->user();

            // Check if the session variable for first login is set
            if (!session()->has('first_login_shown')) {
                // Set session variable
                session(['first_login_shown' => true]);
                $showAlert = true;
            }
        }

        // Check if the signature is empty
        $signature = !empty($user->signature);

        // Debugging statement
        \Log::info('Show Alert: ' . ($showAlert ? 'true' : 'false'));

        return view('dashboard', compact('showAlert','hasSignature'));
    }




}

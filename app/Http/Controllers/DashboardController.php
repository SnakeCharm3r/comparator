<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Logic to fetch and pass data based on roles and permissions
        $policies = Policy::all();
        $user = Auth::user();
       
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

        return view('dashboard', compact('data','policies'));
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
    
        // Debugging statement
        \Log::info('Show Alert: ' . ($showAlert ? 'true' : 'false'));
    
        return view('dashboard', compact('showAlert'));
    }
    


}

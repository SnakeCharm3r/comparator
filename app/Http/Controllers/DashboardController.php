<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Logic to fetch and pass data based on roles and permissions
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

        return view('dashboard', compact('data'));
    }

}

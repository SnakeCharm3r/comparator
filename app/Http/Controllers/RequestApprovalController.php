<?php

namespace App\Http\Controllers;

use App\Models\IctAccessResource;
use App\Models\User;
use App\Notifications\RequestApprovalNotification;
use Auth;
use Illuminate\Http\Request;

class RequestApprovalController extends Controller
{
    //

    public function index(){

    }

    public function approve($id)
    {
        $request = IctAccessResource::find($id);
        $user = Auth::user();

        dd($user);

        if ($user->hasRole('line-manager') && $user->id == $request->user->line_manager_id) {
            $request->approved_by_line_manager = true;
        } elseif ($user->hasRole('line-manager-hr')) {
            $request->approved_by_hr_manager = true;
        } elseif ($user->hasRole('it-manager')) {
            $request->approved_by_it_manager = true;
        } elseif ($user->hasRole('it')) {
            $request->approved_by_admin = true;
        }

        $request->save();

        // Check and notify next approver
        $this->checkAndNotifyNextApprover($request);

        return redirect()->back()->with('success', 'Request approved successfully.');
    }

    public function checkAndNotifyNextApprover($request)
    {
        $lineManager = User::role('line-manager')->where('department_id', $request->user->department_id)->first();
        $hrManager = User::role('hr-manager')->first();
        $itManager = User::role('it-manager')->first();
        $admin = User::role('admin')->first();

        if ($request->approved_by_line_manager && $hrManager) {
            $hrManager->notify(new RequestApprovalNotification($request, 'line-manager-hr'));
        }

        if ($request->approved_by_hr_manager && $itManager) {
            $itManager->notify(new RequestApprovalNotification($request, 'it-anager'));
        }

        if ($request->approved_by_it_manager && $admin) {
            $admin->notify(new RequestApprovalNotification($request, 'it'));
        }
    }
}

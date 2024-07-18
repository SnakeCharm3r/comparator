<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserFamilyDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserFamilyDetailsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $familyData = UserFamilyDetails::where('userId', $user->id)->get();
        return view('family-details.index', compact('familyData', 'user'));
    }

  // Method to store new family member
  public function addFamilyData(Request $request)
  {
      $request->validate([
          'familyData.*.full_name' => 'required|string',
          'familyData.*.relationship' => 'required|string',
          'familyData.*.DOB' => 'required|date',
          'familyData.*.phone_number' => 'nullable|string',
          'familyData.*.occupation' => 'nullable|string',
      ]);

      $user = Auth::user();

      foreach ($request->familyData as $data) {
          $familyDetail = new UserFamilyDetails();
          $familyDetail->userId = $user->id;
          $familyDetail->full_name = $data['full_name'];
          $familyDetail->relationship = $data['relationship'];
          $familyDetail->DOB = $data['DOB'];
          $familyDetail->phone_number = $data['phone_number'];
          $familyDetail->occupation = $data['occupation'];
          $familyDetail->save();
      }

      return redirect()->route('family-details.index')->with('success', 'Family details added successfully.');
  }


    public function destroy($id)
    {
        $familyDetail = UserFamilyDetails::findOrFail($id);
        $familyDetail->delete();

        return redirect()->back()->with('success', 'Family detail deleted successfully.');
    }
}

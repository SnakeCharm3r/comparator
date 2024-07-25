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


// Show form to edit a family member's details
    public function edit($id)
    {
        // dd(123);
        $familyDetail = UserFamilyDetails::findOrFail($id);
        return view('family-details.edit',compact('familyDetail'));
    }

    // Update family member's details
    public function editData(Request $request, $id)
    {

        $request->validate([
            'full_name' => 'required|string',
            'relationship' => 'required|string',
            'DOB' => 'required|date',
            'phone_number' => 'nullable|string',
            'occupation' => 'nullable|string',
        ]);
        // dd(1234);
        $familyDetail = UserFamilyDetails::findOrFail($id);
        $familyDetail->full_name = $request->input('full_name');
        $familyDetail->relationship = $request->input('relationship');
        $familyDetail->DOB = $request->input('DOB');
        $familyDetail->phone_number = $request->input('phone_number');
        $familyDetail->occupation = $request->input('occupation');
        $familyDetail->save();

        return redirect()->route('family-details.index')->with('success', 'Family details updated successfully.');
    }


    // public function destroy($id)
    // {
    //     $familyDetail = UserFamilyDetails::findOrFail($id);
    //     $familyDetail->delete();

    //     return redirect()->back()->with('success', 'Family detail deleted successfully.');
    // }
    public function deleteFamilyData(string $id){
        $familyDetail = UserFamilyDetails::find($id);

        if(!$familyDetail){
            return response()->json([
                'status' => 400,
                'massage' => ' Family detail not found',
            ]);
        }

        // $familyDetail->update([
        //     'delete_status' => 1
        //  ]);
        $familyDetail->delete();

         return redirect()->back()->with('success', 'Family detail deleted successfully.');

        }




}

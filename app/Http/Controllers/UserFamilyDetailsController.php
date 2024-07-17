<?php
namespace App\Http\Controllers;
use App\Models\HealthDetails;
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

        return view('family-details.index', compact('user', 'familyData'));
    }


    public function addFamilyData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required|exists:users,id',
            'familyData.*.full_name' => 'required|string|max:255',
            'familyData.*.relationship' => 'required|string|max:255',
            'familyData.*.phone_number' => 'required|string|max:15',
            'familyData.*.occupation' => 'nullable|string|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         $userId =Auth::user();
         //dd($userId);
        foreach ($request->familyData as $data) {
            UserFamilyDetails::create([
                'userId' => $userId ,
                'full_name' => $data['full_name'],
                'relationship' => $data['relationship'],
                'phone_number' => $data['phone_number'],
                'DOB' => $data['DOB'],
                'occupation' => $data['occupation'],
            ]);
        }
    
        return redirect()->route('profile.show')->with('success', 'Family details added successfully.');
    }
    
    // public function addHealthData(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'userId' => 'required|exists:users,id',
    //         'physical_disability' => 'required',
    //         'health_insurance' => 'required',
    //         'allergies' => 'nullable',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 400,
    //             'error' => $validator->errors()
    //         ]);
    //     }

    //     HealthDetails::create([
    //         'userId' => $request->input('userId'),
    //         'physical_disability' => $request->input('physical_disability'),
    //         'blood_group' => $request->input('blood_group'),
    //         'illness_history' => $request->input('illness_history'),
    //         'health_insurance' => $request->input('health_insurance'),
    //         'insur_name' => $request->input('insur_name'),
    //         'insur_no' => $request->input('insur_no'),
    //         'allergies' => $request->input('allergies'),
    //     ]);

    //     return redirect()->route('profile')->with('success', 'Health details added successfully.');
    // }

    public function destroy($id)
    {
        $familyDetail = UserFamilyDetails::findOrFail($id);
        $familyDetail->delete();

        return redirect()->back()->with('success', 'Family detail deleted successfully.');
    }


}
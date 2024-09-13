<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
    public function index(Request $request)
    {
        return view('signature.index');
    }
    
    public function showUsersWithSignatures()
    {
        $users = User::all();

        // Return the view with the list of users and their signatures
        return view('signature.users', compact('users'));
    }
    
    public function store(Request $request)
    {
        $signature = $request->input('signature');

        // Decode the base64 data
        $signatureData = explode(',', $signature)[1];

        // Get the authenticated user
        $user = Auth::user();

        // Save the signature to the user's signature column
        $user->signature = $signatureData;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Signature saved successfully!');

}

        public function edit($id)
        {
            $signature = User::findOrFail($id); // Fetch the signature by ID
            return view('signatures.edit', compact('signature')); // Pass the signature to the view
        }

        public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'signature_data' => 'required|string', // Adjust validation rules as needed
            ]);

            $signature = User::findOrFail($id);

            $signature->update([
                'signature_data' => $validatedData['signature_data'],
            ]);

            return response()->json(['message' => 'Signature updated successfully']);
        }


        public function destroy(User $user)
        {
            // Logic to delete the user's signature
            // Assuming you have a relationship or method to handle this
            $user->signature()->delete();

            return redirect()->route('some.route')->with('status', 'Signature deleted!');
        }
};


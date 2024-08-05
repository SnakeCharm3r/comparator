<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
    public function index(Request $request)
    {
        return view('signature.index');
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

        return response()->json(['success' => true, 'signature' => $signatureData]);

}
};


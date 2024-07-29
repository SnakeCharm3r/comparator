<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
    public function index(Request $request)
    {
        return view('signature.index');
    }
    
    
    public function store(Request $request)
    {
        dd('dfd');
        $signature = $request->input('signature');

        // Decode the base64 data
        $signatureData = explode(',', $signature)[1];
        $signatureData = base64_decode($signatureData);

        // Create a unique file name
        $fileName = 'signature_' . time() . '.png';

        

        // Save the file to storage
        Storage::disk('public')->put($fileName, $signatureData);

        return response()->json(['success' => true, 'file' => $fileName]);
    }

}


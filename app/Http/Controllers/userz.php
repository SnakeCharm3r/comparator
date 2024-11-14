<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class userz extends Controller
{
    //store data and validate the information
    public function store(Request $request)
    {
        //validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|string|max:255',
        ]);
    
        //access validated data

        $name = $validatedData['name'];
        $email = $validatedData['email'];

        //return view after submission
        return redirect()->route('')->with('success, Registration Successful');
    }
    
}

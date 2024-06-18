<?php

namespace App\Http\Controllers;

use App\Models\PrivilegeLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrivilegeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priv = PrivilegeLevel::all();
        return view('privilege.index', compact('priv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('privilege.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prv_name' => 'required',
            'prv_status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'stauss' => 400,
                'error' > $request->errors(),
                ]);
        }

        $empCheck = PrivilegeLevel::where('prv_name',$request->prv_name)->first();
         if($empCheck){
            return response()->json([
                'status' => 400,
                'message' => 'privilege  is already exist',
                'data' => $request->all()
            ]);  
         }

         $emp = PrivilegeLevel::create([
            'prv_name' => $request->input('prv_name'),
            'prv_status' => $request->input('prv_status'),
         ]);

         return redirect()->route('privilege.index')->with('success', 'privilege added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $priv = PrivilegeLevel::findOrFail($id);
        return view('privilege.edit', compact('priv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'prv_name' => 'required',
            'prv_status' => 'required',
        ]);
    
        $validator = Validator::make($request->all(), [
            'prv_name' => 'required',
            'prv_status' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }
    
        $empl = PrivilegeLevel::findOrFail($id);
        $empl->update([
            'prv_name' => $request->input('prv_name'),
            'prv_status' => $request->input('prv_status'),
        ]);
    
       
        return redirect()->route('privilege.index')->with('success', 'Privilege updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\NhifQualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class NhifQualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nhif = NhifQualification::where('delete_status',0)->get();
        return view('nhif.index', compact('nhif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nhif.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required|in:active,not_active',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        $deptCheck = NhifQualification::where('name', $request->name)->first();
        if($deptCheck){
            return response()->json([
                'status' => 400,
                'message' => 'Nhif Qualification is already exist',
                'data' => $request->all()
            ]);

          }
        $dept = NhifQualification::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'delete_status' => 0,
        ]);
        Alert::success('NHIF added successful','NHIF added');
        return redirect()->route('nhif.index')->with('success', 'nhif added successfully.');

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
        $nhif = NhifQualification::findOrFail($id);
        return view('nhif.edit', compact('nhif'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        $nhif = NhifQualification::findOrFail($id);
        $nhif->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        Alert::success('NHIF Updated Successful','updated added');
        return redirect()->route('nhif.index')->with('success', 'nhif updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nhif = NhifQualification::find($id);

        if (!$nhif) {
            return response()->json([
                'status' => 404,
                'message' => 'NHIF Qualification not found',
            ]);
        }
    
        $nhif->update([
            'delete_status' => 1
        ]);
    
        return redirect()->route('nhif.index')->with('success', 'NHIF Qualification deleted successfully.');
    }
}

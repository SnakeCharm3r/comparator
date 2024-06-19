<?php

namespace App\Http\Controllers;

use App\Models\Remark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RemarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rem = Remark::all();
        return view('remarks.index', compact('rem'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('remarks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rmk_name' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error' > $request->errors(),
                ]);
        }

        $rmkCheck = Remark::where('rmk_name',$request->rmk_name)->first();
         if($rmkCheck){
            return response()->json([
                'status' => 400,
                'message' => 'Remark type is already exist',
                'data' => $request->all()
            ]);  
         }

         $emp = Remark::create([
            'rmk_name' => $request->input('rmk_name'),
            'status' => $request->input('status'),
         ]);

         return redirect()->route('remark.index')->with('success', 'Remark added successfully.');

     
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
        $rem = Remark::findOrFail($id);
        return view('remarks.edit', compact('rem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'rmk_name' => 'required',
            'status' => 'required',
        ]);
    
        $validator = Validator::make($request->all(), [
            'rmk_name' => 'required',
            'status' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }
    
        $empl = Remark::findOrFail($id);
        $empl->update([
            'rmk_name' => $request->input('rmk_name'),
            'status' => $request->input('status'),
        ]);
    
       
        return redirect()->route('remark.index')->with('success', 'Remarks is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PrivilegeLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class PrivilegeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priv = PrivilegeLevel::where('delete_status',0)->get();
        return view('privilege-level.index', compact('priv'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view( 'privilege-level.create');
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
                'status' => 400,
                'errors' => $validator->errors(),
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
            'delete_status' => 0,
         ]);
         Alert::success('Privilege added Successful','Privilege added');
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
        return view('privilege-level.edit', compact('priv'));
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

        $priv = PrivilegeLevel::findOrFail($id);
        $priv->update([
            'prv_name' => $request->input('prv_name'),
            'prv_status' => $request->input('prv_status'),
        ]);

        Alert::success('Privilege Updated successful','Privilege updated');
        return redirect()->route('privilege.index')->with('success', 'Privilege updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $priv = PrivilegeLevel::find($id);

    if (!$priv) {
        return response()->json([
            'status' => 404,
            'message' => 'Privilege not found',
        ]);
    }

    $priv->update([
        'delete_status' => 1
    ]);

    return redirect()->route('privilege.index')->with('success', 'Privilege deleted successfully.');
    }
}

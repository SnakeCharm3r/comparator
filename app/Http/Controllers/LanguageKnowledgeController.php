<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LanguageKnowledge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LanguageKnowledgeController extends Controller
{
    /**
     * Display a listing of the language knowledge for the authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }
    
        $languageKnowledge = LanguageKnowledge::where('userId', $user->id)->get();
    
        return view('language.index', compact('languageKnowledge', 'user'));
    }
    

    /**
     * Show the form for creating a new language knowledge entry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('language_knowledge.create');
    }

    /**
     * Store a newly created language knowledge in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'language' => 'required|string|max:255',
            'speaking' => 'required|string|max:255',
            'reading' => 'required|string|max:255',
            'writing' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        LanguageKnowledge::create([
            'userId' => Auth::id(),
            'language' => $request->input('language'),
            'speaking' => $request->input('speaking'),
            'reading' => $request->input('reading'),
            'writing' => $request->input('writing'),
            'delete_status' => 0, // Assuming delete_status is used for soft deletes
        ]);

        return redirect()->route('language_knowledge.index')->with('success', 'Language knowledge added successfully.');
    }

    /**
     * Show the form for editing the specified language knowledge.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languageKnowledge = LanguageKnowledge::findOrFail($id);

        // Check if the authenticated user owns this language knowledge
        if ($languageKnowledge->userId != Auth::id()) {
            return redirect()->route('language_knowledge.index')->with('error', 'Unauthorized access.');
        }

        return view('language_knowledge.edit', compact('languageKnowledge'));
    }

    /**
     * Update the specified language knowledge in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'language' => 'required|string|max:255',
            'speaking' => 'required|string|max:255',
            'reading' => 'required|string|max:255',
            'writing' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $languageKnowledge = LanguageKnowledge::findOrFail($id);

        // Check if the authenticated user owns this language knowledge
        if ($languageKnowledge->userId != Auth::id()) {
            return redirect()->route('language_knowledge.index')->with('error', 'Unauthorized access.');
        }

        $languageKnowledge->language = $request->input('language');
        $languageKnowledge->speaking = $request->input('speaking');
        $languageKnowledge->reading = $request->input('reading');
        $languageKnowledge->writing = $request->input('writing');
        $languageKnowledge->save();

        return redirect()->route('language_knowledge.index')->with('success', 'Language knowledge updated successfully.');
    }

    /**
     * Remove the specified language knowledge from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $languageKnowledge = LanguageKnowledge::findOrFail($id);

        // Check if the authenticated user owns this language knowledge
        if ($languageKnowledge->userId != Auth::id()) {
            return redirect()->route('language_knowledge.index')->with('error', 'Unauthorized access.');
        }

        // Soft delete by setting delete_status to 1
        $languageKnowledge->delete_status = 1;
        $languageKnowledge->save();

        return redirect()->route('language_knowledge.index')->with('success', 'Language knowledge deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //

    public function create()
    {
        return view('announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:2048', // Validate PDF files
        ]);

        $announcement = new Announcement();
        $announcement->title = $request->input('title');
        $announcement->userId = auth()->id(); // Set the user ID from the authenticated user

        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
            $announcement->pdf_path = $pdfPath;
        }

        $announcement->save();

        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully.');
    }

    public function index()
    {
        $announcements = Announcement::with('user')->latest()->get();
        return view('announcements.index', compact('announcements'));
    }

    public function show($id)
{
    $announcement = Announcement::findOrFail($id);
    return view('announcements.show', compact('announcement'));
}

public function edit($id)
{
    $announcement = Announcement::findOrFail($id);
    return view('announcements.edit', compact('announcement'));
}

public function update(Request $request, $id)
{
    $announcement = Announcement::findOrFail($id);
    $announcement->update($request->all());
    return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully.');
}

public function destroy($id)
{
    $announcement = Announcement::findOrFail($id);
    $announcement->delete();
    return redirect()->route('announcements.index')->with('success', 'Announcement deleted successfully.');
}
}


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

    // Method to store announcement
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'userId' => auth()->user()->id, // User creating the announcement
        ]);

        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully!');
    }

    // Method to list announcements
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


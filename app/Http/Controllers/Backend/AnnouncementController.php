<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::with('user')->latest()->get();
        return view('pages.backend.announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('pages.backend.announcements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'thumbnail' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,publish',
        ]);

        $validated['user_id'] = Auth::id();
        if($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        Announcement::create($validated);

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Pengumuman berhasil dibuat!');
    }

    public function show(Announcement $announcement)
    {
        return view('pages.backend.announcements.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        return view('pages.backend.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,publish',
        ]);

        if($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        $announcement->update($validated);

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Pengumuman berhasil dihapus!');
    }
}

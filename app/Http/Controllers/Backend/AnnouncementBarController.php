<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AnnouncementBar;
use Illuminate\Http\Request;

class AnnouncementBarController extends Controller
{
    public function index()
    {
        $announcementBars = AnnouncementBar::orderBy('order')->get();
        return view('pages.backend.announcement-bars.index', compact('announcementBars'));
    }

    public function create()
    {
        return view('pages.backend.announcement-bars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required',
            'is_active' => 'required|boolean',
            'order' => 'required|integer|min:0',
        ]);

        AnnouncementBar::create($validated);

        return redirect()
            ->route('announcement-bars.index')
            ->with('success', 'Announcement bar berhasil dibuat!');
    }

    public function edit(AnnouncementBar $announcementBar)
    {
        return view('pages.backend.announcement-bars.edit', compact('announcementBar'));
    }

    public function update(Request $request, AnnouncementBar $announcementBar)
    {
        $validated = $request->validate([
            'text' => 'required',
            'is_active' => 'required|boolean',
            'order' => 'required|integer|min:0',
        ]);

        $announcementBar->update($validated);

        return redirect()
            ->route('announcement-bars.index')
            ->with('success', 'Announcement bar berhasil diperbarui!');
    }

    public function destroy(AnnouncementBar $announcementBar)
    {
        $announcementBar->delete();

        return redirect()
            ->route('announcement-bars.index')
            ->with('success', 'Announcement bar berhasil dihapus!');
    }
}


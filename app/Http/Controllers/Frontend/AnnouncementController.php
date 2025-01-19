<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $announcements = Announcement::with('user')
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        if ($request->search) {
            $announcements = Announcement::with('user')
                ->where('status', 'publish')
                ->where('title', 'like', '%' . $request->search . '%')
                ->latest()
                ->paginate(6);
        }
        
        return view('pages.frontend.announcement', compact('announcements'));
    }

    public function show($id)
    {
        $announcement = Announcement::with('user')
            ->where('status', 'publish')
            ->findOrFail($id);
        
        return view('pages.frontend.announcementDetail', compact('announcement'));
    }
}

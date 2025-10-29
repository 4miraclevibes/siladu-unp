<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Article;
use App\Models\Project;
use App\Models\AnnouncementBar;
use App\Models\HeroCarousel;
use App\Models\Timeline;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $announcements = Announcement::take(4)->get();
        $articles = Article::take(4)->get();
        $announcementBars = AnnouncementBar::where('is_active', true)->orderBy('order')->get();
        $heroCarousels = HeroCarousel::where('is_active', true)->orderBy('order')->get();
        $timelines = Timeline::where('is_active', true)->orderBy('order')->orderBy('year')->get();
        return view('pages.frontend.beranda', compact('projects', 'announcements', 'articles', 'announcementBars', 'heroCarousels', 'timelines'));
    }

    public function projectDetail(Project $project)
    {
        // Mengambil 3 proyek terbaru selain proyek yang sedang ditampilkan
        $relatedProjects = Project::where('id', '!=', $project->id)
                                ->latest()
                                ->take(3)
                                ->get();

        return view('pages.frontend.project-detail', compact('project', 'relatedProjects'));
    }
}

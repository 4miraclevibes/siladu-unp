<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Article;
use App\Models\Project;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $announcements = Announcement::take(4)->get();
        $articles = Article::take(4)->get();
        return view('pages.frontend.beranda', compact('projects', 'announcements', 'articles'));
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

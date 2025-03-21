<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('pages.backend.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('pages.backend.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        $data = $request->all();
        $data['image'] = $request->file('image')->store('projects', 'public');
        Project::create($data);
        
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dibuat');
    }

    public function show(Project $project)
    {
        return view('pages.backend.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('pages.backend.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        $data = $request->all();
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($project->image);
            $data['image'] = $request->file('image')->store('projects', 'public');
        }
        
        $project->update($data);
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diubah');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus');
    }
}

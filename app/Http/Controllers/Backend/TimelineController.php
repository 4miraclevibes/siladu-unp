<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::orderBy('order', 'asc')->orderBy('year', 'desc')->get();
        return view('pages.backend.timelines.index', compact('timelines'));
    }

    public function create()
    {
        return view('pages.backend.timelines.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'color' => 'required|string|in:primary,success,info,warning,danger',
            'is_active' => 'boolean',
            'order' => 'required|integer'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('timelines', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Timeline::create($validated);

        return redirect()->route('timelines.index')
            ->with('success', 'Timeline berhasil ditambahkan');
    }

    public function edit(Timeline $timeline)
    {
        return view('pages.backend.timelines.edit', compact('timeline'));
    }

    public function update(Request $request, Timeline $timeline)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'color' => 'required|string|in:primary,success,info,warning,danger',
            'is_active' => 'boolean',
            'order' => 'required|integer'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($timeline->image) {
                Storage::disk('public')->delete($timeline->image);
            }
            $validated['image'] = $request->file('image')->store('timelines', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $timeline->update($validated);

        return redirect()->route('timelines.index')
            ->with('success', 'Timeline berhasil diupdate');
    }

    public function destroy(Timeline $timeline)
    {
        // Delete image if exists
        if ($timeline->image) {
            Storage::disk('public')->delete($timeline->image);
        }

        $timeline->delete();

        return redirect()->route('timelines.index')
            ->with('success', 'Timeline berhasil dihapus');
    }
}


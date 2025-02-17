<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\ToolImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::with(['user', 'toolImages'])->latest()->get();
        return view('pages.backend.tools.index', compact('tools'));
    }

    public function create()
    {
        return view('pages.backend.tools.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:draft,publish',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['user_id'] = Auth::id();
        
        $tool = Tool::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('tools', 'public');
                
                ToolImage::create([
                    'tool_id' => $tool->id,
                    'image' => $path
                ]);
            }
        }

        return redirect()
            ->route('tools.index')
            ->with('success', 'Alat berhasil dibuat!');
    }

    public function edit(Tool $tool)
    {
        return view('pages.backend.tools.edit', compact('tool'));
    }
    
    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:draft,publish',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $tool->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('tools', 'public');
                
                ToolImage::create([
                    'tool_id' => $tool->id,
                    'image' => $path
                ]);
            }
        }

        return redirect()
            ->route('tools.index')
            ->with('success', 'Alat berhasil diperbarui!');
    }

    public function destroy(Tool $tool)
    {
        foreach ($tool->toolImages as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $tool->delete();

        return redirect()
            ->route('tools.index')
            ->with('success', 'Alat berhasil dihapus!');
    }

    public function show(Tool $tool)
    {
        return view('pages.backend.tools.show', compact('tool'));
    }

    public function deleteImage(ToolImage $toolImage)
    {
        Storage::disk('public')->delete($toolImage->image);
        $toolImage->delete();

        return response()->json(['success' => true]);
    }
}

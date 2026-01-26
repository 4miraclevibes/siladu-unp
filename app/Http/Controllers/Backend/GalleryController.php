<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with(['user', 'galleryDetails'])->latest()->get();
        return view('pages.backend.galleries.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,publish',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480'
        ]);

        $validated['user_id'] = Auth::id();
        
        $gallery = Gallery::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('galleries', 'public');
                
                GalleryDetail::create([
                    'gallery_id' => $gallery->id,
                    'image' => $path
                ]);
            }
        }

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Galeri berhasil dibuat!');
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,publish',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480'
        ]);

        $gallery->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('galleries', 'public');
                
                GalleryDetail::create([
                    'gallery_id' => $gallery->id,
                    'image' => $path
                ]);
            }
        }

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete all related images from storage
        foreach ($gallery->galleryDetails as $detail) {
            Storage::disk('public')->delete($detail->image);
        }

        $gallery->delete();

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Galeri berhasil dihapus!');
    }

    public function deleteImage(GalleryDetail $galleryDetail)
    {
        Storage::disk('public')->delete($galleryDetail->image);
        $galleryDetail->delete();

        return response()->json(['success' => true]);
    }
}

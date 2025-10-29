<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HeroCarousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroCarouselController extends Controller
{
    public function index()
    {
        $heroCarousels = HeroCarousel::orderBy('order')->get();
        return view('pages.backend.hero-carousels.index', compact('heroCarousels'));
    }

    public function create()
    {
        return view('pages.backend.hero-carousels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'is_active' => 'required|boolean',
            'order' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('hero-carousel', 'public');
        }

        HeroCarousel::create($validated);

        return redirect()
            ->route('hero-carousels.index')
            ->with('success', 'Hero carousel berhasil dibuat!');
    }

    public function edit(HeroCarousel $heroCarousel)
    {
        return view('pages.backend.hero-carousels.edit', compact('heroCarousel'));
    }

    public function update(Request $request, HeroCarousel $heroCarousel)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'is_active' => 'required|boolean',
            'order' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($heroCarousel->image) {
                Storage::disk('public')->delete($heroCarousel->image);
            }
            $validated['image'] = $request->file('image')->store('hero-carousel', 'public');
        }

        $heroCarousel->update($validated);

        return redirect()
            ->route('hero-carousels.index')
            ->with('success', 'Hero carousel berhasil diperbarui!');
    }

    public function destroy(HeroCarousel $heroCarousel)
    {
        // Delete image
        if ($heroCarousel->image) {
            Storage::disk('public')->delete($heroCarousel->image);
        }

        $heroCarousel->delete();

        return redirect()
            ->route('hero-carousels.index')
            ->with('success', 'Hero carousel berhasil dihapus!');
    }
}


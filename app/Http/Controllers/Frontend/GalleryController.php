<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $galleries = Gallery::with(['user', 'galleryDetails'])
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        if ($request->search) {
            $galleries = Gallery::with(['user', 'galleryDetails'])
                ->where('status', 'publish')
                ->where('title', 'like', '%' . $request->search . '%')
                ->latest()
                ->paginate(6);
        }
        
        return view('pages.frontend.gallery', compact('galleries'));
    }
}

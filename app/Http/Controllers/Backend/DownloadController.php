<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::all();
        return view('pages.backend.downloads.index', compact('downloads'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'file' => 'required|file',
        ]);

        $validated['file'] = $request->file('file')->store('downloads', 'public');

        Download::create($validated);

        return redirect()->route('downloads.index')->with('success', 'Download created successfully');
    }

    public function update(Request $request, Download $download)
    {
        $validated = $request->validate([
            'title' => 'required',
            'file' => 'required|file',
        ]);

        $validated['file'] = $request->file('file')->store('downloads', 'public');

        $download->update($validated);

        return redirect()->route('downloads.index')->with('success', 'Download updated successfully');
    }

    public function destroy(Download $download)
    {
        $download->delete();
        return redirect()->route('downloads.index')->with('success', 'Download deleted successfully');  
    }
}

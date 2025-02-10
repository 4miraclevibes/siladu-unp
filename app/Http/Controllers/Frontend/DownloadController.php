<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Download;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::all();
        return view('pages.frontend.download', compact('downloads'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::with('user')
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        if ($request->search) {
            $articles = Article::with('user')
                ->where('status', 'publish')
                ->where('title', 'like', '%' . $request->search . '%')
                ->latest()
                ->paginate(6);
        }
        
        return view('pages.frontend.article', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::with('user')
            ->where('status', 'publish')
            ->findOrFail($id);
        
        return view('pages.frontend.articleDetail', compact('article'));
    }
}

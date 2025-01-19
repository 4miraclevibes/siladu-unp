<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('pages.backend.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('pages.backend.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,publish',
        ]);

        $validated['user_id'] = Auth::id();

        Article::create($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil dibuat!');
    }

    public function show(Article $article)
    {
        return view('pages.backend.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('pages.backend.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,publish',
        ]);

        $article->update($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}

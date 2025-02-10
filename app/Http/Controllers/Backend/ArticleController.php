<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
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
            'thumbnail' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,publish',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
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
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,publish',
        ]);

        if($request->hasFile('thumbnail')) {
            Storage::delete($article->thumbnail);
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        }

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

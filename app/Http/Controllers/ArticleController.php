<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = \App\Models\Article::latest()->paginate(6);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        }

        $article = auth()->user()->articles()->create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'content' => $request->content,
            'image_path' => $path ?? null,
        ]);

        return redirect()->route('articles.show', $article->slug)
            ->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = \App\Models\Article::where('slug', $id)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = \App\Models\Article::where('slug', $id)->firstOrFail();
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = \App\Models\Article::where('slug', $id)->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
        ]);

        // In your ArticleController update method
        if ($request->hasFile('image')) {
            // Delete old image
            if ($article->image_path) {
                Storage::delete($article->image_path);
            }
            // Store new image
            $article->image_path = $request->file('image')->store('articles', 'public');
        } elseif ($request->has('delete_image')) {
            // Delete image if checkbox is checked
            if ($article->image_path) {
                Storage::delete($article->image_path);
            }
            $article->image_path = null;
        }


        $article->update([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'content' => $request->content,
        ]);

        return redirect()->route('articles.show', $article->slug)
            ->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = \App\Models\Article::where('slug', $id)->firstOrFail();

        // Delete image if exists
        if ($article->image_path) {
            Storage::delete($article->image_path);
        }

        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully!');
    }
}

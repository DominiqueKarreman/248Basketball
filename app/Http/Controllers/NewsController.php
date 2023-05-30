<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsArticle;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        // Return one news article with isCover = true and five articles with isCover = false, ordered by the latest
        $news = NewsArticle::where('is_cover', true)->latest()->take(1)
            ->union(NewsArticle::where('is_cover', false)->latest()->take(5))
            ->get();

        return view('news', compact('news'));
    }

    public function store(Request $request)
    {
        // Authorize the request
        $this->authorize('create', NewsArticle::class);

        $validatedData = $request->validate([
            'title' => 'required',
            'is_cover' => 'boolean',
            'short_description' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = $imagePath;
        }

        // Create the news article
        NewsArticle::create($validatedData);

        return redirect()->back()->with('success', 'News article created successfully.');
    }

    public function create()
    {
        // Authorize the request
        $this->authorize('create', NewsArticle::class);

        return view('news.create');
    }

    public function show($id)
    {
        // Find the news article by ID
        $news = NewsArticle::findOrFail($id);

        return view('news.show', compact('news'));
    }

    public function edit($id)
    {
        // Find the news article by ID
        $news = NewsArticle::findOrFail($id);

        // Authorize the request
        $this->authorize('update', $news);

        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        // Find the news article by ID
        $news = NewsArticle::findOrFail($id);

        // Authorize the request
        $this->authorize('update', $news);

        $validatedData = $request->validate([
            'title' => 'required',
            'is_cover' => 'boolean',
            'short_description' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = $imagePath;
        }

        // Update the news article
        $news->update($validatedData);

        return redirect()->back()->with('success', 'News article updated successfully.');
    }

    public function destroy($id)
    {
        // Find the news article by ID
        $news = NewsArticle::findOrFail($id);

        // Authorize the request
        $this->authorize('delete', $news);

        // Delete the news article
        $news->delete();

        return redirect()->back()->with('success', 'News article deleted successfully.');
    }
}

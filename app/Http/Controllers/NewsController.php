<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsArticle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewsArticle::all();
        return view('news.index', ['news' => $news]);
    }

    public function getTopNews()
    {
        // Return one news article with isCover = true and five articles with isCover = false, ordered by the latest
        $news = NewsArticle::where('is_cover', 1)->latest()->take(1)
            ->union(NewsArticle::where('is_cover', 0)->latest()->take(5))
            ->get();


        return view('news', compact('news'));
    }

    public function store(Request $request)
    {
        // Authorize the request
        $this->authorize('create', NewsArticle::class);

        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'is_cover' => 'boolean',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $image = "storage/news/" . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/news', $request->file('image')->getClientOriginalName());
        } else {
            $image = 'null';
        }
        $validatedData['image'] = $image;

        // Create the news article
        NewsArticle::create($validatedData);
        return redirect()->route("news.index")->with('success', 'News article created successfully.');
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
        $news = NewsArticle::find($id);

        return view('news.show', compact('news'));
    }

    public function edit($id)
    {
        // Find the news article by ID
        $news = NewsArticle::find($id);


        // Authorize the request
        Auth()->user()->hasPermissionTo("edit news");


        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        // Find the news article by ID
        $news = NewsArticle::findOrFail($id);

        // Authorize the request

        Auth()->user()->hasPermissionTo("edit news");

        // Authorize the request
        if (!Auth()->user()->hasPermissionTo("edit news")) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }



        $validatedData = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'is_cover' => 'integer',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $image = "storage/news/" . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/news', $request->file('image')->getClientOriginalName());
        } else {
            // If no image is uploaded, use the old image
            $image = $news->image;
        }
        $validatedData['image'] = $image;

        dd($validatedData);
        // Update the news article
        $news->update($validatedData);

        $news->save();
        return redirect()->route("news.index")->banner("Nieuws artikel succesvol gewijzigd");
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

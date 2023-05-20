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
        return view('news');
    }

    public function store()
    {

        //authorize the request
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
    
    }
}

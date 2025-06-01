<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->paginate(4);
        $categories = Category::all();
        $latestPosts = Post::where('status', 1)->latest()->limit(5)->get();
        return view('blogs.index', compact('posts', 'categories', 'latestPosts'));
    }



    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);
        $query = $request->input('query');
        $posts = Post::where('status', 1)->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(2);
        $categories = Category::all();
        $latestPosts = Post::where('status', 1)->latest()->limit(5)->get();
        return view('blogs.search', compact('posts', 'categories', 'latestPosts'));
    }

    public function show($slug)
    {
        $post = Post::where('status', 1)->where('slug', $slug)->firstOrFail(); // Fetch post by slug
        $post->increment('views'); // Increment view count
        $categories = Category::all();
        $latestPosts = Post::where('status', 1)->latest()->limit(5)->get();
        $relatedPosts = Post::where('status', 1)->where('category_id', $post->category_id)->where('id', '!=', $post->id)->latest()->limit(3)->get();
        return view('blogs.show', compact('post', 'categories', 'latestPosts', 'relatedPosts'));
    }
}

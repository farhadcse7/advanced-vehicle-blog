<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(4);
        $categories = Category::all();
        $latestPosts = Post::latest()->limit(5)->get();
        return view('blogs.index', compact('posts', 'categories', 'latestPosts'));
    }



    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);
        $query = $request->input('query');
        $posts = Post::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(2);
        $categories = Category::all();
        $latestPosts = Post::latest()->limit(5)->get();
        return view('blogs.search', compact('posts', 'categories', 'latestPosts'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //     ]);
    //     Blog::create($request->all()); // Store the blog
    //     return redirect()->route('blogs.index')->with('success', 'Blog created successfully.'); // Redirect with success message
    // }
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail(); // Fetch post by slug
        $categories = Category::all();
        $latestPosts = Post::latest()->limit(5)->get();
        $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->latest()->limit(3)->get();
        return view('blogs.show', compact('post', 'categories', 'latestPosts', 'relatedPosts'));
    }

    // public function edit($id)
    // {
    //     $blog = Blog::findOrFail($id); // Fetch blog by id
    //     return view('blogs.edit', compact('blog')); // Return edit form
    // }
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //     ]);
    //     $blog = Blog::findOrFail($id); // Fetch blog by id
    //     $blog->update($request->all()); // Update blog
    //     return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.'); // Redirect with success message
    // }
    // public function destroy($id)
    // {
    //     $blog = Blog::findOrFail($id); // Fetch blog by id
    //     $blog->delete(); // Delete blog
    //     return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.'); // Redirect with success message
    // }
}

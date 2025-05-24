<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('blogs.index', compact('posts'));
    }
    // public function create()
    // {
    //     return view('blogs.create'); // Return create blog form
    // }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //     ]);
    //     Blog::create($request->all()); // Store the blog
    //     return redirect()->route('blogs.index')->with('success', 'Blog created successfully.'); // Redirect with success message
    // }
    // public function show($id)
    // {
    //     $blog = Blog::findOrFail($id); // Fetch blog by id
    //     return view('blogs.show', compact('blog')); // Return view with the blog
    // }
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

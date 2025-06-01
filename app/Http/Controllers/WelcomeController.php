<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->latest()->get();
        $categories = Category::all();
        $latestPosts = Post::where('status', 1)->latest()->limit(5)->get();
        return view('welcome', compact('posts', 'categories', 'latestPosts'));
    }
}

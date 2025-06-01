<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::latest()->take(5)->get();
        $posts = Post::latest()->take(5)->get();
        $totalPosts = Post::count();
        $totalCategories = Category::count();
        return view('admin.home', compact('posts', 'categories', 'totalPosts', 'totalCategories'));
    }
}

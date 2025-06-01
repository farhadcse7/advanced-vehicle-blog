<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

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
        $categories          = Category::latest()->take(5)->get();
        $posts               = Post::latest()->take(5)->get();
        $totalPosts          = Post::count();
        $totalDraftPosts     = Post::where('status', 0)->count();
        $totalPublishedPosts = Post::where('status', 1)->count();
        $totalCategories     = Category::count();
        return view('admin.home', compact(
            'posts',
            'categories',
            'totalPosts',
            'totalCategories',
            'totalDraftPosts',
            'totalPublishedPosts'
        ));
    }
}

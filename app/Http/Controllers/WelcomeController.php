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
        // $categories = Category::all();

        // both categories and count of posts in each category where status is 1 (but need realtionship with post model in category model)
        $categories = Category::withCount([
            'posts' => function ($query) {
                $query->where('status', 1);
            }
        ])->get();

        $mainBanner = Post::where('status', 1)->where('is_banner', 1)->inRandomOrder()->first();
        $othersBanner = Post::where('status', 1)->inRandomOrder()->limit(2)->get();
        $latestPosts = Post::where('status', 1)->latest()->limit(5)->get();
        return view('welcome', compact('posts', 'categories', 'latestPosts', 'mainBanner', 'othersBanner'));
    }
}

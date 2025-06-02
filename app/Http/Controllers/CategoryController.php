<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail(); // Fetch single category by slug
        $categoryPosts = Post::where('status', 1)->where('category_id', $category->id)->get(); // Fetch post by slug
        // $categories = Category::all();
        // both categories and count of posts in each category where status is 1 (but need realtionship with post model in category model)
        $categories = Category::withCount([
            'posts' => function ($query) {
                $query->where('status', 1);
            }
        ])->get();
        $latestPosts = Post::latest()->limit(5)->get();
        return view('blogs.category', compact('category', 'categoryPosts', 'categories', 'latestPosts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function about()
    {
        $content = DB::table('abouts')->first();
        $latestPosts = Post::where('status', 1)->latest()->limit(5)->get();
        return view('pages.about', compact('content', 'latestPosts'));
    }

    public function disclaimer()
    {
        $content = DB::table('disclaimers')->first();
        $latestPosts = Post::where('status', 1)->latest()->limit(5)->get();
        return view('pages.disclaimer', compact('content', 'latestPosts'));
    }
}

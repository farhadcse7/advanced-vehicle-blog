<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Advertisement;
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

    //advertisement banner click count
    public function clickCount($id)
    {
        $count = Advertisement::where('id', $id)->increment('clicks');
        $ad = Advertisement::where('id', $id)->first();
        return redirect()->away($ad->link);
    }

    //sitemap
    public function sitemap()
    {
        $categories = Category::all();
        $latestPosts = Post::where('status', 1)->latest()->limit(5)->get();
        return view('pages.sitemap', compact('categories', 'latestPosts'));
    }

    //xmlsitemap
    public function xmlsitemap()
    {
        $categories = Category::all();
        return response()->view('pages.xmlsitemap', compact('categories'))
            ->header('Content-Type', 'application/xml');
    }
}

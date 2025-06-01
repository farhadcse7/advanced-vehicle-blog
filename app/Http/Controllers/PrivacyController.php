<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrivacyController extends Controller
{
    public function index()
    {
        $content = DB::table('privacies')->first();
        $latestPosts = Post::where('status', 1)->latest()->limit(5)->get();
        return view('pages.privacy', compact('content', 'latestPosts'));
    }
}

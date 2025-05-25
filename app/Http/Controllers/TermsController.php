<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TermsController extends Controller
{
    public function index()
    {
        $content = DB::table('terms')->first();
        $latestPosts = Post::latest()->limit(5)->get();
        return view('pages.terms', compact('content', 'latestPosts'));
    }
}

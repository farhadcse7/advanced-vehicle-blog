<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $latestPosts = Post::latest()->limit(5)->get();
        return view('pages.contact', compact('latestPosts'));
    }
}

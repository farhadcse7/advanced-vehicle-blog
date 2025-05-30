<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBlogsController extends Controller
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
        $posts = Post::all();
        return view('admin.blogs.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function show($id)
    {
        //dd($id);
        $post = Post::findOrFail($id);
        return view('admin.blogs.show', compact('post'));
    }
}

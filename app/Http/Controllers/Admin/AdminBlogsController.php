<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
        $status = request('status');
        //Start the query to fetch posts
        $query = Post::query();

        // If a status is provided, filter the posts by status
        if ($status !== null && $status !== '') {
            $query->where('status', $status);
        }

        // Set all posts based on the query
        $posts = $query->get();

        return view('admin.blogs.index', compact('posts'));

        // $posts = Post::all();
        // return view('admin.blogs.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.blogs.create', compact('categories', 'users'));
    }

    public function show($id)
    {
        //dd($id);
        $post = Post::findOrFail($id);
        return view('admin.blogs.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $users = User::all();
        return view('admin.blogs.edit', compact('post', 'categories', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:60',
            'meta_desc' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|array',
            'status' => 'required',
        ]);

        try {
            $post = new Post();
            $post->title = $request->title;

            $slugUniqueCheck = Post::where('slug', $request->slug)->count();
            if ($slugUniqueCheck > 0) {
                $post->slug = $request->slug . '-' . uniqid();
            } else {
                $post->slug = $request->slug;
            }

            $post->category_id = $request->category_id;
            $post->user_id = $request->user_id;
            $post->description = $request->description;

            if ($request->hasFile('img')) {
                $filename = uniqid() . '_' . $request->file('img')->getClientOriginalName();

                $destinationPath = public_path('assets/images/blog/');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                if ($request->file('img')->move($destinationPath, $filename)) {
                    $post->img = $filename;
                } else {
                    return response()->json(['error' => 'File upload failed'], 500);
                }
            }

            $post->meta_title = $request->meta_title;
            $post->meta_desc = $request->meta_desc;

            if ($request->has('meta_keywords')) {
                $post->meta_keywords = implode(',', $request->meta_keywords);
            } else {
                $post->meta_keywords = '';
            }

            $post->status = $request->status;
            $post->save();
            return redirect()->route('admin.blog.create')->with('success', 'Blog post created successfully!');
        } catch (\Exception $e) {
            // dd($e);
            \Log::error('Error creating blog post:' . $e->getMessage());
            return redirect()->route('admin.blog.create')->with('error', 'There was an error creating the blog post.');
        }

        $categories = Category::all();
        $users = User::all();
        return view('admin.blogs.create', compact('categories', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            // 'slug' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:60',
            'meta_desc' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|array',
            'status' => 'required',
        ]);


        $post = Post::findOrFail($id);
        $post->title = $request->title;

        $post->category_id = $request->category_id;
        $post->user_id = $request->user_id;
        $post->description = $request->description;

        if ($request->hasFile('img')) {
            // Delete old image if exists
            $oldImagePath = public_path('assets/images/blog/' . $post->img);
            if ($post->img && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Upload new image
            $filename = uniqid() . '_' . $request->file('img')->getClientOriginalName();
            $destinationPath = public_path('assets/images/blog/');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            if ($request->file('img')->move($destinationPath, $filename)) {
                $post->img = $filename;
            } else {
                return response()->json(['error' => 'File upload failed'], 500);
            }
        }

        $post->meta_title = $request->meta_title;
        $post->meta_desc = $request->meta_desc;
        $post->meta_keywords = implode(',', $request->input('meta_keywords', []));

        $post->status = $request->status;

        $post->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully!');
    }

    public function delete($id)
    {
        try {
            $post = Post::findOrFail($id);

            if ($post->img) {
                $imagePath = public_path('assets/images/blog/' . $post->img);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $post->delete();

            return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error deleting blog post: ' . $e->getMessage());
            return redirect()->route('admin.blogs.index')->with('error', 'There was an error deleting the blog post.');
        }
    }
}

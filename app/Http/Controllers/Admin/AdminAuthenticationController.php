<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminAuthenticationController extends Controller
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
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
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
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required',
            'role_id' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            // $user->password = bcrypt($request->password);
            // Hashing the password
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            $user->status = $request->status;

            if ($request->hasFile('img')) {
                $filename = uniqid() . '_' . $request->file('img')->getClientOriginalName();

                $destinationPath = public_path('assets/images/avatar/');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                if ($request->file('img')->move($destinationPath, $filename)) {
                    $user->img = $filename;
                } else {
                    return response()->json(['error' => 'File upload failed'], 500);
                }
            }

            $user->save();

            return redirect()->route('admin.user.create')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            // dd($e);
            \Log::error('Error creating user:' . $e->getMessage());
            return redirect()->route('admin.user.create')->with('error', 'There was an error creating the user.');
        }
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

        // If is_banner is checked set other posts is_banner to 0
        if ($request->has('is_banner')) {
            Post::where('is_banner', 1)->update(['is_banner' => 0]);
        }

        $post->meta_title = $request->meta_title;
        $post->meta_desc = $request->meta_desc;
        $post->meta_keywords = implode(',', $request->input('meta_keywords', []));

        $post->status = $request->status;
        $post->is_banner = $request->has('is_banner') ? 1 : 0;
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

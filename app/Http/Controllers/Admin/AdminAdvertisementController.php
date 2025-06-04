<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdminAdvertisementController extends Controller

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
        $title = "Advertisement List";
        $advertisements = Advertisement::all();
        return view('admin.advertisements.index', compact('advertisements', 'title'));
    }

    public function create()
    {
        return view('admin.advertisement.create');
    }

    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('admin.advertisement.show', compact('advertisement'));
    }

    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('admin.advertisement.edit', compact('advertisement'));
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
            $advertisement = new Advertisement();
            $advertisement->title = $request->title;

            $slugUniqueCheck = Advertisement::where('slug', $request->slug)->count();
            if ($slugUniqueCheck > 0) {
                $advertisement->slug = $request->slug . '-' . uniqid();
            } else {
                $advertisement->slug = $request->slug;
            }

            $advertisement->category_id = $request->category_id;
            $advertisement->user_id = $request->user_id;
            $advertisement->description = $request->description;

            if ($request->hasFile('img')) {
                $filename = uniqid() . '_' . $request->file('img')->getClientOriginalName();

                $destinationPath = public_path('assets/images/blog/');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                if ($request->file('img')->move($destinationPath, $filename)) {
                    $advertisement->img = $filename;
                } else {
                    return response()->json(['error' => 'File upload failed'], 500);
                }
            }

            // If is_banner is checked set other posts is_banner to 0
            if ($request->has('is_banner')) {
                Advertisement::where('is_banner', 1)->update(['is_banner' => 0]);
            }

            $advertisement->meta_title = $request->meta_title;
            $advertisement->meta_desc = $request->meta_desc;

            if ($request->has('meta_keywords')) {
                $advertisement->meta_keywords = implode(',', $request->meta_keywords);
            } else {
                $advertisement->meta_keywords = '';
            }

            $advertisement->status = $request->status;
            $advertisement->is_banner = $request->has('is_banner') ? 1 : 0;

            $advertisement->save();
            return redirect()->route('admin.advertisement.create')->with('success', 'Blog post created successfully!');
        } catch (\Exception $e) {
            // dd($e);
            \Log::error('Error creating advertisement Advertisement:' . $e->getMessage());
            return redirect()->route('admin.advertisement.create')->with('error', 'There was an error creating the blog post.');
        }

        $users = User::all();
        return view('admin.advertisement.create', compact('categories', 'users'));
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


        $advertisement = Advertisement::findOrFail($id);
        $advertisement->title = $request->title;

        $advertisement->category_id = $request->category_id;
        $advertisement->user_id = $request->user_id;
        $advertisement->description = $request->description;

        if ($request->hasFile('img')) {
            // Delete old image if exists
            $oldImagePath = public_path('assets/images/blog/' . $advertisement->img);
            if ($advertisement->img && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Upload new image
            $filename = uniqid() . '_' . $request->file('img')->getClientOriginalName();
            $destinationPath = public_path('assets/images/blog/');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            if ($request->file('img')->move($destinationPath, $filename)) {
                $advertisement->img = $filename;
            } else {
                return response()->json(['error' => 'File upload failed'], 500);
            }
        }

        // If is_banner is checked set other posts is_banner to 0
        if ($request->has('is_banner')) {
            Advertisement::where('is_banner', 1)->update(['is_banner' => 0]);
        }

        $advertisement->meta_title = $request->meta_title;
        $advertisement->meta_desc = $request->meta_desc;
        $advertisement->meta_keywords = implode(',', $request->input('meta_keywords', []));

        $advertisement->status = $request->status;
        $advertisement->is_banner = $request->has('is_banner') ? 1 : 0;
        $advertisement->save();

        return redirect()->route('admin.advertisement.index')->with('success', 'Blog post updated successfully!');
    }

    public function delete($id)
    {
        try {
            $advertisement = Advertisement::findOrFail($id);

            if ($advertisement->img) {
                $imagePath = public_path('assets/images/banner/' . $advertisement->img);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $advertisement->delete();

            return redirect()->route('admin.advertisements.index')->with('success', 'Advertisement banner deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error deleting Advertisement banner: ' . $e->getMessage());
            return redirect()->route('admin.advertisements.index')->with('error', 'There was an error deleting the Advertisement banner.');
        }
    }
}

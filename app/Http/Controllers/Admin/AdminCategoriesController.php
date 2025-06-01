<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
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
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'categoryName' => 'required|string|max:255',
            'categorySlug' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:60',
            'meta_desc' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|array',
        ]);

        try {
            $category = new Category();
            $category->title = $request->categoryName;
            $slug = $request->categorySlug;

            $slugUniqueCheck = Category::where('slug', $slug)->count();
            if ($slugUniqueCheck > 0) {
                $category->slug = $request->categorySlug . '-' . uniqid();
            } else {
                $category->slug = $request->categorySlug;
            }

            $category->meta_title = $request->meta_title;
            $category->meta_desc = $request->meta_desc;

            if ($request->has('meta_keywords')) {
                $category->meta_keywords = implode(',', $request->meta_keywords);
            }

            $category->save();

            return redirect()->route('admin.category.create')->with('success', 'Category created successfully!');
        } catch (\Exception $e) {
            // dd($e);
            \Log::error('Error creating Category:' . $e->getMessage());
            return redirect()->route('admin.category.create')->with('error', 'There was an error creating the Category.');
        }


        return view('admin.blogs.create', compact('categories', 'users'));
    }
}

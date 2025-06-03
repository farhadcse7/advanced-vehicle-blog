<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminPagesController extends Controller
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

    public function about()
    {
        $data = DB::table('abouts')->first();
        return view('admin.pages.about', compact('data'));
    }

    public function aboutUpdate(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|array',
        ]);

        // Prepare the data for update
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => implode(',', $request->input('meta_keywords', [])),
        ];

        try {
            DB::table('abouts')->where('id', $id)->update($data);
            return redirect()->route('admin.pages.about')->with('success', 'About Us updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.pages.about')->with('error', 'Failed to update About Us: ' . $e->getMessage());
        }
    }

    public function disclaimer()
    {
        $data = DB::table('disclaimers')->first();
        return view('admin.pages.disclaimer', compact('data'));
    }

    public function disclaimerUpdate(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|array',
        ]);

        // Prepare the data for update
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => implode(',', $request->input('meta_keywords', [])),
        ];

        try {
            DB::table('disclaimers')->where('id', $id)->update($data);
            return redirect()->route('admin.pages.disclaimer')->with('success', 'Disclaimers updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.pages.disclaimer')->with('error', 'Failed to update Disclaimers: ' . $e->getMessage());
        }
    }
}

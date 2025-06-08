<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminPrivacyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.privacy.edit')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('privacies')->first();
        return view('admin.pages.privacy', compact('data'));
    }

    public function update(Request $request, $id)
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
            DB::table('privacies')->where('id', $id)->update($data);
            return redirect()->route('admin.pages.privacy')->with('success', 'Privacy Policy updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.pages.privacy')->with('error', 'Failed to update Privacy Policy: ' . $e->getMessage());
        }
    }
}

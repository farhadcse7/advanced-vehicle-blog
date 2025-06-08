<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminSettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.settings.edit')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('settings')->first();
        return view('admin.settings.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'site_name'            => 'nullable|string|max:255',
            'logo'                  => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'fav_icon'              => 'nullable|image|mimes:jpg,jpeg,png,ico,svg|max:1024',
            'phone'                 => 'required|string|max:20',
            'email'                 => 'required|email|max:255',
            'address'               => 'required|string|max:500',
            // 'copyright'            => 'nullable|string|max:255',
            'map_url'               => 'nullable|url|max:500',
            'fb'                    => 'nullable|url|max:255',
            'insta'                 => 'nullable|url|max:255',
            'twitter'               => 'nullable|url|max:255',
            'youtube'               => 'nullable|url|max:255',
            'meta_title'            => 'nullable|string|max:60',
            'meta_desc'             => 'nullable|string|max:160',
            'meta_keywords'         => 'nullable|array',
            'blog_meta_title'       => 'nullable|string|max:60',
            'blog_meta_desc'        => 'nullable|string|max:160',
            'blog_meta_keywords'    => 'nullable|array',
            'contact_meta_title'    => 'nullable|string|max:60',
            'contact_meta_desc'     => 'nullable|string|max:160',
            'contact_meta_keywords' => 'nullable|array',
            'headcss'               => 'nullable|string',
            'disqus'                => 'nullable|string',
            'shareplugin'           => 'nullable|string',
        ]);

        try {

            $setting = DB::table('settings')->where('id', $id)->first();
            $data    = [];

            // Handle Logo Upload
            if ($request->hasFile('logo')) {
                $oldLogoPath = public_path('assets/images/' . $setting->logo);
                if ($setting->logo && File::exists($oldLogoPath)) {
                    File::delete($oldLogoPath);
                }

                $logoFile = $request->file('logo');
                $logoName = uniqid() . '_' . $logoFile->getClientOriginalName();
                $logoPath = public_path('assets/images/');

                if (! File::exists($logoPath)) {
                    File::makeDirectory($logoPath, 0755, true);
                }

                if ($logoFile->move($logoPath, $logoName)) {
                    $data['logo'] = $logoName;
                    // $logo = $logoName;
                } else {
                    return response()->json(['error' => 'Logo upload failed'], 500);
                }
            }

            // Handle Favicon Upload
            if ($request->hasFile('fav_icon')) {
                $oldFaviconPath = public_path('assets/images/' . $setting->fav_icon);
                if ($setting->fav_icon && File::exists($oldFaviconPath)) {
                    File::delete($oldFaviconPath);
                }

                $favFile = $request->file('fav_icon');
                $favName = uniqid() . '_' . $favFile->getClientOriginalName();
                $favPath = public_path('assets/images/');

                if (! File::exists($favPath)) {
                    File::makeDirectory($favPath, 0755, true);
                }

                if ($favFile->move($favPath, $favName)) {
                    $data['fav_icon'] = $favName;
                    // $fav_icon = $favName;
                } else {
                    return response()->json(['error' => 'Favicon upload failed'], 500);
                }
            }

            $formdata = [
                'site_name'             => $request->input('site_name'),
                'phone'                 => $request->input('phone'),
                'email'                 => $request->input('email'),
                'address'               => $request->input('address'),
                // 'copyright'             => $request->input('copyright'),
                'map_url'               => $request->input('map_url'),
                'fb'                    => $request->input('fb'),
                'insta'                 => $request->input('insta'),
                'twitter'               => $request->input('twitter'),
                'youtube'               => $request->input('youtube'),
                'meta_title'            => $request->input('meta_title'),
                'meta_desc'             => $request->input('meta_desc'),
                'meta_keywords'         => implode(',', $request->input('meta_keywords', [])),
                'blog_meta_title'       => $request->input('blog_meta_title'),
                'blog_meta_desc'        => $request->input('blog_meta_desc'),
                'blog_meta_keywords'    => implode(',', $request->input('blog_meta_keywords', [])),
                'contact_meta_title'    => $request->input('contact_meta_title'),
                'contact_meta_desc'     => $request->input('contact_meta_desc'),
                'contact_meta_keywords' => implode(',', $request->input('contact_meta_keywords', [])),
                // 'logo' =>  $logo,
                // 'fav_icon' =>  $fav_icon,
                'headcss'               => $request->input('headcss'),
                'footerscript'          => $request->input('footerscript'),
                'disqus'                => $request->input('disqus'),
                'shareplugin'           => $request->input('shareplugin'),
            ];

            // Merge uploaded files with form data
            $data = array_merge($data, $formdata);

            // Update using Query Builder
            DB::table('settings')->where('id', $id)->update($data);

            // Clear the cache for site settings
            Cache::forget('site_setting');

            return redirect()->back()->with('success', 'Settings updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Error in updating settings: ' . $e->getMessage());
            return redirect()->route('admin.settings.index')->with('error', 'There was an error updating the settings.');
        }
    }
}

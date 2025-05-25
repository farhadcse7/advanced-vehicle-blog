<?php

use App\Models\Category;
use App\Models\Post;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

// function shareCommonData()
// {
//     $categories = Category::all();
//     $latestPosts = Post::latest()->limit(5)->get();

//     view()->share([
//         'categories' => $categories,
//         'latestPosts' => $latestPosts,
//     ]);
// }


// Function to get site settings from the database and cache it for 1 hour
if (!function_exists('getSiteSettings')) {
    function getSiteSettings()
    {
        return Cache::remember('site_setting', 60 * 60, function () {
            return DB::table('settings')->first();
        });
    }
}

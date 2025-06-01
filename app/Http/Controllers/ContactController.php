<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $latestPosts = Post::where('status', 1)->latest()->limit(5)->get();
        return view('pages.contact', compact('latestPosts'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);
        Contact::create($request->all());
        return redirect()->route('contact.index')->with('success', 'Contact query created successfully.');
    }
}

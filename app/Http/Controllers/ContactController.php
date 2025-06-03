<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormNotification;
use App\Models\Post;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

        // Prepare form data for email
        $formData = $request->only('name', 'email', 'subject', 'message');

        // Send email notification
        try {
            Mail::to(getSiteSettings()->email)->send(new ContactFormNotification($formData));
        } catch (\Exception $e) {
            Log::error('Failed to sending email: ' . $e->getMessage());
        }

        return redirect()->route('contact.index')->with('success', 'Contact query created successfully.');
    }
}

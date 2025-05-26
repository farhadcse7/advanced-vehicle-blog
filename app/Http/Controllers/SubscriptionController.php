<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the request data
        $data = request()->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Create a new subscriber
        Subscriber::create($data);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }
}

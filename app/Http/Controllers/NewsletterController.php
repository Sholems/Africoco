<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:newsletter_subscribers,email',
            'name' => 'nullable|string|max:255',
        ]);

        NewsletterSubscriber::create([
            'email' => $validated['email'],
            'name' => $validated['name'] ?? null,
            'source' => $request->input('source', 'website'),
            'is_active' => true,
        ]);

        // TODO: Send confirmation email

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['message' => 'Successfully subscribed to our newsletter!']);
        }

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'area_of_interest' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:1000',
            'message' => 'nullable|string|max:2000',
        ]);

        Volunteer::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'location' => $validated['location'] ?? null,
            'area_of_interest' => $validated['area_of_interest'] ?? null,
            'skills' => $validated['skills'] ?? null,
            'message' => $validated['message'] ?? null,
            'status' => 'new',
        ]);

        // TODO: Send email notification to admin

        return back()->with('success', 'Thank you for your interest in volunteering with AFRICOCO! We will contact you soon.');
    }
}

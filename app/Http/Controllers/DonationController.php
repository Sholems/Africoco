<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'donor_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'amount' => 'required|numeric|min:100',
            'purpose' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        $reference = 'DON-' . strtoupper(uniqid());

        $donation = Donation::create([
            'donor_name' => $validated['donor_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'amount' => $validated['amount'],
            'purpose' => $validated['purpose'] ?? 'General Support',
            'message' => $validated['message'] ?? null,
            'payment_reference' => $reference,
            'payment_status' => 'pending',
            'currency' => 'NGN',
        ]);

        // Paystack integration will be added here
        // For now, mark as successful for testing
        $donation->update([
            'payment_status' => 'successful',
            'transaction_id' => 'TXN_' . strtoupper(uniqid()),
        ]);

        return redirect()->route('donate.success', ['reference' => $reference])
            ->with('success', 'Thank you for your generous donation!');
    }

    public function callback(Request $request)
    {
        $reference = $request->reference;

        // Verify transaction with Paystack API
        // For now, update donation status based on reference
        $donation = Donation::where('payment_reference', $reference)->first();

        if ($donation) {
            $donation->update(['payment_status' => 'successful']);
        }

        return redirect()->route('donate.success', ['reference' => $reference]);
    }

    public function success(Request $request)
    {
        $donation = Donation::where('payment_reference', $request->reference)->first();
        return view('pages.donate-success', compact('donation'));
    }
}

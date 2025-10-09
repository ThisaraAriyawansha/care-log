<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    // Get all donations
    public function index()
    {
        $donations = Donation::with('donator')->latest()->get();
        return response()->json($donations);
    }

    // Store a new donation
    public function store(Request $request)
    {
        $request->validate([
            'donator_id' => 'required|exists:users,id',
            'total_quantity' => 'required|integer|min:1',
            'donation_date' => 'required|date',
        ]);

        $donation = Donation::create($request->all());

        return response()->json([
            'message' => 'Donation created successfully!',
            'data' => $donation
        ], 201);
    }

    // Show a single donation
    public function show($id)
    {
        $donation = Donation::with('donator')->findOrFail($id);
        return response()->json($donation);
    }

    // Update donation
    public function update(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);

        $request->validate([
            'total_quantity' => 'nullable|integer|min:1',
            'donation_date' => 'nullable|date',
        ]);

        $donation->update($request->only(['total_quantity', 'donation_date']));

        return response()->json([
            'message' => 'Donation updated successfully!',
            'data' => $donation
        ]);
    }

    // Delete donation
    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();

        return response()->json(['message' => 'Donation deleted successfully!']);
    }
}

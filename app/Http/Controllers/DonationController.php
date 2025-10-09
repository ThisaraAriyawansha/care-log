<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationItem;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{

    public function donators()
    {
        return view('donators.donators');
    }

    public function viewdonations()
    {
        // Get the authenticated user's donations with related items
        $donations = Donation::with('items.item')
            ->where('donator_id', Auth::id())
            ->orderBy('donation_date', 'desc')
            ->get();

        return view('donators.viewdonations', compact('donations'));
    }

    
    public function adddonation()
    {
        $items = Item::where('status_id', 1)->get(); // Assuming status_id 1 means active items
        return view('donators.adddonation', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        // Calculate the total quantity of items in the current request
        $newDonationQuantity = array_sum(array_column($request->items, 'quantity'));

        // Check the donator's total donations for the current month
        $donatorId = Auth::id();
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        $monthlyDonationTotal = Donation::where('donator_id', $donatorId)
            ->whereBetween('donation_date', [$startOfMonth, $endOfMonth])
            ->sum('total_quantity');

        // Check if the new donation exceeds the 300-item monthly limit
        if ($monthlyDonationTotal + $newDonationQuantity > 300) {
            return back()->withErrors(['error' => 'You have exceeded the monthly donation limit of 300 items.']);
        }

        DB::beginTransaction();
        try {
            // Create Donation
            $donation = Donation::create([
                'donator_id' => $donatorId,
                'total_quantity' => $newDonationQuantity,
                'donation_date' => now(),
            ]);

            // Create DonationItems and increase Item quantities
            foreach ($request->items as $itemData) {
                $item = Item::find($itemData['item_id']);

                DonationItem::create([
                    'donation_id' => $donation->id,
                    'item_id' => $itemData['item_id'],
                    'quantity' => $itemData['quantity'],
                ]);

                // Increase item quantity
                $item->quantity += $itemData['quantity'];
                $item->save();
            }

            DB::commit();
            return redirect()->back()->with('success', 'Donation added successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}

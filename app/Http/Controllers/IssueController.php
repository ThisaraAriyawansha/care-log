<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\IssueItem;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IssueController extends Controller
{
    public function issuers()
    {
        return view('issuers.issuers');
    }

    public function getgoods()
    {
        $items = Item::where('status_id', 1)      // active items
                    ->where('quantity', '>', 0) // in stock
                    ->orderBy('item_name', 'asc')
                    ->get();

        return view('issuers.getgoods', compact('items'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|max:3',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ], [
            'items.max' => 'You can only select up to 3 different item types.',
            'items.required' => 'Please select at least one item.',
        ]);

        DB::beginTransaction();
        try {
            // Calculate requested quantity
            $requestedQuantity = array_sum(array_column($request->items, 'quantity'));

            // Check monthly limit (100 items per user per month)
            $currentMonth = now()->month;
            $currentYear = now()->year;
            $userId = Auth::id();

            $monthlyTotal = Issue::where('issuer_id', $userId)
                ->whereMonth('issue_date', $currentMonth)
                ->whereYear('issue_date', $currentYear)
                ->sum('total_quantity');

            if ($monthlyTotal + $requestedQuantity > 100) {
                return back()->withErrors([
                    'error' => "You have reached or exceeded the monthly limit of 100 items. Current: {$monthlyTotal}, Requested: {$requestedQuantity}"
                ]);
            }

            // Validate that quantities don't exceed available stock
            foreach ($request->items as $itemData) {
                $item = Item::find($itemData['item_id']);
                
                if ($item->quantity < $itemData['quantity']) {
                    return back()->withErrors([
                        'error' => "Insufficient stock for {$item->item_name}. Available: {$item->quantity}, Requested: {$itemData['quantity']}"
                    ]);
                }
            }

            // Create Issue
            $issue = Issue::create([
                'issuer_id' => $userId,
                'total_quantity' => $requestedQuantity,
                'issue_date' => now(),
            ]);

            // Create IssueItems and decrease Item quantities
            foreach ($request->items as $itemData) {
                $item = Item::find($itemData['item_id']);

                IssueItem::create([
                    'issue_id' => $issue->id,
                    'item_id' => $itemData['item_id'],
                    'quantity' => $itemData['quantity'],
                ]);

                // Decrease item quantity
                $item->quantity -= $itemData['quantity'];
                $item->save();
            }

            DB::commit();
            return redirect()->back()->with('success', 'Items issued successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to issue items: ' . $e->getMessage()]);
        }
    }
}
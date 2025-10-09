<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Issue;
use App\Models\Item;
use App\Models\User;
use App\Models\DonationItem;
use App\Models\IssueItem;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Total Donations (sum of total_quantity from donations)
        $totalDonations = Donation::sum('total_quantity');

        // Total Issues (sum of total_quantity from issues)
        $totalIssues = Issue::sum('total_quantity');

        // Today's Donations
        $todayDonations = Donation::whereDate('donation_date', today())->sum('total_quantity');

        // Today's Issues
        $todayIssues = Issue::whereDate('issue_date', today())->sum('total_quantity');

        // Counts
        $donatorCount = User::whereHas('role', function($q) {
            $q->where('role_name', 'Donator');
        })->count();

        $issuerCount = User::whereHas('role', function($q) {
            $q->where('role_name', 'Issuer');
        })->count();

        $itemCount = Item::count();
        $donationCount = Donation::count();
        $issueCount = Issue::count();

        // Top 5 Donated Items (by quantity from donation_items)
        $topDonatedItems = DonationItem::select('item_id', DB::raw('SUM(quantity) as total_donated'))
            ->with('item')
            ->groupBy('item_id')
            ->orderByDesc('total_donated')
            ->limit(5)
            ->get();

        // Top 5 Donators (by total_quantity from donations)
        $topDonators = Donation::select('donator_id', DB::raw('SUM(total_quantity) as total_donated'))
            ->with('donator')
            ->groupBy('donator_id')
            ->orderByDesc('total_donated')
            ->limit(5)
            ->get();

        // Monthly Donations Data for Chart
        $monthlyDonations = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyDonations[] = Donation::whereMonth('donation_date', $i)
                ->whereYear('donation_date', date('Y'))
                ->sum('total_quantity');
        }

        // Items for stock alerts
        $items = Item::all();

        // Pass data to the view
        return view('dash.dash', [
            'totalDonations' => $totalDonations,
            'totalIssues' => $totalIssues,
            'todayDonations' => $todayDonations,
            'todayIssues' => $todayIssues,
            'donatorCount' => $donatorCount,
            'issuerCount' => $issuerCount,
            'itemCount' => $itemCount,
            'donationCount' => $donationCount,
            'issueCount' => $issueCount,
            'topDonatedItems' => $topDonatedItems,
            'topDonators' => $topDonators,
            'monthlyDonations' => $monthlyDonations,
            'items' => $items,
        ]);
    }
}
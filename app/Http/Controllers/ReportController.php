<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Issue;
use Carbon\Carbon;
use DB;

class ReportController extends Controller
{
    public function reports()
    {
        return view('reports.reports');
    }

    public function donations(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Query donations with the donator relationship
        $query = Donation::with('donator');

        // Apply search filter if provided
        if ($search) {
            $query->whereHas('donator', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        // Paginate the results (e.g., 10 per page)
        $donations = $query->orderBy('donation_date', 'desc')->paginate(10);

        // Pass the donations and search query to the view
        return view('reports.donatHistory', compact('donations', 'search'));
    }

    public function donationDetails($id)
    {
        $donation = Donation::with(['donator', 'items.item'])->findOrFail($id);
        return view('reports.donationDetails', compact('donation'));
    }

    public function issues(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Query issues with the issuer relationship
        $query = Issue::with('issuer');

        // Apply search filter if provided
        if ($search) {
            $query->whereHas('issuer', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        // Paginate the results (10 per page)
        $issues = $query->orderBy('issue_date', 'desc')->paginate(10);

        // Pass the issues and search query to the view
        return view('reports.issueHistory', compact('issues', 'search'));
    }

    public function issueDetails($id)
    {
        $issue = Issue::with(['issuer', 'items.item'])->findOrFail($id);
        return view('reports.issueDetails', compact('issue'));
    }
}

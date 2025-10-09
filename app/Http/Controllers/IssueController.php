<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    // Get all issues
    public function index()
    {
        $issues = Issue::with('issuer')->latest()->get();
        return response()->json($issues);
    }

    // Store a new issue
    public function store(Request $request)
    {
        $request->validate([
            'issuer_id' => 'required|exists:users,id',
            'total_quantity' => 'required|integer|min:1',
            'issue_date' => 'required|date',
        ]);

        $issue = Issue::create($request->all());

        return response()->json([
            'message' => 'Issue created successfully!',
            'data' => $issue
        ], 201);
    }

    // Show single issue
    public function show($id)
    {
        $issue = Issue::with('issuer')->findOrFail($id);
        return response()->json($issue);
    }

    // Update issue
    public function update(Request $request, $id)
    {
        $issue = Issue::findOrFail($id);

        $request->validate([
            'total_quantity' => 'nullable|integer|min:1',
            'issue_date' => 'nullable|date',
        ]);

        $issue->update($request->only(['total_quantity', 'issue_date']));

        return response()->json([
            'message' => 'Issue updated successfully!',
            'data' => $issue
        ]);
    }

    // Delete issue
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();

        return response()->json(['message' => 'Issue deleted successfully!']);
    }
}

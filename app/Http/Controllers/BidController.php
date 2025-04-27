<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{
    // Store a new bid (tasker bids)
    public function store(Request $request, Task $task) {
        // Validate the request data
        $validated = $request->validate([
            'proposed_price' => 'required|numeric|min:1',  // Proposed price must be numeric and greater than 0
            'estimated_time' => 'required|integer|min:1',  // Estimated time must be a positive integer
        ]);

        // Create the bid
        $bid = Bid::create([
            'task_id' => $task->id,
            'tasker_id' => auth()->id(),
            'proposed_price' => $validated['proposed_price'],
            'estimated_time' => $validated['estimated_time'],
        ]);

        return response()->json($bid, 201);
    }

    // Get all bids for a specific task (client sees bids)
    public function index(Task $task) {
        return $task->bids()->with('tasker')->get();  // Get all bids for the task, including the tasker details
    }
}

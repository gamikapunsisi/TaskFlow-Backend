<?php

namespace App\Http\Controllers;

use App\Models\Task; // Import Task model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator

class TaskController extends Controller
{
    // Store a new task (client posts)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'category' => 'required|string',
            'deadline' => 'required|date',
        ]);
    
        $task = Task::create($validated);
    
        return response()->json($task, 201);
    }
    

    // Get all open tasks (taskers view)
    public function index()
    {
        // Retrieve open tasks along with their associated bids
        $tasks = Task::where('status', 'open')->with('bids')->get();

        return response()->json($tasks);
    }
}

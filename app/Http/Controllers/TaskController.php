<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title'       => 'required|min:3',
            'description' => 'nullable|max:255',
        ]);

        $task = Task::create([
            'title'       => $request->title,
            'description' => $request->description,
            'is_done'     => false,
        ]);
        return response()->json([
            'message' => 'Task created successfully',
            'task'    => $task,
        ]);
    }
}

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

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (! $task) {
            return response()->json([
                'message' => 'Task not found',
            ], 404);
        }
        $task->update([
            'title'       => $request->title ?? $task->title,
            'description' => $request->description ?? $task->description,
            'is_done'     => $request->is_done ?? $task->is_done,
        ]);

        return response()->json([
            'message' => 'Task updated successfully',
            'task'    => $task,
        ]);
    }
}

<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
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

    public function store(StoreTaskRequest $request)
    {

        $task = Task::create($request->validated());
        return response()->json([
            'message' => 'Task created successfully',
            'task'    => $task,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'title'       => $request->title ?? $task->title,
            'description' => $request->description ?? $task->description,
            'is_done'     => $request->is_done ?? $task->is_done,
        ]);

        return response()->json([
            'message' => 'Task updated successfully',
            'task'    => $task,
        ], 201);
    }

    public function destroy(int $id)
    {
        $task = Task::findOrFail($id);

        $task->delete();
        return response()->json([
            'message' => 'Task deleted successfully',
        ]);

    }
}

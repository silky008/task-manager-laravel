<?php
namespace App\Http\Controllers;

use App\Models\Task;

class HelloController extends Controller
{
    //
    public function index()
    {
        Task::create([
            'title'       => 'First Task',
            'description' => 'Learn Laravel step by step',
            'is_done'     => false,
        ]);
        return "Task created";
    }
}

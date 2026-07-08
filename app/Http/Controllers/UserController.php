<?php
namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    //
    public function tasks(int $user_id)
    {
        $user  = User::findOrFail($user_id);
        $tasks = $user->tasks;
        return response()->json($tasks);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks', [
            'tasks' => Task::all(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required'
        ]);
        Task::create($attributes);
        return redirect('/');
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/');
    }

    public function markAsDone($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'done';
        $task->save();
        return redirect('/');
    }

}

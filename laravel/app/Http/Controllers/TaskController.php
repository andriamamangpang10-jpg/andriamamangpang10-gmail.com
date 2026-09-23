<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Tan-awon ang mga Task
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    // Ipakita ang Add Task form
    public function create()
    {
        return view('tasks.create');
    }

    // Pag-dugang og Task
    public function store(Request $request)
    {
        $request->validate([
            'task_name'   => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:Pending,Completed',
            'due_date'    => 'nullable|date',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task added successfully.');
    }

    // Ipakita ang Edit Task form
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // I-edit ang Task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name'   => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:Pending,Completed',
            'due_date'    => 'nullable|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Pagwala og Task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
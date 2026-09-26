<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TaskController extends Controller
{
    // View all tasks
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    // Show Add Task page
    public function create()
    {
        return view('tasks.create');
    }

    // Save new task
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        // Relative redirect - keeps the current Codespaces domain
        return new RedirectResponse('/');
    }

    // Show Edit Task page
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update existing task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return new RedirectResponse('/');
    }

    // Delete task
    public function destroy(Task $task)
    {
        $task->delete();

        return new RedirectResponse('/');
    }

    // Change Pending <-> Completed
    public function updateStatus(Task $task)
    {
        $task->update([
            'status' => $task->status === 'Pending'
                ? 'Completed'
                : 'Pending',
        ]);

        return new RedirectResponse('/');
    }
}
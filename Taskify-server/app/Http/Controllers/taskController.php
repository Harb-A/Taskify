<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;

class taskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getTasks()
    {
        $tasks = task::all();
        return response()->json([
            'status' => 'success',
            'tasks' => $tasks,
        ]);
    }

    public function addTask(Request $request)
    {
        $request->validate([
            'name' => "required|string",
            'description' => 'required|string',
        ]);

        $task = task::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'ongoing'
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Task created successfully',
            'task' => $task,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $task = task::find($id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Task updated successfully',
            'task' => $task,
        ]);
    }

    public function delete($id)
    {
        $task = task::find($id);
        $task->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Task deleted successfully',
            'task' => $task,
        ]);
    }
}

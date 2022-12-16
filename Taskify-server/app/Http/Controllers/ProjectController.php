<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function addProject(Request $request)
    {
        $request->validate([
            'name' => "required|string",
            'description' => 'required|string',
        ]);

        $task = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'user-id' => Auth::id()
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Task created successfully',
            'task' => $task,
        ]);
    }

    public function getProjects()
    {
        $tasks = Project::all()->where('user-id', '=', Auth::id());

        return response()->json([
            'status' => 'success',
            'tasks' => $tasks,
        ]);
    }
}

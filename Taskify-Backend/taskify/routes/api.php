<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("register", [UserController::class, "register"]);
Route::post("login", [UserController::class, "login"]);
Route::post("editProfile", [UserController::class, "edit"]);

Route::post("createTask", [TaskController::class, "create"]);
Route::post("deleteTask", [TaskController::class, "delete"]);
Route::post("editTask", [TaskController::class, "edit"]);
Route::get("showTasks", [TaskController::class, "show"]);

Route::post("createProject", [ProjectController::class, "create"]);
Route::post("deleteProject", [ProjectController::class, "deleete"]);
Route::post("editProject", [ProjectController::class, "edit"]);
Route::get("getProjects", [ProjectController::class, "show"]);

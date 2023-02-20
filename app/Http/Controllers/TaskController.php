<?php

namespace App\Http\Controllers;

use App\Actions\Tasks\DeleteTask;
use App\Actions\Tasks\FetchTasks;
use App\Actions\Tasks\SaveTask;
use App\DTOs\Tasks\FetchTasksDTO;
use App\DTOs\Tasks\SaveTaskDTO;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, FetchTasks $action): JsonResponse
    {
        return response()->json($action->handle(FetchTasksDTO::fromRequest($request)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SaveTask $action): JsonResponse
    {
        return response()->json($action->handle(SaveTaskDTO::fromRequest($request)));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, DeleteTask $action): Response
    {
        $action->handle($task->id);
        return response()->noContent();
    }
}

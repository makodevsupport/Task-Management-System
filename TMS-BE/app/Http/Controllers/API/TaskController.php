<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\API\UpdateTaskRequest;
use App\Http\Requests\API\CreateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::orderBy("created_at", "desc")->simplePaginate(10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Task::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request, Task $task)
    {
        $created_task = $task->create($request->validated());

        return $created_task;
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {

        $task->update($request->validated());

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->noContent();
    }
}

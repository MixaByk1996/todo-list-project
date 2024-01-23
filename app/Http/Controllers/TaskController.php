<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\Collection\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a list of tasks
     * @deprecated
     */
    public function index(): TaskCollection
    {
        return new TaskCollection(Task::all());
    }

    /**
     * Store task .
     * @param TaskRequest $request
     * @return TaskResource
     * @deprecated
     */
    public function store(TaskRequest $request): TaskResource
    {
        $task = Task::query()->create($request->all());
        return new TaskResource($task);
    }

    /**
     * View task.
     * @param string $id
     * @return TaskResource
     * @deprecated
     */
    public function show(string $id): TaskResource
    {
        $showed_task = Task::query()->where('id', $id)->first();
        return new TaskResource($showed_task);
    }

    /**
     * Update task by id.
     * @param TaskRequest $request
     * @param string $id
     * @return TaskResource
     * @deprecated
     */
    public function update(TaskRequest $request, string $id): TaskResource
    {
        $updated_task = Task::query()->where('id', $id)->first();
        $updated_task->update($request->all());
        return new TaskResource($updated_task);
    }

    /**
     * Remove task by id.
     * @param string $id
     * @return JsonResponse
     * @deprecated
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $deleted_task = Task::query()->where('id', $id)->first();
        $deleted_task->delete();
        return response()->json([
            'message' => 'This task has been delete'
        ]);
    }
}

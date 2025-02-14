<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        $query->orderBy('created_at','desc'); 
        return TaskResource::collection($query->paginate(5));
    }

    public function store(TaskRequest $request)
    {
        $task=Task::create($request->validated());
        return new TaskResource($task);

    }

    public function update(TaskRequest $request,Task $task)
    {
        $task->update($request->validated());
        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete(); //soft delete
        return response()->json(['message' => 'Task deleted successfully'], 200);
    }

    public function restore($id)
    {
        $task=Task::withTrashed()->find($id);
        if (!$task) {

            return response()->json(['message' => 'Task not found'], 404);
        }
        $task->restore();
        return response()->json(['message' => 'Task restored successfully']);

    }

    public function forceDestroy($id)
    {
        $task = Task::withTrashed()->find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->forceDelete();
        return response()->json(['message' => 'Task permanently deleted']);

    }
}

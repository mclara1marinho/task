<?php

namespace App\Http\Controllers;

use App\Models\Subtask;
use App\Models\Task;
use Illuminate\Http\Request;

class SubtaskController extends Controller
{
    public function index($taskId)
    {
        $subtasks = Task::findOrFail($taskId)->subtasks;
        return response()->json($subtasks);
    }

    public function store(Request $request, $taskId)
    {
        $subtaskData = $request->all();
        $subtaskData['id_task'] = $taskId;
        $subtask = Subtask::create($subtaskData);
        return response()->json($subtask, 201);
    }

    public function show($taskId, $subtaskId)
    {
        $subtask = Subtask::findOrFail($subtaskId);
        return response()->json($subtask);
    }

    public function update(Request $request, $taskId, $subtaskId)
    {
        $subtask = Subtask::findOrFail($subtaskId);
        $subtask->update($request->all());
        return response()->json($subtask);
    }

    public function destroy($taskId, $subtaskId)
    {
        $subtask = Subtask::findOrFail($subtaskId);
        $subtask->delete();
        return response()->json(null, 204);
    }
}


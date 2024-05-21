<?php

use App\Http\Controllers\Controller;
use App\Models\Subtask;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubtaskController extends Controller
{
    public function index($taskId)
    {
        $subtasks = Task::findOrFail($taskId)->subtasks;
        return response()->json($subtasks);
    }

    public function store(Request $request, $taskId)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'id_task' => 'required|integer'
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $requestData = $request->all();
        $requestData['id_task'] = $taskId;
        $subtask = Subtask::create($requestData);

        return response()->json($subtask, 201);
    }

    public function show($subtaskId)
    {
        $subtask = Subtask::findOrFail($subtaskId);
        return response()->json($subtask);
    }

    public function update(Request $request, $subtaskId)
    {
        $subtask = Subtask::findOrFail($subtaskId);


        $rules = [
            'name' => 'string|max:255',
            'id_task' => 'integer'
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $subtask->update($request->all());
        return response()->json($subtask);
    }

    public function destroy($subtaskId)
    {
        $subtask = Subtask::findOrFail($subtaskId);
        $subtask->delete();
        return response()->json(null, 204);
    }
}

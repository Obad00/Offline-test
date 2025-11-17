<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // <-- ajouté

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        return response()->json(Task::all());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        // Create task with operation_id for offline sync
        $task = Task::create([
            'title' => $request->title,
            'is_done' => $request->is_done ?? false,
            'operation_id' => $request->operation_id,
        ]);

        return response()->json($task, 201);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, $operation_id)
    {
        $task = Task::where('operation_id', $operation_id)->first();

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->update([
            'title' => $request->title ?? $task->title,
            'is_done' => $request->is_done ?? $task->is_done,
        ]);

        return response()->json($task);
    }


    /**
     * Remove the specified resource from storage.
     */
     public function destroy($operation_id)
    {
        $task = Task::where('operation_id', $operation_id)->first();

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['success' => true]);
    }

}

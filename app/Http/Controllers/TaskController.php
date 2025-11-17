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
        //
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
    public function store(Request $req)
    {
        $req->validate([
            'title' => 'required|string|max:255',
            'operation_id' => 'required'
        ]);

        $exists = Task::where('operation_id', $req->operation_id)->first();
        if ($exists) return response()->json($exists);

        return Task::create($req->all());
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
    public function update(Request $req, Task $task)
    {
        $task->update($req->all());
        return $task;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['status' => 'deleted']);
    }

}

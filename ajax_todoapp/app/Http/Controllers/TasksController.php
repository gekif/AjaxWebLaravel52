<?php

namespace App\Http\Controllers;

use App\Task;
use App\Todolist;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $todolistId)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $todolist = Todolist::findOrFail($todolistId);

        $task = $todolist->tasks()
                    ->create($request ->all());

        return view('tasks.item', compact('task'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $todolistId, $id)
    {
        $task = Task::findOrFail($id);

        $task->completed_at = $request->completed == "true" ? Carbon::now() : NULL;

        $affectedRow = $task->update();

        echo $affectedRow;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

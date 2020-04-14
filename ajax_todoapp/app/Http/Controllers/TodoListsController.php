<?php

namespace App\Http\Controllers;

use App\Todolist;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TodoListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $todolists = $request->user()
            ->todolists()
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('todolists.index', compact('todolists'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $todolist = new Todolist();

        return view('todolists.form', compact('todolist'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'min:5'
        ]);

        $todolist = $request->user()
            ->todolists()
            ->create($request->all());

        return view('todolists.item', compact('todolist'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todolist = Todolist::findOrFail($id);

        $tasks = $todolist->tasks
                    ->latest()
                    ->get();

        return view('tasks.index', compact('tasks'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todolist =  Todolist::findOrFail($id);

        return view('todolists.form', compact('todolist'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'min:5'
        ]);

        $todolist = Todolist::findOrFail($id);

        $todolist->update($request->all());

        return view('todolists.item', compact('todolist'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todolist = Todolist::findOrFail($id);

        $todolist->delete();

        return $todolist;
    }
}

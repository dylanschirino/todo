<?php

namespace App\Http\Controllers;

use App\Task;
use App\Tasklist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task=$task->tasklist;
        return view('tasks.index',compact('task'));
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
    public function store(Request $request)
    {
        $this->validate($request,['title'=>'required','body'=>'required']);
        // récuperer les trucs et les enregistrer
        Task::create($request->all());
        return back(); // cela va rediriger vers la page d'ou on vient
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task->load('tasklist');
        if (Gate::allows('show-task', $task)) {
            return view('tasks.show', compact('task'));
        } else{
            return "vous n'avez pas le droit d'etre ici";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $tasklists = User::find(1)->tasklist;
        return view('tasks.edit',compact('task','tasklists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request,['title'=>'required','body'=>'required']);
        $task->title = $request->title;
        $task->body = $request->body;
        $task->tasklist_id = $request->tasklist_id;
        $task->is_completed = isset($request->is_completed)?1:0;
        $task->save();
        return redirect()->route('tasks.show',['id'=>$task->id]); // on fait une redirection vers la page show en lui donneant également son id
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return view('tasks.destroy');
    }
    public function confirm(Task $task)
    {
        return view('tasks.confirm',compact('task'));
    }
}

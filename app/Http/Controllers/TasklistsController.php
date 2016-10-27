<?php

namespace App\Http\Controllers;

use App\Tasklist;
use App\User;
use Illuminate\Http\Request;

class TasklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(1); // on récupere l'utilisateur d'id 1
        $tasklists = $user->tasklist; // On va récuperer la collection direct ( un super array ) qui va contenir les différentes tasklist donc en gros on récupère ce qui est dans le model
        return view('tasklists.index',compact('tasklists','user'));
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
        Tasklist::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tasklist $tasklist)
    {
        //$tasks = $tasklist->tasks; // on lui dis qu'on va utiliser la function task du modèle Tasklist
        $tasklist->load('task');
        return view('tasklists.show',compact('tasklist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasklist $tasklist)
    {
        $user = User::find(1)->owner;
        return view('tasklists.edit',compact('tasklist','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasklist $tasklist)
    {
        $tasklist->title = $request->title;
        $tasklist->user_id = $request->user_id;
        $tasklist->save();
        return redirect()->route('tasklists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasklist $tasklist)
    {
        $tasklist->delete();
        return view('tasklists.destroy');
    }
}

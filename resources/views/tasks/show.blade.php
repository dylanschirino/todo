@extends('layout')

@section('content')
    <h1>Le nom de la tache : {{$task->title}}</h1>
    <p><a href="{{url('tasklists',$task->tasklist_id)}}">Retour à la liste des tâches</a></p>
    <p>{{$task->body}}</p>
    <div>
        <div>
        <a class="btn btn-warning" href="/tasks/{{$task->id}}/edit">Modifier cette tâche</a>
        </div>
        <br>
        <p>Cette tache fait partie de la liste :
        <a href="{{ url('tasklists',$task->tasklist_id) }}">{{$task->tasklist->title}}</a>
        </p>
        <div>
            <a class="btn btn-danger" href="/tasks/{{$task->id}}/confirm">Supprimer la tâche</a>
        </div>
    </div>
@stop
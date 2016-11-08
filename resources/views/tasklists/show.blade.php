@extends('layout')

@section('content')
    <h1>Voici les taches pour la liste : {{$tasklist->title}}</h1>
    <p><a href="{{url('tasklists')}}">Retour à la liste des tâches</a></p>
    <ol class="list-group">
        @foreach($tasklist->tasks as $task)
        <li class="list-group-item">
            <a href="{{ url('tasks',$task->id) }}">{{$task->title}}</a>
        </li>
        @endforeach
    </ol>
    <h2>Ajouter une tâche à la liste:</h2>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/tasks" method="POST">
        {{csrf_field()}}
        <div class="form-group">
        <label for="title">Titre de la tâche</label>
        <input type="text" class="form-control" name="title" id="title">
            </div>
        <div class="form-group">
            <label for="body">Description de la tâche</label>
            <textarea class="form-control" cols="30" rows="10" name="body" id="body">{{old('body')}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
        <div>
            <input type="hidden" name="tasklist_id" value="{{$tasklist->id}}">
        </div>
    </form>
    @stop
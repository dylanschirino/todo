@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Les listes des tâches de {{Auth::user()->name}}</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a class="btn btn-default" href="/tasks">Voir toute les tâches de l'utilisateurs</a>
    <hr>
    <ol class="list-group">
        @foreach($tasklists as $tasklist)
            <li class="list-group-item">
                <a href="tasklists/{{$tasklist->id}}">{{$tasklist->title}}</a>
                <ul>
                    <li>
                        <a class="btn btn-info" href="/tasklists/{{$tasklist->id}}/edit">Modifier le nom</a>
                    </li>
                    <br>
                    <li>
                        <div>
                            <a class="btn btn-danger" href="/tasklists/{{$tasklist->id}}/confirm" >Supprimer la liste de tâche</a>
                        </div>
                    </li>
                </ul>
            </li>
        @endforeach
    </ol>
    <h2>Ajouter une liste de tâches:</h2>
    <form action="/tasklists" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Titre de la liste tâche</label>
            <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
        <input type="hidden" name="user_id" value="{{$tasklist->user_id}}">
    </form>
    @stop
@endsection

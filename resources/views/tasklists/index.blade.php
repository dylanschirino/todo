@extends('layout')

@section('content')
    <h1>Les listes des tâches de {{$user->name}}</h1>
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
                        <form action="/tasklists/{{$tasklist->id}}" method="POST">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button class="btn btn-danger" type="submit">Supprimer la liste de tâche</button>
                        </form>
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
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
        <input type="hidden" name="user_id" value="{{$tasklist->user_id}}">
    </form>
    @stop
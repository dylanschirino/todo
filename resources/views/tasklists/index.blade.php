@extends('layout')

@section('content')
    <h1>Les listes des tâches de {{$user->name}}</h1>
    <ol class="list-group">
        @foreach($tasklists as $tasklist)
        <li class="list-group-item">
            <a href="tasklists/{{$tasklist->id}}">{{$tasklist->title}}</a>
        </li>
        @endforeach
    </ol>
    @stop
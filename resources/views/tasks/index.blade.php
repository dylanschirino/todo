@extends('layout')

@section('content')
    <h1>Toute les tâches</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a class="btn btn-default" href="/">Retour à la liste des tâches</a>
    <hr>
    <ol class="list-group">
        @foreach($task as $item)
            <li class="list-group-item">
                <a href="tasks/">{{$item->title}}</a>
            </li>
        @endforeach
    </ol>
@stop
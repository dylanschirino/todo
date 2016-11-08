@extends('layout')

@section('content')
    <h1>Édition de la liste de tâches&nbsp;: {{$tasklist->title}}</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/tasklists/{{$tasklist->id}}" method="POST">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Titre de la liste de tâche</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $tasklist->title}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
        <input type="hidden" name="user_id" value="{{$tasklist->user_id}}">
    </form>
@stop
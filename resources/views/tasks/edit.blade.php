@extends('layout')

@section('content')
    <h1>Édition de la tâches&nbsp;: {{$task->title}}</h1>
    <form action="/tasks/{{$task->id}}" method="POST">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Titre de la tâche</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$task->title}}">
        </div>
        <div class="form-group">
            <label for="body">Description de la tâche</label>
            <textarea class="form-control" cols="30" rows="10" name="body" id="body">{{$task->body}}</textarea>
        </div>
        <div class="form-group">
            <label for="tasklist_id">Dans le liste :</label>
            <select name="tasklist_id" id="tasklist_id">
                @foreach($tasklists as $tasklist)
                <option @if($task->tasklist_id == $tasklist->id) selected @endif value="{{$tasklist->id}}">
                    {{$tasklist->title}}

                </option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_completed">Est-ce completé? :</label>
            <input type="checkbox" name="is_completed" id="is_completed" value="1" @if($task->is_completed===1) checked @endif >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
@stop
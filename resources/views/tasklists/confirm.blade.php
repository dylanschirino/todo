@extends('layout')

@section('content')
    <h2>Êtes-vous sur de vouloir supprimer cette liste de tâche?</h2>
    <div>
        <form action="/tasklists/{{$tasklist->id}}" method="POST">
            {{method_field('DELETE')}}
            {{csrf_field()}}
            <a class="btn btn-info" href="/">Annuler</a>
            <button class="btn btn-danger" type="submit" >Supprimer la liste de tâche</button>
        </form>
    </div>
@stop
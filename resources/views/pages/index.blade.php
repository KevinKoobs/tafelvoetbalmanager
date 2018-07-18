@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{ $title }}</h1>
        <p>{{ $paragraph }}</p>
        @if(count($players) > 0)
            <h3>Onze spelers</h3>
            <ul class="list-group text-left">
                @foreach($players as $player)
                    <li class="list-group-item">{{ $player->name }}</li>
                @endforeach
            </ul>
        @endif
        <div class="col-xs-12">
            <a href="{{ url('/results/create') }}" class="btn btn-sm btn-info">Gespeelde wedstrijd toevoegen</a>
            <a href="{{ url('/classifications') }}" class="btn btn-sm btn-warning">Alle klassementen bekijken</a>
        </div>
    </div>
@endsection
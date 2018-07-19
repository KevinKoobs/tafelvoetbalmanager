@extends('layouts.app')

@section('content')
    <h1>Alle spelers <span class="pull-right"><a href="{{ url('/players/create') }}" class="btn btn-primary">Speler toevoegen</a></span></h1>
    @if(count($players) > 0)

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                    <tr>
                        <td>{{ $player->name }}</td>
                        <td><a class="disabled btn btn-sm btn-warning" href="{{ url('/players/' . $player->id . '/edit') }}">Bewerken</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Geen spelers gevonden, voeg ze eerst toe!</p>
    @endif
@endsection
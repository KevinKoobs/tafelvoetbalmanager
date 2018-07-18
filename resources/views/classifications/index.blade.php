@extends('layouts.app')

@section('content')
    <h1>Alle uitslagen op een rij</h1>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>Naam</th>
                <th>Gespeeld</th>
                <th>Punten</th>
                <th>Gewonnen</th>
                <th>Gelijk</th>
                <th>Verloren</th>
                <th>Goals voor</th>
                <th>Goals tegen</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i < count($results); $i++)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $results[$i]->teamname }}</td>
                    <td>{{ $results[$i]->played }}</td>
                    <td>{{ $results[$i]->points }}</td>
                    <td>{{ $results[$i]->wins }}</td>
                    <td>{{ $results[$i]->draws }}</td>
                    <td>{{ $results[$i]->losses }}</td>
                    <td>{{ $results[$i]->goals_for }}</td>
                    <td>{{ $results[$i]->goals_against }}</td>
                </tr>
            @endfor
        </tbody>
    </table>
    <p class="alert alert-warning">Om in het overzicht te komen moet je minimaal 1 wedstrijd gespeeld hebben.</p>
@endsection
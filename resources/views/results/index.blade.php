@extends('layouts.app')

@section('content')
    <h1>Alle wedstrijden op een rij</h1>
    @if(count($results) > 0)
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Team 1</th>
                    <th>Team 2</th>
                    <th>Uitslag</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                    <tr>
                        <td>{{ $result->team1 }}</td>
                        <td>{{ $result->team2 }}</td>
                        <td>{{ $result->result }}</td>
                        <td>{{ $result->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Er zijn nog geen uitslagen bekend, voeg er eerst een paar toe!</p>
    @endif
@endsection
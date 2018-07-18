@extends('layouts.app')

@section('content')
    <h1>Nieuwe uitslag invoeren</h1>
    {{-- The !! are for displaying the HTML --}}
    {!! Form::open(['action' => 'ResultsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('team1', 'Team 1') }}
            {{ Form::select('team1', $players, null, ['class' => 'form-control']) }}
            {{ Form::label('team2', 'Team 2') }}
            {{ Form::select('team2', $players, null, ['class' => 'form-control']) }}
            {{ Form::label('result', 'Uitslag (altijd: team1-team2, zonder spaties)') }}
            {{ Form::text('result', '', ['class' => 'form-control', 'placeholder' => '0-0']) }}
        </div>
        {{ Form::submit('Invoeren', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection
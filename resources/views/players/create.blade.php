@extends('layouts.app')
@section('content')
    <h1>Nieuwe speler aanmaken</h1>
    {{-- The !! are for displaying the HTML --}}
    {!! Form::open(['action' => 'PlayersController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('name', 'Naam') }}
            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Vul een naam in']) }}
        </div>
        {{ Form::submit('Aanmaken', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection
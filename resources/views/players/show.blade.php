@extends('layouts.app')

@section('content')
    @if(count($player) > 0)
        <h1>{{ $player->name }}</h1>
        <small>{{ $player->created_at }}</small>
    @else
        <p class="alert alert-warning">Geen speler gevonden met dit ID. Ben je een hacker?</p>
    @endif
@endsection
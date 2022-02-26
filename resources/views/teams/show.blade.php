@extends('layouts.app')

@section('title', $team->name)

@section('content')
<div><h3>{{ $team->name }}</h3></div>
<div>{{ $team->email }}</div>
<div>{{ $team->address }}</div>
<div>{{ $team->city }}</div>

<br/>

<h5>Players: </h3>
<ul>
    @forelse ($team->players as $player)
    <li>
        <a href="/players/{{ $player->id}}">{{ $player->first_name }} {{ $player->last_name }}</a>
    </li>
    @empty
    <span>No players</span>
    @endforelse
</ul>
@endsection



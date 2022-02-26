@extends('layouts.app')
@section('title', 'Players')

@section('content')
<div><h3>{{ $player->first_name }} {{ $player->last_name }}</h3></div>
<div>{{ $player->email }}</div>
<br/>
<div><h5>Team:</h5>
    <li>
    <a href="/teams/{{ $player->team_id }}">{{ $player->team->name }}</a></div>
    </li>
    @endsection

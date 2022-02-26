@extends('layouts.app')

@section('title', 'NBA Teams')

@section('content')
<h3>Teams: </h3>
<div>
    @foreach($teams as $team)
    <div><a href="/teams/{{ $team->id }}">{{ $team->name }}</a></div>
    @endforeach
</div>
@endsection

@extends('layouts.app')

@section('content')

<section class="eventdeatil">
	<h1>{{ $event->name }}</h1>
	<img src="/photos/{{ $event->picture }}" class="img-responsive">
	<div class="countdown">Comienza en: <span data-countdown="{{ $event->startdate }}"></span></div>
	<a href="/users/{{ $event->user->id }}"><h4>{{ $event->user->name }}</h4></a>
	<div class="info">
		Fecha: {{  Carbon\Carbon::parse($event->startdate)->format('l d') }} <br />
		Hora: {{  Carbon\Carbon::parse($event->startdate)->format('H:i') }}
	</div>
	{!! nl2br($event->content) !!}
	<div class="rank">
		<h1 id="rank_number">{{ $event->rank }}</h1>
		<input type="hidden" id="event_id" value="{{ $event->id }}">
		<div id="ratings" data-rating="{{ $event->rank }}"></div>
	</div>
	@if (Auth::check() && Auth::user()->rol == 'Admin')
		<hr>
		<a href="/events/{{ $event->id }}/edit" class="btn btn-default">Editar</a>
	@endif
</section>


@endsection
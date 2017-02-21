@extends('layouts.app')

@section('content')
<div class="inheader bgcolor4">
	<h1><i class="fa fa-bell-o"></i> Alerta</h1>
</div>

@if(isset($event->id))
	<section class="alerta">
		<h2>Termina en: </h2>
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="text-align: center;">
				<div class="countdown"><span data-countdown="{{ $event->enddate }}"></span></div>
			</div>
		</div>

		<img src="/photos/{{ $event->picture }}" class="img-responsive">
		<h1>{{ $event->name }}</h1>
		<?php /*<a href="/users/{{ $event->user->id }}"><h4>{{ $event->user->name }}</h4></a> */ ?>
		<div class="info">
			<div class="row">
				<div class="col-sm-6">
					<ul class="rounded-list">
						<li>Lugar: {{ $event->place }}</li>
						<li>Grupo: {{ $event->team }}</li>
					</ul>
				</div>
				<div class="col-sm-6">
					<ul class="rounded-list">
						<li>Fecha: {{  Carbon\Carbon::parse($event->startdate)->format('l d') }}</li>
						<li>Hora: {{  Carbon\Carbon::parse($event->startdate)->format('H:i') }}</li>
					</ul>
				</div>
			</div>
		</div>
		{!! nl2br($event->content) !!}
		<?php /*<div class="rank">
			<h1 id="rank_number">{{ $event->rank }}</h1>
			<input type="hidden" id="event_id" value="{{ $event->id }}">
			<div id="ratings" data-rating="{{ $event->rank }}"></div>
		</div>*/ ?>
		@if (Auth::check() && Auth::user()->rol == 'Admin')
			<hr>
			<a href="/events/{{ $event->id }}/edit" class="btn btn-default">Editar</a>
		@endif
	</section>
@else
	<section class="alerta">
		<h2>No hay eventos en curso</h2>
	</section>
@endif


@endsection
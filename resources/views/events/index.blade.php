@extends('layouts.app')

@section('content')

<div class="inheader bgcolor2">
	@if (Auth::check() && Auth::user()->rol == 'Admin')
		<a href="#add_form" class="fancyb btn btn-default pull-right"><i class="fa fa-plus"></i> New</a>
	@endif
	<h1><i class="fa fa-calendar-check-o"></i> Agenda</h1>
</div>

<div class="list-group">
@foreach($all as $event)
	<a href="/events/{{ $event->id }}/edit" class="list-group-item">{{ $event->name }} <div class="badge">{{ $event->startdate }}</div></a>
@endforeach
</div>
@if (Auth::check() && Auth::user()->rol == 'Admin')
	<ul class="responsivetabs nav nav-tabs">
	  <li class="active"><a href="#feb22" data-toggle="tab">Feb 22</a></li>
	  <li><a href="#feb23" data-toggle="tab">Feb 23</a></li>
	  <li><a href="#feb24" data-toggle="tab">Feb 24</a></li>
	  <li><a href="#feb25" data-toggle="tab">Feb 25</a></li>
	  <li><a href="#feb26" data-toggle="tab">Feb 26</a></li>
	</ul>
@endif
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="feb22">
        @foreach ($eventsfeb22 as $event)
			<div class="col-md-6">
				<section class="event" style="background-image: url(/photos/{{ $event->picture }})">
					<a href="#" class="btn btn-info"><i class="fa fa-calendar-o"></i> Agendar.</a>
					@if (Auth::check() && Auth::user()->rol == 'Admin')
						<a href="/events/{{ $event->id }}/edit" class="btn btn-default pull-right"><i class="fa fa-edit"></i></a>
					@endif
					<?php /*<div class="countdown">Próximo evento: <span data-countdown="{{ $event->startdate }}"></span></div>*/ ?>
					<div class="caption">
						<h3>{{ $event->name }}</h3>
						<?php /*<a href="/users/{{ $event->user->id }}"><h4>{{ $event->user->name }}</h4></a>*/ ?>
						<div class="info">
							Lugar: {{  $event->place }}<br />
							Grupo: {{ $event->team }}<br />
							Fecha: {{  Carbon\Carbon::parse($event->startdate)->format('l d') }} <br />
							Hora: {{  Carbon\Carbon::parse($event->startdate)->format('H:i') }}
						</div>
					</div>
				</section>
			</div>
		@endforeach
    </div>
    <div class="tab-pane fade in" id="feb23">
        @foreach ($eventsfeb23 as $event)
			<div class="col-md-6">
				<section class="event" style="background-image: url(/photos/{{ $event->picture }})">
					<a href="#" class="btn btn-info"><i class="fa fa-calendar-o"></i> Agendar.</a>
					@if (Auth::check() && Auth::user()->rol == 'Admin')
						<a href="/events/{{ $event->id }}/edit" class="btn btn-default pull-right"><i class="fa fa-edit"></i></a>
					@endif
					<?php /*<div class="countdown">Próximo evento: <span data-countdown="{{ $event->startdate }}"></span></div>*/ ?>
					<div class="caption">
						<h3>{{ $event->name }}</h3>
						<?php /*<a href="/users/{{ $event->user->id }}"><h4>{{ $event->user->name }}</h4></a>*/ ?>
						<div class="info">
							Lugar: {{  $event->place }}<br />
							Grupo: {{ $event->team }}<br />
							Fecha: {{  Carbon\Carbon::parse($event->startdate)->format('l d') }} <br />
							Hora: {{  Carbon\Carbon::parse($event->startdate)->format('H:i') }}
						</div>
					</div>
				</section>
			</div>
		@endforeach
    </div>
    <div class="tab-pane fade in" id="feb24">
        @foreach ($eventsfeb24 as $event)
			<div class="col-md-6">
				<section class="event" style="background-image: url(/photos/{{ $event->picture }})">
					<a href="#" class="btn btn-info"><i class="fa fa-calendar-o"></i> Agendar.</a>
					@if (Auth::check() && Auth::user()->rol == 'Admin')
						<a href="/events/{{ $event->id }}/edit" class="btn btn-default pull-right"><i class="fa fa-edit"></i></a>
					@endif
					<?php /*<div class="countdown">Próximo evento: <span data-countdown="{{ $event->startdate }}"></span></div>*/ ?>
					<div class="caption">
						<h3>{{ $event->name }}</h3>
						<?php /*<a href="/users/{{ $event->user->id }}"><h4>{{ $event->user->name }}</h4></a>*/ ?>
						<div class="info">
							Lugar: {{  $event->place }}<br />
							Grupo: {{ $event->team }}<br />
							Fecha: {{  Carbon\Carbon::parse($event->startdate)->format('l d') }} <br />
							Hora: {{  Carbon\Carbon::parse($event->startdate)->format('H:i') }}
						</div>
					</div>
				</section>
			</div>
		@endforeach
    </div>
    <div class="tab-pane fade in" id="feb25">
        @foreach ($eventsfeb25 as $event)
			<div class="col-md-6">
				<section class="event" style="background-image: url(/photos/{{ $event->picture }})">
					<a href="#" class="btn btn-info"><i class="fa fa-calendar-o"></i> Agendar.</a>
					@if (Auth::check() && Auth::user()->rol == 'Admin')
						<a href="/events/{{ $event->id }}/edit" class="btn btn-default pull-right"><i class="fa fa-edit"></i></a>
					@endif
					<?php /*<div class="countdown">Próximo evento: <span data-countdown="{{ $event->startdate }}"></span></div>*/ ?>
					<div class="caption">
						<h3>{{ $event->name }}</h3>
						<?php /*<a href="/users/{{ $event->user->id }}"><h4>{{ $event->user->name }}</h4></a>*/ ?>
						<div class="info">
							Lugar: {{  $event->place }}<br />
							Grupo: {{ $event->team }}<br />
							Fecha: {{  Carbon\Carbon::parse($event->startdate)->format('l d') }} <br />
							Hora: {{  Carbon\Carbon::parse($event->startdate)->format('H:i') }}
						</div>
					</div>
				</section>
			</div>
		@endforeach
    </div>
</div>
{!! $all->render() !!}

<div class="add_form" id="add_form" style="display: none;">
	<form method="POST" action="{{ url('events') }}">
		<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
		<div class="form-group">
			<label for="name">Nombre</label>
			<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
		</div>
		{{ csrf_field() }}
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
</div>

@endsection
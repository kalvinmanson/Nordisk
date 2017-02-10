@extends('layouts.app')

@section('content')

<div class="inheader bgcolor2">
	@if (Auth::check() && Auth::user()->rol == 'Admin')
		<a href="#add_form" class="fancyb btn btn-default pull-right"><i class="fa fa-plus"></i> New</a>
	@endif
	<h1><i class="fa fa-calendar-check-o"></i> Agenda</h1>
</div>

@foreach ($events as $event)
	<section class="event" style="background-image: url(/photos/{{ $event->picture }})">
		<div class="countdown">Comienza en: <span data-countdown="{{ $event->startdate }}"></span></div>
		<div class="caption">
			<a href="/events/{{ $event->id }}"><h3>{{ $event->name }}</h3></a>
			<a href="/users/{{ $event->user->id }}"><h4>{{ $event->user->name }}</h4></a>
			<div class="info">
				Fecha: {{  Carbon\Carbon::parse($event->startdate)->format('l d') }} <br />
				Hora: {{  Carbon\Carbon::parse($event->startdate)->format('H:i') }}
			</div>
		</div>
	</section>

</tr>
@endforeach

{!! $events->render() !!}


<div class="add_form" id="add_form" style="display: none;">
	<form method="POST" action="{{ url('events') }}">
		<div class="form-group">
			<label for="user_id">Ponenete</label>
			<select name="user_id" id="user_id" class="form-control">
				@foreach($users as $user)
					<option value="{{ $user->id }}">{{ $user->name }}</option> 
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="name">Nombre</label>
			<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
		</div>
		<input type="hidden" name="category_id" value="1">
		{{ csrf_field() }}
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
</div>

@endsection
@foreach ($events as $event)
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
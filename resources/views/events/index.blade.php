@extends('layouts.app')

@section('content')

<div class="inheader bgcolor2">
	@if (Auth::check() && Auth::user()->rol == 'Admin')
		<a href="#add_form" class="fancyb btn btn-default pull-right"><i class="fa fa-plus"></i> New</a>
	@endif
	<h1><i class="fa fa-calendar-check-o"></i> Agenda</h1>
</div>

<div class="list-group">
@if (Auth::check() && Auth::user()->rol == 'Admin')
	@foreach($all as $event)
		<a href="/events/{{ $event->id }}/edit" class="list-group-item">{{ $event->name }} <div class="badge">{{ $event->startdate }}</div></a>
	@endforeach
	{!! $all->render() !!}
@endif
</div>

	<ul class="responsivetabs nav nav-tabs">
	  <li class="active"><a href="#feb22" data-toggle="tab">Feb 27</a></li>
	  <li><a href="#feb23" data-toggle="tab">Feb 28</a></li>
	  <li><a href="#feb24" data-toggle="tab">Mar 01</a></li>
	  <li><a href="#feb25" data-toggle="tab">Mar 02</a></li>
	  <li><a href="#feb26" data-toggle="tab">Mar 03</a></li>
	</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="feb22">
        @include('partials.listevents', array('events' => $eventsfeb27))
    </div>
    <div class="tab-pane fade in" id="feb23">
        @include('partials.listevents', array('events' => $eventsfeb28))
    </div>
    <div class="tab-pane fade in" id="feb24">
        @include('partials.listevents', array('events' => $eventsfeb01))
    </div>
    <div class="tab-pane fade in" id="feb25">
        @include('partials.listevents', array('events' => $eventsfeb02))
    </div>
    <div class="tab-pane fade in" id="feb26">
        @include('partials.listevents', array('events' => $eventsfeb03))
    </div>
</div>

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
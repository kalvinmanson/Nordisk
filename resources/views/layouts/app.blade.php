<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Drodmin - @yield('title')</title>
	<meta name="keywords" content="@yield('meta-keywords')">
    <meta name="description" content="@yield('meta-keywords')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/jquery.fancybox.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/animations.css') !!}
    {!! Html::style('css/bootstrap-datepicker.min.css') !!}
    {!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('css/ratings.css') !!}
    
    {!! Html::style('css/app.css') !!}
    @if (Auth::check() && Auth::user()->rol == 'Admin')
    	{!! Html::script('editor/ckeditor.js') !!}
    @endif
    
</head>
<body>
	<div class="wrap">
		<div class="column">
			<div class="menuprin">
				<div class="rowtable">
					<a href="/events" class="btn-01"><i class="fa fa-calendar-check-o"></i> Agenda</a>
					<a href="/posts" class="btn-02"><i class="fa fa-heart-o"></i> Momentos</a>
				</div>
				<div class="rowtable">
					<a href="#" class="btn-03"><i class="fa fa-bell-o"></i> Alerta</a>
					<a href="#" class="btn-04"><i class="fa fa-map-marker"></i> Mapa</a>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="incolumn">
				<div class="container-fluid">
					<div class="headcont">
						<a href="/" class="btn btn-lg bigicon pull-left"><i class="fa fa-home"></i></a>
						<a href="/users/{{ Auth::user()->id }}" class="btn btn-lg bigicon pull-right"><i class="fa fa-user"></i></a>
						<a href="/" class="btn btn-lg bigicon chat pull-right"><i class="fa fa-comment"></i></a>
						<img src="/img/brand.png" class="img-responsive">
					</div>
					{{-- @include('partials.menu', ['menu_id' => 1]) --}}
					@include('flash::message')
						@include('partials.errors')
					@yield('content')
				</div>
			</div>
		</div>
	</div>

	@if (Auth::check() && Auth::user()->rol == 'Admin')
		@include('partials.admin')
	@endif

	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/bootstrap3-typeahead.min.js') !!}
	{!! Html::script('js/css3-animate-it.js') !!}
	{!! Html::script('js/jquery.fancybox.pack.js') !!}
	{!! Html::script('js/moment-with-locales.min.js') !!}
	{!! Html::script('js/bootstrap-datepicker.min.js') !!}
	{!! Html::script('js/bootstrap-datetimepicker.min.js') !!}
	{!! Html::script('js/jquery.countdown.min.js') !!}
	{!! Html::script('js/jquery.star-rating-svg.min.js') !!}
	{!! Html::script('js/main.js') !!}
</body>
</html>
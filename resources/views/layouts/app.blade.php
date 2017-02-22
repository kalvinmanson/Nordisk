<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Liderando Juntos</title>
	<meta name="keywords" content="@yield('meta-keywords')">
    <meta name="description" content="@yield('meta-keywords')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">


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

<!-- menu movil -->
<nav class="navbar navbar-default visible-xs-block visible-sm-block">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <div class="username">
    	{{ Auth::user()->name }}
    	<span><a href="#" class="btn btn-danger btn-xs"><i class="fa fa-comments"></i></a></span>
    </div>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="/img/brand.png" width="40"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav centerlinks">
        <li><a href="/events" class="btn-01"><i class="fa fa-calendar-check-o"></i> Agenda</a></li>
		<li><a href="/posts" class="btn-02"><i class="fa fa-heart-o"></i> Momentos</a></li>
		<li><a href="#" class="next-btn btn-03"><i class="fa fa-bell-o"></i> Alerta</a></li>
		<li><a href="/map" class="btn-04"><i class="fa fa-map-marker"></i> Mapa</a></li>
		<li><a href="/users/{{ Auth::user()->id }}" class="btn-05"><i class="fa fa-user"></i> Mi perfil</a></li>
		<li><a href="/chats" class="btn-06"><i class="fa fa-comments-o"></i> Chat</a></li>
		<li><a href="/auth/logout" class="btn-07"><i class="fa fa-power-off"></i> Salir</a></li>
		@if (Auth::check() && Auth::user()->rol == 'Admin')
			<li><a href="{{ url('admin/pages') }}">Noticias</a></li>
		@endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- /.menu movil -->

	<div class="wrap">
		<div class="column col1">
			<div class="menuprin">
				<div class="rowtable">
					<a href="/events" class="btn-01"><i class="fa fa-calendar-check-o"></i> Agenda</a>
					<a href="/posts" class="btn-02"><i class="fa fa-heart-o"></i> Momentos</a>
				</div>
				<div class="rowtable">
					<a href="#" class="next-btn btn-03"><i class="fa fa-bell-o"></i> Alerta</a>
					<a href="/map" class="btn-04"><i class="fa fa-map-marker"></i> Mapa</a>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="incolumn">
				<div class="container-fluid">
					<div class="headcont visible-md-block visible-lg-block">
						<div class="row">
							<div class="col-xs-3">
								<a href="/" class="btn btn-lg bigicon pull-left"><i class="fa fa-home"></i></a>
							</div>
							<div class="col-xs-6">
								@if(Request::path() != "/")
									<img src="/img/brand.png" class="img-responsive">
								@endif
							</div>
							<div class="col-xs-3">
								<a href="#" class="btn-menu bigicon pull-right" data-toggle="dropdown"><span class="usernamebig">{{ Auth::user()->name }}</span> <i class="fa fa-bars"></i></a>
								<ul class="dropdown-menu dropwhite" aria-labelledby="dropdownMenu1">
									<li><a href="/users/{{ Auth::user()->id }}" class="btn-05"><i class="fa fa-user"></i> Mi perfil</a></li>
									<li><a href="/chats" class="btn-06"><i class="fa fa-comments-o"></i> Chat</a></li>
									<li><a href="/auth/logout" class="btn-07"><i class="fa fa-power-off"></i> Salir</a></li>
									@if (Auth::check() && Auth::user()->rol == 'Admin')
										<li><a href="{{ url('admin/pages') }}" class="btn-05">Noticias</a></li>
									@endif
								</ul>
								
							</div>
						</div>
					</div>
					{{-- @include('partials.menu', ['menu_id' => 1]) --}}
					@include('flash::message')
						@include('partials.errors')
					@yield('content')
				</div>
			</div>
		</div>
	</div>

	

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
	{!! Html::script('js/bootstrap-tabcollapse.js') !!}
	{!! Html::script('js/main.js') !!}
</body>
</html>
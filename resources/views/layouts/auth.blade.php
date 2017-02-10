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
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/animations.css') !!}
    {!! Html::style('css/app.css') !!}
    
</head>
<body>


	<div class="wrap">
		<div class="col-home">
			<div class="welcome">
				<img src="/img/logo-big.png" class="img-responsive">
			</div>
		</div>
		<div class="col-login">
			@yield('content')
		</div>
	</div>



	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/css3-animate-it.js') !!}
	{!! Html::script('js/main.js') !!}
</body>
</html>
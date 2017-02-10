@extends('layouts.app')

@section('title', 'Bienvenido')


@section('content')

<div class="home">
	<img src="/img/logo.png" class="img-responsive">
	<div class="row bgwave">
		<h1>EMPODERAMIENTO, SIMPLICIDAD Y AGILIDAD
	            <span>SON EL IMPULSO QUE NOS LLEVARÁ A</span>
	        SUPERAR LA COMPETENCIA.</h1>
	</div>
</div>
<div class="inheader bgcolor8">
	<h1><i class="fa fa-calendar-check-o"></i> Noticias</h1>
</div>
@foreach ($posts as $post)
	<section class="post">
		<p><img src="{{ $post->fields->where('name', 'header-image')->first()->content or 'no field' }}" class="img-responsive"></p>
		<h3>{{ $post->name }}</h3>
		<div class="info"></div>
		{!! $post->content !!}
	</section>
@endforeach

@endsection
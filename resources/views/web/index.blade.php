@extends('layouts.app')

@section('title', 'Bienvenido')


@section('content')

<div class="home">
	<img src="/img/logo.png" class="img-responsive">
	<div class="waves1">
	</div>
	<div class="row bgwave">
		<h1>EMPODERAMIENTO, SIMPLICIDAD Y AGILIDAD
	            <span>SON EL IMPULSO QUE NOS LLEVARÁ A</span>
	        <span class="big">SUPERAR LA COMPETENCIA.</span>
	    </h1>
	</div>
</div>
@foreach ($videos as $video)
	<video class="img-responsive" poster="/img/test02.jpg" controls>
		<source src="/video/videossac.webm" type="video/webm">
		<source src="/video/videossac.mp4" type="video/mp4">
		<source src="/video/videossac.ogg" type="video/ogg">
	</video>
@endforeach
{!! $videos->render() !!}
<hr>
<div class="inheader bgcolor8">
	<h1><i class="fa fa-calendar-check-o"></i> Noticias</h1>
</div>
@foreach ($posts as $post)
	<section class="post">
		<blockquote class="bordeverde">
			<div class="badge pull-right">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</div>
			<h3>{{ $post->name }}</h3>
			{!! $post->content !!}
		</blockquote>
	</section>
@endforeach

@endsection
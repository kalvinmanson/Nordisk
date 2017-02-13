@extends('layouts.app')

@section('content')

<div class="inheader bgcolor3">
	<h1><i class="fa fa-heart-o"></i> Momentos</h1>
</div>

<div class="add_form" id="add_form">
	<form method="POST" action="{{ url('posts') }}">
		<div class="form-group">
			<textarea name="name" id="name" class="form-control input-lg">{{ old('name') }}</textarea>
		</div>
		<input type="hidden" name="category_id" value="1">
		{{ csrf_field() }}
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
</div>

@foreach ($posts as $post)
	<section class="post">
		<div class="countdown">Comienza en: <span data-countdown="{{ $post->created_at }}"></span></div>
		<div class="caption">
			<a href="/events/{{ $post->id }}"><h3>{{ $post->name }}</h3></a>
			<a href="/users/{{ $post->user->id }}"><h4>{{ $post->user->name }}</h4></a>
			<div class="info">
				Fecha: {{  Carbon\Carbon::parse($post->created_at)->format('l d') }} <br />
				Hora: {{  Carbon\Carbon::parse($post->created_at)->format('H:i') }}
			</div>
		</div>
	</section>

</tr>
@endforeach




@endsection
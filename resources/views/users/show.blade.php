@extends('layouts.app')

@section('content')
<div class="inheader bgcolor10">
	<h1><i class="fa fa-user"></i> Perfil</h1>
</div>

<section class="userdetails">
	<div class="row">
		<div class="col-sm-4">
			@if($user->avatar)
				<img src="/photos/{{ $user->avatar }}" class="img-responsive img-circle">
			@else
				<img src="/img/user.png" class="img-responsive img-thumbnail">
			@endif
		</div>
		<div class="col-sm-8">
			<h1>{{ $user->name }}</h1>
			<h2>{{ $user->email }}</h2>
			<div class="well">
				<p>{!! nl2br(strip_tags($user->bio)) !!}</p>
			</div>
			@if (Auth::user()->id == $user->id)
				<a href="#editprofile" class="fancyb btn btn-primary"><i class="fa fa-edit"></i> Editar perfil</a> 
				<a href="#changepassword" class="fancyb btn btn-default"><i class="fa fa-edit"></i> Cambiar Contraseña</a> 
			@endif
		</div>
	</div>	
</section>
@foreach ($user->posts as $post)
	<section class="post">
		<blockquote>
			@if($post->picture)
				<img src="/photos/{{ $post->picture }}" class="img-responsive">
				<hr>
			@endif
			<p>{{ $post->name }}</p>

			<?php 
				$current_user = Auth::user();
		        $vote = App\Vote::where('post_id', $post->id)->where('user_id', $current_user->id)->first(); 
		    ?>
		    @if($current_user->id == $post->user->id || $current_user->rol == "Admin")
		    	{!! Form::open([
				    'method' => 'DELETE',
				    'route' => ['posts.destroy', $post->id]
				]) !!}
					<button type="submit" class="btn btn-default pull-right" style="margin-left:5px;"><i class="fa fa-trash"></i></button>
				{!! Form::close() !!}
		    @endif
			@if(isset($vote->id))
				<button class="btn btn-danger pull-right"><i class="fa fa-heart"></i> {{ $post->votes->count() }}</button>
			@else
				<button class="btn-vote btn btn-default pull-right" data-id="{{ $post->id }}"><i class="fa fa-heart-o"></i> <span id="votenumber-{{ $post->id }}">{{ $post->votes->count() }}</span></button>
			@endif
			
			@if($post->user->avatar)
				<img src="/photos/{{ $post->user->avatar }}" class="minipic">
			@else
				<img src="/img/user.png" class="minipic">
			@endif
			<a href="/users/{{ $post->user->id }}"><h4>{{ $post->user->name }}</h4></a>
			<div class="badge">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</div>
		</blockquote>
		
	</section>
@endforeach
@if (Auth::user()->id == $user->id)
	<form id="editprofile" method="POST" action="{{ url('/users/' . $user->id) }}" enctype="multipart/form-data" style="display: none;" autocomplete="off">			
		<div class="form-group">
			<label for="picture">Foto de perfil</label>
			<input type="file" name="picture" id="picture" class="form-control" accept="image/*" capture>
			{{ $user->avatar ? $user->avatar : "no file" }}
		</div>
		<div class="form-group">
			<label for="bio">Biografia</label>
			<textarea name="bio" id="bio" type="text" class="form-control" rows="7">{{ old('bio') ? old('bio') : $user->bio }}</textarea>
		</div>

		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<input type="hidden" name="_method" value="PUT" id="token">
		<button type="submit" class="btn btn-primary">Actualizar Perfil</button>
	</form>

	<form id="changepassword" method="POST" action="{{ url('/users/' . $user->id) }}" style="display: none;" autocomplete="off">			
		<div class="form-group">
			<label for="old_password">Contraseña Actual</label>
			<input type="password" name="old_password" id="old_password" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="password">Nueva Contraseña</label>
			<input type="password" name="password" id="password" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="password_confirmation">Nueva Contraseña (Confirmacion)</label>
			<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
		</div>

		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<input type="hidden" name="_method" value="PUT" id="token">
		<button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
	</form>
@endif
@endsection
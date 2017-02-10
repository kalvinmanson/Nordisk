@extends('layouts.app')

@section('content')
<section class="userdetails">
	<img src="/photos/{{ $user->avatar }}" class="avatar">
	<h1>{{ $user->name }}</h1>
	<h2>{{ $user->email }}</h2>
	<div class="well">
		<p>{!! nl2br(strip_tags($user->bio)) !!}</p>
	</div>
</section>
<hr>
@if (Auth::user()->id == $user->id)
	<form method="POST" action="{{ url('/users/' . $user->id) }}" enctype="multipart/form-data">			
		<div class="form-group">
			<label for="name">Nombre</label>
			<input name="name" type="text" class="form-control input-lg" value="{{ old('name') ? old('name') : $user->name }}">	
		</div>
		<div class="form-group">
			<label for="picture">Picture</label>
			<input type="file" name="picture" id="picture" class="form-control" accept="image/*" capture>
			{{ $user->avatar ? $user->avatar : "no file" }}
		</div>
		<div class="form-group">
			<label for="bio">Biografia</label>
			<textarea name="bio" id="bio" type="text" class="form-control">{{ old('bio') ? old('bio') : $user->bio }}</textarea>
		</div>

		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<input type="hidden" name="_method" value="PUT" id="token">
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
@endif
@endsection
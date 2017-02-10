@extends('layouts.app')

@section('content')
<ul class="users">
	@foreach ($users as $user)
		<li><a href="/users/{{ $user->id }}">{{ $user->name }}</a></li>
	@endforeach
</ul>
{!! $users->render() !!}

@endsection
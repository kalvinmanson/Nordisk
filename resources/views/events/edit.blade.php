@extends('layouts.app')

@section('content')

<h1>Edit Event</h1>
		<form method="POST" action="{{ url('/events/' . $event->id) }}" enctype="multipart/form-data">			
			<div class="form-group">
				<label for="user_id">Ponente</label>
				<select name="user_id" id="user_id" class="form-control">
					@foreach ($users as $user)
					<option value="{{ $user->id }}" {{ $user->id == $event->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="name">Nombre</label>
				<input name="name" type="text" class="form-control input-lg" value="{{ old('name') ? old('name') : $event->name }}">	
			</div>
			<div class="form-group">
				<label for="avatar">Picture</label>
				<input type="file" name="avatar" id="avatar" class="form-control" accept="image/*" capture>
				{{ $event->picture ? $event->picture : "no file" }}
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="startdate">Fecha de inicio</label>
						<input type="datetime" name="startdate" id="startdate" class="form-control datepicker" value="{{ old('startdate') ? old('startdate') : $event->startdate }}" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="enddate">Fecha de finalización</label>
						<input type="datetime" name="enddate" id="enddate" class="form-control datepicker" value="{{ old('enddate') ? old('enddate') : $event->enddate }}" required>
					</div>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="content" class="form-control" rows="6">{{ old('content') ? old('content') : $event->content }}</textarea>
			</div>

			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			<input type="hidden" name="_method" value="PUT" id="token">
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
{!! Form::open([
    'method' => 'DELETE',
    'route' => ['events.destroy', $event->id]
]) !!}
    {!! Form::submit('Delete this page?', ['class' => 'btn btn-danger pull-right']) !!}
{!! Form::close() !!}

@endsection
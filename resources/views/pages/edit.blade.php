@extends('layouts.app')

@section('content')

<h1>Edit Page</h1>
<div class="row">
	<div class="col-sm-8">
		<form method="POST" action="{{ url('admin/pages/' . $page->id) }}">

			@include('partials.errors')


			<div class="form-group">
				<label for="name">Nombre</label>
				<input name="name" type="text" class="form-control input-lg" value="{{ old('name') ? old('name') : $page->name }}">	
			</div>
			<div class="form-group">
				<input name="slug" type="hidden" class="form-control input-sm" value="{{ old('slug') ? old('slug') : $page->slug }}">	
			</div>
			<div class="form-group">
				<label for="category_id">Category</label>
				<select name="category_id" id="category_id" class="form-control">
					@foreach ($categories as $category)
					<option value="{{ $category->id }}" {{ $category->id == $page->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="content" class="form-control">{{ old('content') ? old('content') : $page->content }}</textarea>
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			<input type="hidden" name="_method" value="PUT" id="token">
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
	<div class="col-sm-4">
		@include('partials.pages_fields')
	</div>
</div>
{!! Form::open([
    'method' => 'DELETE',
    'route' => ['admin.pages.destroy', $page->id]
]) !!}
    {!! Form::submit('Delete this page?', ['class' => 'btn btn-danger pull-right']) !!}
{!! Form::close() !!}

{!! Form::open([
    'method' => 'POST',
    'route' => ['admin.pages.duplicate']
]) !!}
	<input type="hidden" name="id" value="{{ $page->id }}">
	{!! Form::submit('Duplicate', ['class' => 'btn btn-primary pull-right']) !!}
{!! Form::close() !!}
@endsection
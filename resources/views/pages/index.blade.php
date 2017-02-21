@extends('layouts.app')

@section('content')


<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<a class="navbar-brand" href="{{ route('admin.pages.index') }}">Noticias</a>
    <ul class="nav navbar-nav navbar-right">
	  <li><a href="#add_form" class="fancyb"><i class="fa fa-plus"></i> New</a></li>
	</ul>
  </div>
</nav>




<table class="table table-striped">
	<tr>
		<th>Nombre</th>
	</tr>
	@foreach ($pages as $page)
	<tr>
		<td>
			{{ $page->category ? $page->category->name : "None" }}: <a href="{{ route('admin.pages.edit', $page->id) }}">{{ $page->name }} </a>
		</td>
	</tr>
	@endforeach
</table>
{!! $pages->render() !!}


<div class="add_form" id="add_form" style="display: none;">
	<form method="POST" action="{{ url('admin/pages') }}">
		<div class="form-group">
			<label for="name">Nombre</label>
			<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
		</div>
		<div class="form-group">
			<input name="slug" type="hidden" class="form-control input-xd" value="{{ old('slug') ? old('slug') : rand(1000000,9999999) }}">	
		</div>
		<input type="hidden" name="category_id" value="1">
		{{ csrf_field() }}
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
</div>

@endsection
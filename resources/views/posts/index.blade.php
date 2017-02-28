@extends('layouts.app')

@section('content')

<div class="inheader bgcolor3">
	<h1><i class="fa fa-heart-o"></i> Momentos</h1>
</div>

<div class="add_form" id="add_form">
	<form method="POST" action="{{ url('posts') }}" enctype="multipart/form-data" id="new_post">
		<div class="form-group">
			<textarea name="name" id="name" class="form-control input-lg">{{ old('name') }}</textarea>
		</div>
		{{ csrf_field() }}
		<label for="avatar" class="file-lavel btn btn-default">
			<i class="fa fa-camera"></i> Agregar foto <span class="file-text"></span>
			<input type="file" name="avatar" id="avatar" accept="image/*" style="display: none;">
		</label>
		
		<button type="submit" class="btn btn-primary pull-right tr_autodestroy" data-form="new_post">Enviar</button>
		
	</form>
</div>
<?php $current_user = Auth::user(); ?>
@foreach ($posts as $post)
	<input type="hidden" value="{{ csrf_token() }}" id="token">
	<section class="post">
		<blockquote>
			<a name="post-{{ $post->id }}"></a>
			@if($post->picture)
				<img src="/photos/{{ $post->picture }}" class="img-responsive">
				@if($current_user->id == $post->user->id || $current_user->rol == "Admin")
					<div class="rotar">
						<a href="/posts/{{ $post->id}}/rotate/r" class="btn btn-default pull-right"><i class="fa fa-repeat"></i></a>
						<a href="/posts/{{ $post->id}}/rotate/l" class="btn btn-default"><i class="fa fa-undo"></i></a>
					</div>
				@endif
				<hr>
			@endif
			<p>{{ $post->name }}</p>
			<?php 
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
			<div class="clearfix"></div>

			<div class="comments">
				<div class="comments-heading"><strong>Comentarios</strong> <span class="badge">{{ $post->comments->count() }}</span></div>
				<div class="commentlist" id="commentlist-{{ $post->id }}">
					@foreach($post->comments as $comment)
						<div class="comment">
							<strong>{{ $comment->user->name }}</strong>
							<small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans() }}</small>
							<p>{{ $comment->name }}</p>
						</div>
					@endforeach
				</div>
				<a class="btnesconde btn btn-default btn-block btn-xs" data-id="{{ $post->id }}">Ver mas...</a>
				<h5>Agregar comentario</h5>
				<div class="addcomment">
					<div class="input-group">
				      <textarea id="name-{{ $post->id }}" class="form-control" placeholder="..." required></textarea>
				      <span class="input-group-btn">
				        <button type="submit" class="sendcomment btn btn-primary" type="button" data-id="{{ $post->id }}">Comentar</button>
				      </span>
				    </div><!-- /input-group -->
				</div>
			</div>
		</blockquote>
		
	</section>
@endforeach

{!! $posts->render() !!}




@endsection
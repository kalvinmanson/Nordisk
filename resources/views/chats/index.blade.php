@extends('layouts.app')

@section('content')

<div class="inheader bgcolor8">
	<h1><i class="fa fa-comments-o"></i> Chat</h1>
</div>

@if (Auth::check() && Auth::user()->rol == 'Admin')
	<div class="form-group">
		<label for="user_id">Chats recientes</label>
		<select id="cambiarusuarios" class="form-control">
				<option value="0">Seleccionar usuario</option>
			@foreach($chats as $chat)
				<option value="{{ $chat->user->id }}">{{ $chat->user->name }}</option> 
			@endforeach
		</select>
	</div>
@endif

<div class="chatbox" id="chatbox">

</div>
<div class="chat_form" id="chat_form">
	<input type="hidden" value="{{ csrf_token() }}" id="token">
	<input type="hidden" id="last" value=0>
	<input type="hidden" id="user_on" value="{{ Auth::user()->id }}">
	<div class="input-group">
      <input type="text" name="name" id="name" class="form-control" placeholder="¿Que quieres preguntar?..." autofocus>
      <span class="input-group-btn">
        <button id="sendchat" type="submit" class="btn btn-primary" type="button">Enviar</button>
      </span>
    </div><!-- /input-group -->
</div>



@endsection
@foreach ($current_user->chats as $chat)
	<section class="chat">
		<blockquote>
			@if($chat->user->avatar)
				<img src="/photos/{{ $chat->user->avatar }}" class="minipic">
			@else
				<img src="/img/user.png" class="minipic">
			@endif
			<p>{{ $chat->name }}</p>
			<div class="badge">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($chat->created_at))->diffForHumans() }}</div>
		</blockquote>
		
	</section>
@endforeach
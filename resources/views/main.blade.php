@extends('layouts.app')

@section('content')
<div class="container90">
	<div class="row">
		@foreach($posts as $post)
		<div class="col s12 m4">
			<div class="card blue-grey darken-1">
				<div class="card-content white-text">
					<p class="card-title">
						@auth
						@if($post->user_id != $user->id)
						<a data-postid="{{$post->id}}" class="bookmark"><i class="material-icons right
							@foreach($user->bookmarks as $bookmark)
								{{($bookmark->post_id == $post->id) ? 'white-text': 'black-text'}}
							@endforeach
							" id="bookmark{{$post->id}}">bookmark</i></a>
						@endif
						@endauth
						{{$post->title}}
					</p>
					<p>{{$post->post}}</p>
					<br>
					<p class="timestamp">{{$post->created_at->diffForHumans()}}</p>
				</div>
				<div class="card-action">
					<a><i class="material-icons black-text">thumb_up</i></a>
					<a href="#comments{{$post->id}}" class="modal-trigger right">Comments</a>
				</div>
			</div>
		</div>

		<div class="modal" id="comments{{$post->id}}">
			<div class="modal-content">
				<h5 class="center-align">{{$post->title}} comments</h5>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
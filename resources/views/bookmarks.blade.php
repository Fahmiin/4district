@extends('layouts.app')

@section('content')
<div class="container90">
	<h5 class="center-align white-text">Your bookmarked posts</h5>
	<hr>
	<div class="row">
	@foreach($bookmarks as $bookmark)
		<div class="col s12 m4" id="{{$bookmark->post->id}}">
			<div class="card blue-grey darken-1">
				<div class="card-content white-text">
					<p class="card-title">
						<a data-postid="{{$bookmark->post->id}}" class="bookmark"><i class="material-icons right" id="bookmark{{$bookmark->post->id}}">bookmark</i></a>
						{{$bookmark->post->title}}
					</p>
					<p>{{$bookmark->post->post}}</p>
					<br>
					<p class="timestamp">{{$bookmark->post->created_at->diffForHumans()}}</p>
				</div>
				<div class="card-action">
					<a data-postid="{{$bookmark->post->id}}" class="like"><i class="material-icons
						@foreach($bookmark->post->likes as $like)
							{{($like->user_id == $user->id) ? 'red-text' : 'black-text'}}
						@endforeach
						" id="like{{$bookmark->post->id}}">thumb_up</i>
						<span class="thumbs-up">{{$bookmark->post->likes->count()}}</span></a>
					<a href="#comments{{$bookmark->post->id}}" class="modal-trigger right">Comments</a>
				</div>
			</div>
		</div>

		<div class="modal" id="comments{{$bookmark->post->id}}">
			<div class="modal-content">
				<h5 class="center-align">{{$bookmark->post->title}} comments</h5>
			</div>
		</div>
	@endforeach
	</div>
</div>
@endsection

@section('js')
	<script src="{{asset('js/bookmarks.js')}}"></script>
@endsection
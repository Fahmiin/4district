@extends('layouts.app')

@section('content')
<div class="container90">
	<h5 class="center-align white-text">Your bookmarked posts</h5>
	<hr>
	<div class="row">
	@foreach($bookmarks->sortByDesc('id') as $bookmark)
		<div class="col s12 m4" id="{{$bookmark->post->id}}">
			<div class="card blue-grey darken-1">
				<div class="card-content white-text">
					<p class="card-title">
						<a data-postid="{{$bookmark->post->id}}" class="bookmark"><i class="material-icons right" id="bookmark{{$bookmark->post->id}}">bookmark</i></a>
						{{$bookmark->post->title}}
					</p>
					<p>{{$bookmark->post->post}}</p>
				</div>
				<div class="card-action">
					<a data-postid="{{$bookmark->post->id}}" class="like"><i class="material-icons
						@foreach($bookmark->post->likes as $like)
							{{($like->user_id == $user->id) ? 'red-text' : ''}}
						@endforeach
						" id="like{{$bookmark->post->id}}">thumb_up</i>
					<span class="thumbs-up">{{$bookmark->post->likes->count()}}</span></a>
					<p class="timestamp right">{{$bookmark->post->created_at->diffForHumans()}}</p>
				</div>
			</div>
		</div>
	@endforeach
	</div>
</div>
@endsection

@section('js')
	<script src="{{asset('js/bookmarks.js')}}"></script>
@endsection
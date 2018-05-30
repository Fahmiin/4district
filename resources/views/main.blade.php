@extends('layouts.app')

@section('content')
<div class="container90">
	<div class="row">
		@foreach($posts->sortByDesc('id') as $post)
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
				</div>
				<div class="card-action">
					<a data-postid="{{$post->id}}" class="like"><i class="material-icons
						@auth
						@foreach($post->likes as $like)
							{{($like->user_id == $user->id) ? 'red-text' : ''}}
						@endforeach
						@endauth
						" id="like{{$post->id}}">thumb_up</i>
					<span class="thumbs-up">{{$post->likes->count()}}</span></a>
					<p class="timestamp right">{{$post->created_at->diffForHumans()}}</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
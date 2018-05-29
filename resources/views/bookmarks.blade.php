@extends('layouts.app')

@section('content')
<div class="container90">
	<h5 class="center-align white-text">Your bookmarked posts</h5>
	<hr>
	<div class="row">
	@foreach($bookmarks as $bookmark)
		<div class="col s12 m4">
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
					<a><i class="material-icons black-text">thumb_up</i></a>
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
@extends('layouts.app')

@section('content')
<div class="container90">
	<div class="row">
		<div class="col s12 m4">
			@foreach($posts as $post)
				<div class="card blue-grey darken-1">
					<div class="card-content white-text">
						<span class="card-title">{{$post->title}}</span>
						<p>{{$post->post}}</p>
					</div>
					<div class="card-action">
						<a><i class="material-icons black-text">thumb_up</i></a>
						<a href="#comments{{$post->id}}" class="modal-trigger right">Comments</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>

<div class="modal" id="comments{{$post->id}}">
	<div class="modal-content">
		<h5 class="center-align">{{$post->title}} comments</h5>
	</div>
</div>
@endsection
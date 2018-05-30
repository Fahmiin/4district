@extends('layouts.app')

@section('content')
<div class="container90">
	<h5 class="white-text">Stories from our Admins</h5>
	<hr>
	@foreach($adminposts->sortByDesc('id') as $post)
	<div class="card">
		<div class="card-content">
			<div class="card-title">{{$post->title}}</div>
			<p>{!! $post->body !!}</p>
			<p class="timestamp right">{{$post->created_at->diffForHumans()}}</p>
			<br>
		</div>
		@auth
		@if($post->user_id == $user->id)
			<div class="card-action">
				<a href="#edit{{$post->id}}" class="btn red accent-2 white-text modal-trigger waves-effect waves-light"><i class="material-icons right">edit</i>Edit</a>
				<a href="#delete{{$post->id}}" class="btn red accent-2 white-text modal-trigger waves-effect waves-light"><i class="material-icons right">delete_forever</i>Delete</a>
			</div>
		@endif
		@endauth
	</div>

	<div class="modal" id="edit{{$post->id}}">
		<div class="modal-content">
			<form action="{{route('adminEdit', ['id' => $post->id])}}" method="POST">
				@csrf
				<div class="input-field">
					<input type="text" name="title" value="{{$post->title}}" required>
					<label for="title">Edit title</label>
				</div>
				<div class="input-field">
					<p>Edit post</p>
					<br>
					<textarea name="body" id="article-ckeditor2" required>{!! $post->body !!}</textarea>
				</div>
				<div class="input-field">
					<button class="btn red accent-2 white-text waves-effect waves-light"><i class="material-icons right">send</i>Submit</button>
				</div>
			</form>
		</div>
	</div>

	<div class="modal" id="delete{{$post->id}}">
		<div class="modal-content">
			<h5 class="center-align black-text">Are you sure you want to delete this reply?</h5>
			<br>
			<div class="row">
				<div class="col s6 m6 center-align">
					<form action="{{route('adminDelete', ['id' => $post->id])}}" method="POST">
						@csrf
						@method('DELETE')
						<button class="btn red accent-2 white-text">Delete</button>
					</form>
				</div>
				<div class="col s6 m6 center-align">
					<a href="/adminwrites" class="btn red accent-2 white-text waves-effect waves-light">Cancel</a>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection

@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('article-ckeditor2');
</script>
@endsection
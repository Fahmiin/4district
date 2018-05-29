@extends('layouts.app')

@section('content')
<div class="container90">
	<div class="row">
		<div class="col s12 m4">
			<div class="card">
				<div class="card-title center-align">Hi {{$user->name}}, how are you today?</div>
				<div class="card-content">
					<div class="input-field">
						<input type="text" name="answer">
					</div>
				</div>
			</div>
		</div>
		<div class="col s12 m8">
			<ul class="collection">
				<li class="collection-item"><i class="material-icons left">content_paste</i>Recent posts</li>
			</ul>
			<div class="row">
				@foreach($user->posts as $post)
				<div class="col s12 m6">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">{{$post->title}}</span>
							<p>{{$post->post}}</p>
						</div>
						<div class="card-action">
							<a><i class="material-icons black-text">thumb_up</i></a>
							<a href="#comments{{$post->id}}" class="modal-trigger right">Comments</a>
						</div>
						<div class="card-action">
							<a href="#editPost{{$post->id}}" class="btn red accent-2 white-text left modal-trigger"><i class="material-icons right">edit</i>Edit</a>
							<a href="#deletePost{{$post->id}}" class="btn red accent-2 white-text right modal-trigger"><i class="material-icons right">delete_forever</i>Delete</a>
						</div>
					</div>
				</div>

				<div class="modal" id="comments{{$post->id}}">
					<div class="modal-content">
						<h5 class="center-align">{{$post->title}} comments</h5>
					</div>
				</div>

				<div class="modal" id="editPost{{$post->id}}">
					<div class="modal-content">
						<h5 class="center-align">Edit post</h5>
						<br>
						<form action="{{route('editPost', ['id' => $post->id])}}" method="POST">
							@csrf
							<div class="input-field">
								<input type="text" name="title" required value="{{$post->title}}">
								<label for="title">Edit title</label>
							</div>
							<div class="input-field">
								<textarea name="post" class="materialize-textarea" id="textarea2">{{$post->post}}</textarea>
								<label for="textarea2">Edit Post</label>
							</div>
							<div class="input-field center-align">
								<button class="btn red accent-2 white-text">Submit</button>
							</div>
						</form>
					</div>
				</div>

				<div class="modal" id="deletePost{{$post->id}}">
					<div class="modal-content">
						<h5 class="center-align">Are you sure you want to delete this post?</h5>
						<br>
						<div class="row">
							<div class="col s6 m6 center-align">
								<form action="{{route('deletePost', ['id' => $post->id])}}" method="POST">
									@csrf
									@method('DELETE')
									<button class="btn red accent-2 white-text">Delete</button>
								</form>
							</div>
							<div class="col s6 m6 center-align">
								<a href="/profile" class="btn red accent-2 white-text">Cancel</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
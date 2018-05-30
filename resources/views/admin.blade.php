@extends('layouts.app')

@section('content')
<div class="container90">
	<div class="row">
		<div class="col s12 m8">
			<div class="card blue-grey darken-1">
				<div class="card-content white-text">
					<h5 class="rulesTitle">Admin Privileges</h5>
					<ol>
						<li>Be respectful</li>
						<li>Delete privileges for any posts</li>
						<li>Reply privileges for Ask admin page</li>
					</ol>
				</div>
			</div>
			<div class="card">
				<div class="card-content">
					<h5>Post to Admin Writes</h5>
					<br>
					<form action="{{route('adminWrites')}}" method="POST">
						@csrf
						<div class="input-field">
							<input type="text" name="title" required>
							<label for="title">Choose a post title</label>
						</div>
						<div class="input-field">
							<p>Write for our readers</p>
							<br>
							<textarea name="body" id="article-ckeditor" required></textarea>
						</div>
						<div class="input-field">
							<button class="btn red accent-2 white-text waves-effect waves-light"><i class="material-icons right">send</i>Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col s12 m4">
			<div class="card blue-grey darken-1">
				<div class="card-content white-text">
					<div class="card-title center-align">Welcome, {{$user->name}}</div>
				</div>
				<div class="card-action">
					<h6 class="center-align white-text">Admins of this site</h6>
					<br>
					<ul class="collection">
						@foreach($roles as $role)
						<li class="collection-item"><i class="material-icons left orange-text">accessibility</i>{{$role->user->name}}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('article-ckeditor');
</script>
@endsection
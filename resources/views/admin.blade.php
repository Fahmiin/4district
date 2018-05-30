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
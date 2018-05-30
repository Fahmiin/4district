@extends('layouts.app')

@section('content')
<div class="container90">
	<div class="row">
		@auth
		@admin
		@else
			<div class="col s12 m6">
		@endadmin
		@else
		<div class="col s12 m12">
		@endauth
			<h4 class="white-text center-align"><em><strong>Don't be shy about asking for help. <br><br> It doesn't mean you are weak, it only means you are wise!</strong></em></h4>
		</div>
		@auth
		@admin
		@else
			<div class="col s12 m6">
				<div class="card">
					<div class="card-content">
						<form action="{{route('createQuestion')}}" method="POST">
							@csrf
							<div class="input-field">
								<textarea name="question" class="materialize-textarea" id="textarea" required></textarea>
								<label for="question">Ask our admins</label>
							</div>
							<div class="input-field center-align">
								<button class="btn red accent-2 white-text waves-effect waves-light"><i class="material-icons right">send</i>Ask</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		@endadmin
		@endauth
	</div>
	<div class="row">
		@foreach($asks->sortByDesc('id') as $ask)
			<div class="col s12 m4">
				<div class="card blue-grey darken-1">
					<div class="card-content white-text">	
						<div class="row">
							<div class="col s2 m2">
								<p class="orange-text">{{$ask->user->name}} asked:</p>
							</div>
							<div class="col s10 m10">
								<p>{{$ask->question}}</p>
							</div>
						</div>
						@auth
						@if($ask->user_id == $user->id)
						<div>
							<a href="#editQuestion{{$ask->id}}" class="btn red accent-2 white-text left modal-trigger waves-effect waves-light"><i class="material-icons right">edit</i>Edit</a>
							<a href="#deleteQuestion{{$ask->id}}" class="btn red accent-2 white-text right modal-trigger waves-effect waves-light"><i class="material-icons right">delete_forever</i>Delete</a>
						</div>
						@endif
						@admin
						<div>
							<a class="btn red accent-2 white-text left waves-effect waves-light reply" data-askid="#reply{{$ask->id}}"><i class="material-icons right">reply</i>Reply</a>
							<a href="#deleteQuestion{{$ask->id}}" class="btn red accent-2 white-text right modal-trigger waves-effect waves-light"><i class="material-icons right">delete_forever</i>Delete</a>
						</div>
						@endadmin
						@endauth
					</div>
					<div class="card-action white-text">
						@foreach($ask->replies as $reply)
							@if($reply->ask_id == $ask->id)
							<div class="row marginBottom0">
								<div class="col s2 m2">
									<p class="orange-text">Admin replied:</p>
								</div>
								<div class="col s8 m8">
									<p>{{$reply->reply}}</p>
								</div>
								@auth
								@admin
								<div class="col s2 m2">
									<form action="{{route('deleteReply', ['id' => $reply->id])}}" method="POST">
										@csrf
										@method('DELETE')
										<div class="input-field">
											<a href="#deleteReply{{$reply->id}}" class="modal-trigger waves-effect waves-light"><i class="material-icons">close</i></a>
										</div>
									</form>
								</div>
								@endadmin
								@endauth
							</div>
							@endif

							<div class="modal" id="deleteReply{{$reply->id}}">
								<div class="modal-content">
									<h5 class="center-align black-text">Are you sure you want to delete this reply?</h5>
									<br>
									<div class="row">
										<div class="col s6 m6 center-align">
											<form action="{{route('deleteReply', ['id' => $reply->id])}}" method="POST">
												@csrf
												@method('DELETE')
												<button class="btn red accent-2 white-text">Delete</button>
											</form>
										</div>
										<div class="col s6 m6 center-align">
											<a href="/ask" class="btn red accent-2 white-text waves-effect waves-light">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="card-action hidden white-text" id="reply{{$ask->id}}">
						<form action="{{route('createReply', ['id' => $ask->id])}}" method="POST">
							@csrf
							<div class="row">
								<div class="col s10 m10">
									<div class="input-field">
										<textarea name="reply" class="materialize-textarea"></textarea>
										<label for="reply">You are replying to {{$ask->user->name}}</label>
									</div>
								</div>
								<div class="col s2 m2 center-align">
									<div class="input-field">
										<button class="btn red accent-2 white-text waves-effect waves-light"><i class="material-icons">send</i></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal" id="editQuestion{{$ask->id}}">
				<div class="modal-content">
					<h5 class="center-align">Edit question</h5>
					<br>
					<form action="{{route('editQuestion', ['id' => $ask->id])}}" method="POST">
						@csrf
						<div class="input-field">
							<textarea name="post" class="materialize-textarea" id="textarea{{$ask->id}}">{{$ask->question}}</textarea>
							<label for="textarea{{$ask->id}}">Edit Question</label>
						</div>
						<div class="input-field center-align">
							<button class="btn red accent-2 white-text waves-effect waves-light">Submit</button>
						</div>
					</form>
				</div>
			</div>

			<div class="modal" id="deleteQuestion{{$ask->id}}">
				<div class="modal-content">
					<h5 class="center-align">Are you sure you want to delete this question?</h5>
					<br>
					<div class="row">
						<div class="col s6 m6 center-align">
							<form action="{{route('deleteQuestion', ['id' => $ask->id])}}" method="POST">
								@csrf
								@method('DELETE')
								<button class="btn red accent-2 white-text">Delete</button>
							</form>
						</div>
						<div class="col s6 m6 center-align">
							<a href="/ask" class="btn red accent-2 white-text waves-effect waves-light">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection

@section('js')
	<script src="{{asset('js/ask.js')}}"></script>
@endsection
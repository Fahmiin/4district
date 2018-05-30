@extends('layouts.app')

@section('content')
<div class="container90">
	<div class="row">
		@auth
		<div class="col s12 m6">
		@else
		<div class="col s12 m12">
		@endauth
			<h4 class="white-text center-align"><em><strong>Don't be shy about asking for help. <br><br> It doesn't mean you are weak, it only means you are wise!</strong></em></h4>
		</div>
		@auth
		<div class="col s12 m6">
			<div class="card">
				<div class="card-content">
					<form action="{{route('createQuestion')}}" method="POST">
						@csrf
						<div class="input-field">
							<textarea name="question" class="materialize-textarea" id="textarea3" required></textarea>
							<label for="question">Ask our admins</label>
						</div>
						<div class="input-field center-align">
							<button class="btn red accent-2 white-text waves-effect waves-light"><i class="material-icons right">send</i>Ask</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		@endauth
	</div>
	<div class="row">
		@foreach($asks as $ask)
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
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
<nav class="teal darken-4">
    <div class="nav-wrapper container90">
    	<div class="row">
    		<div class="col s9 m3">
    			<a href="/home" class="brand-logo left"><span class="red-text text-accent-2">4District</span>Connect</a>
    			<a href="/ask" class="waves-effect waves-light right"><i class="material-icons">chat_bubble</i></a></li>
    		</div>
	        <div class="col s3 hide-on-large-only">
	        	@auth
	            <a class="dropdown-trigger right hide-on-large-only waves-effect waves-light" data-target="menuDropdown">{{$user->name}}</a>
	            @else
	            <a class="dropdown-trigger right hide-on-large-only waves-effect waves-light" data-target="dropdown"><i class="material-icons">menu</i></a>
	            @endauth
	        </div>
	        <div class="col m9">
	        	<ul class="right hide-on-med-and-down">
	            	@auth
	            	<li><a href="/profile" class="waves-effect waves-light"><i class="material-icons right">account_circle</i>{{$user->name}}</a></li>
	            	<li><a href="#post" class="modal-trigger waves-effect waves-light"><i class="material-icons">create</i></a></li>
	            	<li><a href="/bookmarks" class="waves-effect waves-light"><i class="material-icons">collections_bookmark</i></a></li>
	            	@admin
						<li><a href="/admin" class="waves-effect waves-light"><i class="material-icons orange-text">accessibility</i></a></li>
					@endadmin
	            	<li><a href="#logout" class="modal-trigger waves-effect waves-light">Logout</a></li>
	            	@else
	                <li><a class="modal-trigger waves-effect waves-light" href="#login">Login</a></li>
	                <li><a class="modal-trigger waves-effect waves-light" href="#signup">Signup</a></li>
	                @endauth
	            </ul>
	        </div>
	    </div>
    </div>
</nav>

 <ul id="dropdown" class="dropdown-content">
	@auth
	<li><a class="modal-trigger waves-effect waves-light" href="#logout">Logout</a></li>
	@else
    <li><a class="modal-trigger waves-effect waves-light" href="#login">Login</a></li>
    <li><a class="modal-trigger waves-effect waves-light" href="#signup">Signup</a></li>
    @endauth
</ul>

<ul id='menuDropdown' class='dropdown-content'>
	<li><a href="/profile" class="fsz12 waves-effect waves-light">My profile</a></li>
	<li><a href="/bookmarks" class="fsz12 waves-effect waves-light">My favourites</a></li>
    <li><a class="modal-trigger fsz12 waves-effect waves-light" href="#logout">Logout</a></li>
</ul>

<div class="modal" id="signup">
	<div class="modal-content">
		<h4 class="center-align">Signup</h4>
		<form action="{{route('register')}}" method="POST">
			@csrf
			<div class="input-field">
				<input type="text" name="name" value="{{Request::old('name')}}" required>
				<label for="name">Username</label>
			</div>
			<div class="input-field">
				<input type="email" name="email" value="{{Request::old('email')}}" required>
				<label for="email">Email</label>
			</div>
			<div class="input-field">
				<input type="password" name="password" required>
				<label for="password">Password</label>
			</div>
			<div class="input-field center-align">
				<button type="submit" class="btn red accent-2 white-text waves-effect waves-light">Submit</button>
			</div>
		</form>
	</div>
</div>

<div class="modal" id="login">
	<div class="modal-content">
		<h4 class="center-align">Login</h4>
		<form action="{{route('login')}}" method="POST">
			@csrf
			<div class="input-field">
				<input type="text" name="name" value="{{Request::old('name')}}" required>
				<label for="name">Username</label>
			</div>
			<div class="input-field">
				<input type="password" name="password" required>
				<label for="password">Password</label>
			</div>
			<div class="input-field">
				<p>
					<label>
						<input type="checkbox" name="remember">
						<span>Remember me</span>
					</label>
				</p>
			</div>
			<div class="input-field center-align">
				<button class="btn red accent-2 white-text waves-effect waves-light">Submit</button>
			</div>
		</form>
	</div>
</div>

<div class="modal" id="logout">
	<div class="modal-content">
		<h4 class="center-align">Logout</h4>
		<br>
		<h6 class="center-align">Are you sure? We're sad to see you go</h6>
		<br>
		<form action="{{route('logout')}}" method="POST">
			@csrf
			<div class="row">
				<div class="col s6 m6 center-align">
					<button type="submit" class="btn red accent-2 white-text waves-effect waves-light">Logout</button>
				</div>
				<div class="col s6 m6 center-align">
					<a href="/home" class="btn red accent-2 white-text waves-effect waves-light">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal" id="post">
	<div class="modal-content">
		<h5 class="center-align">Write a new post</h5>
		<form action="{{route('createPost')}}" method="POST">
			@csrf
			<div class="input-field">
				<input type="text" name="title" required>
				<label for="title">Title</label>
			</div>
			<div class="input-field">
				<textarea name="post" class="materialize-textarea" id="textarea1"></textarea>
				<label for="textarea1">What's on your mind?</label>
			</div>
			<div class="input-field center-align">
				<button class="btn red accent-2 white-text waves-effect waves-light"><i class="material-icons right">send</i>Submit</button>
			</div>
		</form>
	</div>
</div>
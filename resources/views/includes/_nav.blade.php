<nav class="teal darken-4">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/home" class="brand-logo left"><span class="red-text text-accent-2">4District</span>Connect</a>
            <a class="dropdown-trigger right hide-on-large-only" href="#" data-target="dropdown"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
            	@auth
            	<a class="dropdown-trigger" data-target="menu">Welcome, {{$user->name}}</a>
            	@else
                <li><a class="modal-trigger" href="#login">Login</a></li>
                <li><a class="modal-trigger" href="#signup">Signup</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

 <ul id="dropdown" class="dropdown-content">
	@auth
	<li><a class="modal-trigger" href="#logout">Logout</a></li>
	@else
    <li><a class="modal-trigger" href="#login">Login</a></li>
    <li><a class="modal-trigger" href="#signup">Signup</a></li>
    @endauth
</ul>

<ul id='menu' class='dropdown-content'>
    <li><a class="modal-trigger" href="#logout">Logout</a></li>
</ul>

<div class="modal" id="signup">
	<div class="modal-content">
		<h5 class="center-align">Signup</h5>
		<form action="{{route('register')}}" method="POST">
			@csrf
			<div class="input-field">
				<input type="text" name="name" value="{{Request::old('name')}}" required>
				<label for="name">Username</label>
			</div>
			<div class="input-field">
				<input type="email" name="email" required>
				<label for="email">Email</label>
			</div>
			<div class="input-field">
				<input type="password" name="password" required>
				<label for="password">Password</label>
			</div>
			<div class="input-field center-align">
				<button type="submit" class="btn red accent-2 white-text">Submit</button>
			</div>
		</form>
	</div>
</div>

<div class="modal" id="login">
	<div class="modal-content">
		<h5 class="center-align">Login</h5>
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
				<button class="btn red accent-2 white-text">Submit</button>
			</div>
		</form>
	</div>
</div>

<div class="modal" id="logout">
	<div class="modal-content">
		<h5 class="center-align">Logout</h5>
		<form action="{{route('logout')}}" method="POST">
			@csrf
			<div class="row">
				<div class="col s6 m6 center-align">
					<button type="submit" class="btn red accent-2 white-text">Logout</button>
				</div>
				<div class="col s6 m6 center-align">
					<a href="/home" class="btn red accent-2 white-text">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</div>
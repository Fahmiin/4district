<nav class="teal darken-4">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo left"><span class="red-text text-accent-2">4District</span>Connect</a>
            <a class="dropdown-trigger right hide-on-large-only" href="#" data-target="dropdown"><i class="material-icons">menu</i></a>
            <ul id="dropdown" class="dropdown-content">
			    <li><a class="modal-trigger" href="#login">Login</a></li>
			    <li><a class="modal-trigger" href="#signup">Signup</a></li>
			</ul>
            <ul class="right hide-on-med-and-down">
                <li><a class="modal-trigger" href="#login">Login</a></li>
                <li><a class="modal-trigger" href="#signup">Signup</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal" id="signup">
	<div class="modal-content">
		<h5 class="center-align">Signup</h5>
		<form action="{{route('register')}}" method="POST">
			@csrf
			<div class="input-field">
				<input type="text" name="username" required>
				<label for="username">Username</label>
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
				<input type="text" name="username" required>
				<label for="username">Username</label>
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
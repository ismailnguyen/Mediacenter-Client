<div class="inputs">
	<h5>Sign in to continue to your account.</h5>
	
	<form action="./?controller=accounts&action=login" method="POST">

		<div class="container">
			<input type="email" name="email" value='' maxlength="50" size="30" placeholder="E-mail"/><br/>
		</div>
		
		<div class="container">
			<input type="password" name="password" maxlength="50" size="30" placeholder="Password" /><br/>
		</div>
		
		<div class="container">
			<input type="submit" name="login" value="Login" />
		</div>

	</form>

	<div id="bottom">
	  <a href="?controller=accounts&action=register">Create an account</a>
	</div>
</div>
<div class="inputs">
	<h5>Create a new account.</h5>
	
	<form action="" method="post">

		<div class="container">
			<input type="email" name="email" value='' maxlength="50" size="30" placeholder="E-mail"/><br/>
		</div>
		
		<div class="container">
			<input type="password" name="password" maxlength="50" size="30" placeholder="Password" /><br/>
		</div>
		
		<div class="container">
			<input type="password" name="password2" maxlength="50" size="30" placeholder="Re-type password" /><br/>
		</div>
		
		<div class="container">
			<input type="submit" name="Submit" value="Register" />
		</div>

	</form>

	<div id="bottom">
	  <a href="?controller=accounts&action=login">Already an account</a>
	  <a class="right_a" href="?controller=accounts&action=forgot">Forgot password</a>
	</div>
</div>
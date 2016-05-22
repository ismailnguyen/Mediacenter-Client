<div class="inputs">
	<h5>Create a new account.</h5>
	
	<form action="./?controller=accounts&action=register" method="POST">

		<div class="container">
			<input type="text" name="pseudo" value='' maxlength="50" size="30" placeholder="Pseudo"/><br/>
		</div>
		
		<div class="container">
			<input type="email" name="email" value='' maxlength="50" size="30" placeholder="E-mail"/><br/>
		</div>
		
		<div class="container">
			<input type="password" name="password" maxlength="50" size="30" placeholder="Password" /><br/>
		</div>
		
		<div class="container">
			<input type="submit" name="register" value="Register" />
		</div>

	</form>

	<div id="bottom">
	  <a href="?controller=accounts&action=login">Already an account ?</a>
	</div>
</div>
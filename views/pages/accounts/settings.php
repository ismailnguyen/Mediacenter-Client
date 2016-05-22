<div class="main-board">
	<h3>Settings</h3>
	
	<br /><br />
	
	<div class="row">
		<form action="./?controller=accounts&action=settings" method="POST">
			<div class="col-sm-3">Pseudo</div>
			<div class="col-sm-3"><input type="text" name="pseudo" value="<?php echo $account->pseudo; ?>" placeholder="Pseudo"></div>
			
			<div class="col-sm-3">Password</div>
			<div class="col-sm-3"><input type="password" name="password" value="<?php echo $account->password; ?>" placeholder="Password"></div>
			
			<div class="col-sm-3">E-mail</div>
			<div class="col-sm-3"><input type="text" name="email" value="<?php echo $account->email; ?>" placeholder="E-mail" disabled></div>
			
			
			<div class="col-sm-3">Private library</div>
			<div class="col-sm-3"><input type="checkbox" name="privacy" <?php echo $account->privacy ? 'checked': ''; ?>></div>
			
			<div class="col-sm-3"></div>
			<div class="col-sm-3"><button type="submit" name="update">Update</button></div>
		</form>
	</div>
	<div class="clearfix"></div>
</div>

<div class="main-board">
	<h3>Delete my account</h3>
	
	<br /><br />
	
	<div class="row">
		<form action="./?controller=accounts&action=delete" method="POST">
			<div class="col-sm-3">
				<button type="submit" name="delete">Delete</button>
			</div>
		</form>
	</div>
	<div class="clearfix"></div>
</div>
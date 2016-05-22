<div class="main-board">
	<h3>Public libraries</h3>
	
	<br /><br />
	
	<div class="row">
		<section class="cd-section">
			<?php
				foreach($users as $user) {
			?>				
				<a href="./?controller=accounts&action=library&u=<?php echo $user->uuid; ?>"><?php echo $user->pseudo; ?></a> <br />
			<?php
				}
			?>
		</section>
	</div>
	<div class="clearfix"></div>
</div>
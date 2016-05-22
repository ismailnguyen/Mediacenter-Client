<div class="main-board">
<?php
	if ($account != null) {
?>
	<h3><?php echo $account->pseudo; ?>'s public library</h3>
	<div class="clearfix"></div>
	
	<br /><br />
	
	<h2>Recents films</h2>
	
	<div class="row">
		<section class="cd-section">
			<?php
				foreach($films as $film) {
			?>				
				<a href="./?controller=films&u=<?php echo $account->uuid; ?>#film_<?php echo str_replace(' ', '', $film->title); ?>"><?php echo $film->title; ?></a> <br />
			<?php
				}
			?>
			
			<br />
			<a href="./?controller=films&u=<?php echo $account->uuid; ?>">+ See all films</a>
			<br />
		</section>
	</div>
	<div class="clearfix"></div>
	
	<br /><br />
	
	<h2>Recents musics</h2>
	
	<div class="row">
		<section class="cd-section">
			<?php
				foreach($musics as $music) {
			?>				
				<a href="./?controller=musics&u=<?php echo $account->uuid; ?>#album_<?php echo str_replace(' ', '', $music->album); ?>"><?php echo $music->title; ?></a> <br />
			<?php
				}
			?>
			
			<br />
			<a href="./?controller=musics&u=<?php echo $account->uuid; ?>">+ See all films</a>
			<br />
		</section>
	</div>
	<div class="clearfix"></div>
	
	<br /><br />
	
	<h2>Recents books</h2>
	
	<div class="row">
		<section class="cd-section">
			<?php
				foreach($books as $book) {
			?>				
				<a href="./?controller=books&u=<?php echo $account->uuid; ?>#book_<?php echo str_replace(' ', '', $book->title); ?>"><?php echo $book->title; ?></a> <br />
			<?php
				}
			?>
			
			<br />
			<a href="./?controller=books&u=<?php echo $account->uuid; ?>">+ See all films</a>
			<br />
		</section>
	</div>
	<div class="clearfix"></div>
	
<?php
	} else {
?>
	<h3>Library not found</h3>
<?php
	}
?>
</div>
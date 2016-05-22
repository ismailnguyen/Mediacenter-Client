<div class="main-board">
	<h3>Hi <?php echo $account->pseudo; ?> !</h3>
	<div class="clearfix"></div>
	
	<br /><br />
	
	<h2>Recents films</h2>
	
	<div class="row">
		<section class="cd-section">
			<?php
				foreach($films as $film) {
			?>				
				<a href="./?controller=films#film_<?php echo str_replace(' ', '', $film->title); ?>"><?php echo $film->title; ?></a> <br />
			<?php
				}
			?>
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
				<a href="./?controller=musics#album_<?php echo str_replace(' ', '', $music->album); ?>"><?php echo $music->title; ?></a> <br />
			<?php
				}
			?>
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
				<a href="./?controller=books#book_<?php echo str_replace(' ', '', $book->title); ?>"><?php echo $book->title; ?></a> <br />
			<?php
				}
			?>
		</section>
	</div>
	<div class="clearfix"></div>
</div>
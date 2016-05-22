<?php
	if (!isset($_GET['u'])) {
?>
	<div class="row main-board new-item" style="display:none;">
		<form action="./?controller=films&action=create" method="POST">
			<div class="col-sm-3">Title</div>
			<div class="col-sm-3"><input type="text" name="title" placeholder="Title" maxlength="30" required></div>
			
			<div class="col-sm-3">Director</div>
			<div class="col-sm-3"><input type="text" name="director" placeholder="Director" maxlength="30" required></div>
			
			<div class="col-sm-3">Description</div>
			<div class="col-sm-3"><input type="text" name="description" placeholder="Description" maxlength="100" required></div>
			
			<div class="col-sm-3">Date of publication</div>
			<div class="col-sm-3"><input type="text" name="publication" placeholder="Date of publication" maxlength="30"></div>
			
			<div class="col-sm-3">Image</div>
			<div class="col-sm-3"><input type="text" name="image" placeholder="Image URL" maxlength="100"></div>
			
			<div class="col-sm-3">URL</div>
			<div class="col-sm-3"><input type="text" name="path" placeholder="URL" maxlength="100" required></div>
			
			<div class="col-sm-3"></div>
			<div class="col-sm-3"><button type="submit" name="create">Add</button></div>	
			
		</form>
	</div>
<?php
	}
?>	

<div class="row">
<?php
	if ($films == null || empty(array_filter($films))) {
		echo '<div class="main-board"><h1>Nothing here</h1></div>';
	} else {
?>
	<section class="cd-section">

		<div id="grid" data-columns>
			<?php
				foreach($films as $key => $film) {
					if ($film->image == null || empty($film->image))
						$film->image = './resources/images/film-cover.jpg';
			?>
			
			<div class="grid-element" data-type="modal-trigger" id="<?php echo $key; ?>">
				<a href="#">
					 <img src="<?php echo $film->image; ?>" class="thumbnail img-responsive">
				</a>
				
				<div class="cd-modal-action">
					<a href="#0" class="btn"><?php echo $film->title; ?></a>
					<span class="cd-modal-bg"></span>  
					
					<?php
						if (!isset($_GET['u'])) {
							echo '<div align="center">';
								echo '<button class="button-hover button-delete" name="'.$film->uuid.'" style="display: none;"><p> Remove </p></button>';
							echo '</div>';
						} else {
							echo '<div align="center">';
								echo '<button class="button-hover button-add" name="'.$film->uuid.'" style="display: none;"><p> Fork </p></button>';
							echo '</div>';
						}
					?>
				</div>

			</div>

			<?php
				}
			?>
			
		</div>
		
		<?php require_once 'views/pages/films/modal.php'; ?>

		<a href="#0" class="cd-modal-close">Close</a>
	</section>
<?php
	}
?>
</div>
 
<script>
	var playlist;
	
	$(document).ready(function () {
		
		$(".thumbnail").error(function(){
			$(this).attr('src', './resources/images/film-cover.jpg');
		});
		
		playlist = new jPlayerPlaylist({
			jPlayer: "#jquery_jplayer",
			cssSelectorAncestor: "#jp_container"
			},
			[],
			{
			ready: function(){
				$(this).bind($.jPlayer.event.click, function(){
					var isPaused = $(this).data().jPlayer.status.paused;
					if(isPaused){ $(this).jPlayer("play"); }
					else{ $(this).jPlayer("pause"); }
				});
				
				$(this).dblclick(function(){
					if($(".jp-video-full").length > 0){ $(".jp-restore-screen").click(); }
					else{ $(".jp-full-screen").click(); }
				});
			},
			swfPath:	"assets/js/lib-jplayer/Jplayer.swf",
			supplied:	"mp4, webmv, m4v",
			size:{
				width:		"100%",
				height:		"auto",
				cssClass:	"jp-video-360p"
			}
		});
				
		$(document.documentElement).keydown(function(event) {
			if(event.which === 32) {
				if($(".jp-jplayer").data("jPlayer").status.paused){
				   $(".jp-jplayer").jPlayer("play");
				}else{
				   $(".jp-jplayer").jPlayer("pause");
				}
				event.preventDefault();
			}
			
			if(event.which === 27){
				$(".jp-video-full .jp-restore-screen").click();
				event.preventDefault();
			}
		});
	});

	// Launch modal popup on click event
	// Retrieve musics of selected album with ajax callback
	function updateModal(id) {
		$.get('?', { controller: 'films', action: 'watch', json: '', film: id <?php echo isset($_GET['u']) ? ", user: '".$_GET['u']."'" : ''; ?> })
		.done(function (film) {
			
			$('#film_title').text(film.title);
			$('#film_director').text(film.director);
			$('#film_description').text(film.description);
			$('#film_publication').text(film.publication);
			$('#film_image').text(film.image);
							
			playlist.setPlaylist([
				{
					title: film.title,
					artist: film.director,
					free: true,
					mp4: film.path,
					m4v: film.path,
					webmv: film.path,
					poster: film.image
				}
			]);
	
		}, 'json');
	}
</script>
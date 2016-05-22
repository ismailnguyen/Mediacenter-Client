<?php
	if (!isset($_GET['u'])) {
?>
	<div class="row main-board new-item" style="display:none;">
		<form action="./?controller=musics&action=create" method="POST">
			<div class="col-sm-3">Title</div>
			<div class="col-sm-3"><input type="text" name="title" placeholder="Title" maxlength="30" required></div>
			
			<div class="col-sm-3">Author</div>
			<div class="col-sm-3"><input type="text" name="author" placeholder="Author" maxlength="30" required></div>
			
			<div class="col-sm-3">Album</div>
			<div class="col-sm-3"><input type="text" name="album" placeholder="Album" maxlength="30" required></div>
			
			<div class="col-sm-3">Date of publication</div>
			<div class="col-sm-3"><input type="text" name="publication" placeholder="Date of publication" maxlength="30"></div>
			
			<div class="col-sm-3">Image</div>
			<div class="col-sm-3"><input type="text" name="image" placeholder="Image URL" maxlength="100"></div>
			
			<div class="col-sm-3">URL</div>
			<div class="col-sm-3"><input type="text" name="path" placeholder="URL" maxlength="100" required></div>
			
			<div class="col-sm-3"></div>
			<div class="col-sm-3"></div>
			<div class="col-sm-3"></div>
			<div class="col-sm-3"><button type="submit" name="create">Add</button></div>	
			
		</form>
	</div>
<?php
	}
?>	

<div class="row">
<?php
	if ($albums == null || empty(array_filter($albums))) {
		echo '<div class="main-board"><h1>Nothing here</h1></div>';
	} else {
?>
	<section class="cd-section">

		<div id="grid" data-columns>
		
			<?php
				foreach($albums as $key => $album) {
					if ($album[0]->image == null || empty($album[0]->image))
						$album[0]->image = './resources/images/album-cover.jpg';
			?>
			
			<div class="grid-element" data-type="modal-trigger" id="<?php echo $key; ?>">
				<a href="#">
					 <img id="album_<?php echo str_replace(' ', '', $album[0]->album); ?>" src="<?php echo $album[0]->image; ?>" class="thumbnail img-responsive">
				</a>
				
				<div class="cd-modal-action">
					<a href="#0" class="btn"><?php echo $album[0]->album; ?></a>
					<span class="cd-modal-bg"></span>
					
					<?php
						if (isset($_GET['u'])) {
							echo '<div align="center">';
								echo '<button class="button-hover button-add" name="'.$album[0]->album.'" style="display: none;"><p> Fork </p></button>';
							echo '</div>';
						}
					?>
				</div>

			</div>

			<?php
				}
			?>
			
		</div>
		
		<?php require_once 'views/pages/musics/modal.php'; ?>

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
			$(this).attr('src', './resources/images/album-cover.jpg');
		});
		
		playlist = new jPlayerPlaylist({
				jPlayer: "#jquery_jplayer",
				cssSelectorAncestor: "#jp_container"
			},
			[],
			{
				swfPath: "../../dist/jplayer",
				supplied: "oga, mp3",
				wmode: "window",
				useStateClassSkin: true,
				autoBlur: false,
				smoothPlayBar: true,
				keyEnabled: true
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
		});
	});
	
	// Launch modal popup on click event
	// Retrieve musics of selected album with ajax callback
	function updateModal(id) {
		$.get("?", { controller: "musics", action: "listen", json: "", album: id <?php echo isset($_GET['u']) ? ", user: '".$_GET['u']."'" : ''; ?> })
		.done(function (album) {
			
			$("#album_title").text(album[0].album);
			$("#album_author").text(album[0].author);
			$("#album_publication").text(album[0].publication);
			$("#album_image").text(album[0].image);
			$("#album_genre").text(album[0].genre);
			
			var musics = [];
			
			$.each(album, function (index, music) {
				musics.push({ 
					title: music.title,
					mp3: music.path,
					poster: music.image
				});
			});
			
			playlist.setPlaylist(musics);
	
		}, "json");
	}
</script>  
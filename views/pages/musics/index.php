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
			?>
			
			<div class="grid-element" data-type="modal-trigger" id="<?php echo $key; ?>">
				<a href="#">
					 <img src="<?php echo $album[0]->image; ?>" class="thumbnail img-responsive">
				</a>
				
				<div class="cd-modal-action">
					<a href="#0" class="btn"><?php echo $album[0]->album; ?></a>
					<span class="cd-modal-bg"></span>  
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
		$.get("?", { controller: "musics", action: "listen", json: "", u: id })
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
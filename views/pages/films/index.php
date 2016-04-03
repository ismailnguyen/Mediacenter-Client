<div class="row">
	<section class="cd-section">

		<div id="grid" data-columns>
		
			<?php
				foreach($films as $key => $film) {
			?>
			
			<div class="grid-element" data-type="modal-trigger" id="<?php echo $key; ?>">
				<a href="#">
					 <img src="<?php echo $film->image; ?>" class="thumbnail img-responsive">
				</a>
				
				<div class="cd-modal-action">
					<a href="#0" class="btn"><?php echo $film->title; ?></a>
					<span class="cd-modal-bg"></span>  
				</div>

			</div>

			<?php
				}
			?>
			
		</div>
		
		<?php require_once 'views/pages/films/modal.php'; ?>

		<a href="#0" class="cd-modal-close">Close</a>
	</section>
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
			supplied:	"webmv, ogv, m4v",
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
		$.get("?", { controller: "films", action: "watch", json: "", u: id })
		.done(function (film) {
			
			$("#film_title").text(film.title);
			$("#film_director").text(film.director);
			$("#film_description").text(film.description);
			$("#film_publication").text(film.publication);
			$("#film_image").text(film.image);
							
			playlist.setPlaylist([
				{
					title: film.title,
					artist: film.director,
					free: true,
					m4v: film.path,
					ogv: film.path,
					webmv: film.path,
					poster: film.image
				}
			]);
	
		}, "json");
	}
</script>
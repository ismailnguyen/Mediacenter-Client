<div class="row">
	<?php require_once 'views/pages/musics/modal.php'; ?>
</div>

<div class="row">
	<div id="grid" data-columns>
		
		<?php
			foreach($albums as $key => $album) {
		?>
		
		<div class="grid-element" id="<?php echo $key; ?>">
			<div class="element-title"><?php echo $album[0]->album; ?></div>
			<a href="#">
				 <img src="<?php echo $album[0]->image; ?>" class="thumbnail img-responsive">
			</a>
		</div>
		
		<?php
			}
		?>
	</div>
</div>
 
<script>
	// Launch modal popup on click event
	// Retrieve musics of selected album with ajax callback
	$(".grid-element").click(function () {
		$.get("?", { controller: "musics", action: "album", json: "", n: $(this).attr("id") })
		.done(function (data) {
			$("#album_title").text(data[0].album);
		}, "json");
		
		$("#overviewModal").modal("toggle");
	});
</script>
  
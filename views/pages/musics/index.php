<div class="row">
	<div id="overviewModal" class="modal modal-fullscreen fade" role="dialog" data-easein="shrinkIn">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title" id="album_title">title</h1>
				</div>
				
				<div class="modal-body">
					<h2>1. Modal sub-title</h2>

        <p>Liquor ipsum dolor sit
		es beefeater kalimotxo royal arrival jack rose. Cutty sark scots whisky b & b harper's fi
		nlandia agent orange pink lady three wise men gin fizz murphy's. Chartreuse french 75 brandy 
		daisy widow's cork 7 crown ketel one captain morgan fleischmann's, hayride, edradour godfathe
		r. Long island iced tea choking hazard black b
		ison, greyhound harvey wallbanger, "gibbon kir royale salty dog tonic and tequila."</p>
				</div>
				
				<div class="modal-footer">
					<button type="submit" class="btn" data-toggle="close">Sign in!</button>
				</div>
			</div>
		</div>
	</div>
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
  
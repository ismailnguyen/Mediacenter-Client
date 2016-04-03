<div class="row">
	<section class="cd-section">

		<div id="grid" data-columns>
		
		<?php
			foreach($books as $key => $book) {
		?>
		
		<div class="grid-element" data-type="modal-trigger" id="<?php echo $key; ?>">
			<a href="#">
				 <img src="<?php echo $book->image; ?>" class="thumbnail img-responsive">
			</a>
			
			<div class="cd-modal-action">
				<a href="#0" class="btn"><?php echo $book->title; ?></a>
				<span class="cd-modal-bg"></span>  
			</div>

		</div>

		<?php
			}
		?>
		</div>
		
		<?php require_once 'views/pages/books/modal.php'; ?>

		<a href="#0" class="cd-modal-close">Close</a>
	</section>
</div>

<script>
	// Launch modal popup on click event
	// Retrieve selected book with ajax callback
	function updateModal(id) {
		$.get("?", { controller: "books", action: "read", json: "", u: id })
		.done(function (data) {
			$("#book_title").text(data.title);
		}, "json");
	}
</script>
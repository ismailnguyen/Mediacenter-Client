<?php
	if (!isset($_GET['u'])) {
?>
	<div class="row main-board new-item" style="display:none;">
		<form action="./?controller=books&action=create" method="POST">
			<div class="col-sm-3">Title</div>
			<div class="col-sm-3"><input type="text" name="title" placeholder="Title" maxlength="30" required></div>
			
			<div class="col-sm-3">Author</div>
			<div class="col-sm-3"><input type="text" name="author" placeholder="Author" maxlength="30" required></div>
			
			<div class="col-sm-3">Description</div>
			<div class="col-sm-3"><input type="text" name="description" placeholder="Description" maxlength="30" required></div>
			
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
	if ($books == null || empty(array_filter($books))) {
		echo '<div class="main-board"><h1>Nothing here</h1></div>';
	} else {
?>
	<section class="cd-section">

		<div id="grid" data-columns>
		
		<?php
			foreach($books as $key => $book) {
				if ($book->image == null || empty($book->image))
					$book->image = './resources/images/book-cover.png';
		?>
		
		<div class="grid-element" data-type="modal-trigger" id="<?php echo $key; ?>">
			<a href="#">
				 <img src="<?php echo $book->image; ?>" class="thumbnail img-responsive">
				 
			</a>
			
			<div class="cd-modal-action">
				<a href="#0" class="btn"><?php echo $book->title; ?></a>
				<span class="cd-modal-bg"></span>
				
				<?php
					if (!isset($_GET['u'])) {
						echo '<div align="center">';
							echo '<button class="button-hover button-delete" name="'.$book->uuid.'" style="display: none;"><p> Remove </p></button>';
						echo '</div>';
					} else {
						echo '<div align="center">';
							echo '<button class="button-hover button-add" name="'.$book->uuid.'" style="display: none;"><p> Fork </p></button>';
						echo '</div>';
					}
				?>
			</div>

		</div>

		<?php
			}
		?>
		</div>
		
		<?php require_once 'views/pages/books/modal.php'; ?>

		<a href="#0" class="cd-modal-close">Close</a>
	</section>
<?php
	}
?>
</div>

<script>
	$(document).ready(function () {
		$(".thumbnail").error(function(){
			$(this).attr('src', './resources/images/book-cover.png');
		});
	});

	// Launch modal popup on click event
	// Retrieve selected book with ajax callback
	function updateModal(id) {
		$.get('?', { controller: 'books', action: 'read', json: '', book: id <?php echo isset($_GET['u']) ? ", user: '".$_GET['u']."'" : ''; ?> })
		.done(function (data) {
			$('#book_title').text(data.title);
			$('#book_author').text(data.author);
			$('#book_description').text(data.description);
			$('#book_publication').text(data.publication);
			$('#book_path').attr('action', data.path);
		}, 'json');
	}
</script>
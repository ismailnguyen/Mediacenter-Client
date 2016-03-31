<?php
	class BooksController {
		
		public function index() {
			if (!isset($_SESSION['token']))
				redirect('accounts');

			require_once('views/pages/books/index.php');
		}
	}
?>
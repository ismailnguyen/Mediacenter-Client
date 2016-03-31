<?php
	class FilmsController {
		
		public function index() {
			if (!isset($_SESSION['token']))
				redirect('accounts');

			require_once('views/pages/films/index.php');
		}
	}
?>
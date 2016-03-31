<?php
	class PagesController {
		
		public function index() {
			redirect('accounts');
		}

		public function error() {
			require_once('views/pages/error.php');
		}
	}
?>
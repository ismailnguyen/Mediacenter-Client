<?php
	require_once 'repositories/mock/film_repository.php';

	class FilmsController {
		
		private $filmRepository;
		
		public function __construct() {
			$this->filmRepository = new MockFilmRepository();
		}
		
		public function index() {
			if (!isset($_SESSION['token']))
				redirect('accounts');

			$films = $this->filmRepository->getFilms();
			
			require_once('views/pages/films/index.php');
		}
		
		public function watch() {
			if (isset($_GET["u"])) {
				$uuid = $_GET["u"];
			
				$films = $this->filmRepository->getFilms();
			
				header('Content-Type: application/json');
				echo json_encode($films[$uuid]);
			}
		}
	}
?>
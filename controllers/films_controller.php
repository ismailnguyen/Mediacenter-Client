<?php
	require_once 'repositories/film_repository.php';

	class FilmsController {
		
		private $filmRepository;
		
		public function __construct() {
			$this->filmRepository = new FilmRepository();
		}
		
		public function index() {
			if (!isset($_SESSION['user']))
				redirect('accounts');
			
			if (isset($_POST['remove']) && !empty($_POST['remove'])) {
				$this->filmRepository->delete($_POST['remove']);
			}

			if (isset($_POST['add']) && !empty($_POST['add'])) {
				$this->filmRepository->add($_POST['add']);
			}
			
			if (isset($_GET['u']) && !empty($_GET['u'])) {
				$films = $this->filmRepository->getPublicFilms($_GET['u']);
			} else {
				$films = $this->filmRepository->getFilms();
			}

			require_once('views/pages/films/index.php');
		}
		
		public function watch() {
			if (isset($_GET['film'])) {
				$uuid = $_GET['film'];
				
				if (isset($_GET['user']) && !empty($_GET['user'])) {
					$films = $this->filmRepository->getPublicFilms($_GET['user']);
				} else {
					$films = $this->filmRepository->getFilms();
				}
				
				header('Content-Type: application/json');
				echo json_encode($films[$uuid]);
			}
		}
		
		public function create() {
			if (isset($_POST['create'])
				&& $this->filmRepository->create(
							$_POST['title'], 
							$_POST['director'], 
							$_POST['description'],
							$_POST['publication'], 
							$_POST['image'], 
							$_POST['path']
					)) {
				redirect('films');
			}
		}
	}
?>
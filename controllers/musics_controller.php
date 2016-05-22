<?php
	require_once 'repositories/music_repository.php';
	
	class MusicsController {
		
		private $musicRepository;
		
		public function __construct() {
			$this->musicRepository = new MusicRepository();
		}
		
		public function index() {
			if (!isset($_SESSION['user']))
				redirect('accounts');			
			
			if (isset($_GET['u']) && !empty($_GET['u'])) {
				$musics = $this->musicRepository->getPublicMusics($_GET['u']);
				
				if (isset($_POST['add']) && !empty($_POST['add'])) {
					foreach ($musics as $music) {
						if ($music->album == $_POST['add']) {
							$this->musicRepository->add($music->uuid);
						}
					}
				}
			} else {
				$musics = $this->musicRepository->getMusics();
			}
			
			$albums = $this->sortByAlbum($musics);
			
			require_once('views/pages/musics/index.php');
		}
		
		public function songs() {
			if (!isset($_SESSION['user']))
				redirect('accounts');
			
			if (isset($_POST['remove']) && !empty($_POST['remove'])) {
				$this->musicRepository->delete($_POST['remove']);
			}
			
			$musics = $this->musicRepository->getMusics();
			
			require_once('views/pages/musics/songs.php');
		}
		
		public function listen() {
			if (isset($_GET['album'])) {
				$uuid = $_GET['album'];
			
				if (isset($_GET['user']) && !empty($_GET['user'])) {
					$musics = $this->musicRepository->getPublicMusics($_GET['user']);
				} else {
					$musics = $this->musicRepository->getMusics();
				}
				
				$albums = $this->sortByAlbum($musics);
			
				header('Content-Type: application/json');
				echo json_encode($albums[$uuid]);
			}
		}
		
		public function play() {
			if (isset($_GET['u'])) {
				$uuid = $_GET['u'];

				$musics = $this->musicRepository->getMusics();

				header('Content-Type: application/json');
				echo json_encode($musics[$uuid]);
			}
		}
		
		public function create() {
			if (isset($_POST['create'])
				&& $this->musicRepository->create(
							$_POST['title'], 
							$_POST['author'], 
							$_POST['album'],
							$_POST['publication'], 
							$_POST['image'], 
							$_POST['path']
					)) {
				redirect('musics');
			}
		}
		
		private function sortByAlbum($musics) {
			$albums = array();
			
			foreach($musics as $music) {
				$albums[$music->album][] = $music;
			}
			
			return $albums;
		}
	}
?>
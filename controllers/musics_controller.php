<?php
	require_once 'repository/mock/music_repository.php';
	
	class MusicsController {
		
		private $musicRepository;
		
		public function __construct() {
			$this->musicRepository = new MockMusicRepository();
		}
		
		public function index() {
			if (!isset($_SESSION['token']))
				redirect('accounts');

			$albums = $this->musicRepository->getAlbums();
			
			require_once('views/pages/musics/index.php');
		}
		
		public function album() {
			if (isset($_GET["n"])) {
				$albumKey = $_GET["n"];
			
				$albums = $this->musicRepository->getAlbums();
			
				header('Content-Type: application/json');
				echo json_encode($albums[$albumKey]);
			}
		}
	}
?>
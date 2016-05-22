<?php
	require_once 'base_repository.php';
	
	class MusicRepository extends BaseRepository {
		
		private $_client = null;
		
		public function __construct() {
			parent::__construct();
			
			$this->_client = $this->client
								->header('token', $_SESSION['user']->token)
								->header('Content-Type', 'application/json');
		}
		
		public function create($title, $author, $album = '', $publication, $image, $path) {
			if (!empty($title) && !empty($author) && !empty($path)) {
				
				if ($publication == null || empty($publication))
					$publication = date('Y-m-d\TH:i:sP');
				
				$music = $this->_client
							->post('musics')
							->param(array(
									'title' => $title,
									'author' => $author,
									'album' => $album,
									'publication' => $publication,
									'image' => $image,
									'path' => $path))
							->run();
				
				if ($music != null && !($music instanceof RestException))
					return true;
			}
			
			return false;
		}
		
		public function add($uuid) {
			if (!empty($uuid)) {
				$music = $this->_client
							->post('musics/'.$uuid)
							->run();
					
				if ($music != null && !($music instanceof RestException))
					return true;
			}
			
			return false;
		}
		
		public function delete($uuid) {
			if (!empty($uuid)) {
				$music = $this->_client
							->delete('musics/'.$uuid)
							->run();
					
				if ($music != null && !($music instanceof RestException))
					return true;
			}
			
			return false;
		}
		
		public function getMusics() {
			$musics = $this->_client
						->get('musics')
						->run();
				
			if ($musics != null && !($musics instanceof RestException))
				return json_decode($musics);
						
			return null;
		}
		
		public function getPublicMusics($uuid) {
			if (!empty($uuid)) {
				$musics = $this->_client
						->get('users/'.$uuid.'/musics')
						->run();
						
				if ($musics != null && !($musics instanceof RestException))
						return json_decode($musics);
			}
			
			return null;
		}
	}
?>
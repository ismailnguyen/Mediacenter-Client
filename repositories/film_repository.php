<?php
	require_once 'base_repository.php';
	
	class FilmRepository extends BaseRepository {
		
		private $_client = null;
		
		public function __construct() {
			parent::__construct();
			
			$this->_client = $this->client
								->header('token', $_SESSION['user']->token)
								->header('Content-Type', 'application/json');
		}
		
		public function create($title, $director = '', $description = '', $publication, $image, $path) {
			if (!empty($title) && !empty($path)) {
				
				if ($publication == null || empty($publication))
					$publication = date('Y-m-d\TH:i:sP');
				
				$film = $this->_client
							->post('films')
							->param(array(
									'title' => $title,
									'director' => $director,
									'description' => $description,
									'publication' => $publication,
									'image' => $image,
									'path' => $path))
							->run();
					
				if ($film != null && !($film instanceof RestException))
					return true;
			}
			
			return false;
		}
		
		public function add($uuid) {
			if (!empty($uuid)) {
				$film = $this->_client
							->post('films/'.$uuid)					
							->run();
					
				if ($film != null && !($film instanceof RestException))
					return true;
			}
			
			return false;
		}
		
		public function delete($uuid) {
			if (!empty($uuid)) {
				$film = $this->_client
							->delete('films/'.$uuid)
							->run();
					
				if ($film != null && !($film instanceof RestException))
					return true;
			}
			
			return false;
		}
		
		public function getFilms() {
			$films = $this->_client
						->get('films')
						->run();
				
			if ($films != null && !($films instanceof RestException))
				return json_decode($films);
						
			return null;
		}
		
		public function getPublicFilms($uuid) {
			if (!empty($uuid)) {
				$films = $this->_client
						->get('users/'.$uuid.'/films')
						->run();
						
				if ($films != null && !($films instanceof RestException))
						return json_decode($films);		
			}
			
			return null;
		}
	}
?>
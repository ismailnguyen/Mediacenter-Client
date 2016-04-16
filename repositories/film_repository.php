<?php
	require_once 'base_repository.php';
	
	class FilmRepository extends BaseRepository {
		
		private $_client = null;
		
		public function __construct() {
			parent::__construct();
			
			$this->_client = $this->client->get('films');
		}
		
		public function getFilms() {
			try {
				$films = $this->_client
						->param('token', $_SESSION['token'])
						->run();
				
				return $films != null && !($films instanceof RestException)
						? array(json_decode($films))
						: null;
			
			} catch (RestException $e) {
				echo $e->getStatus();
			}
		}
		
		public function getFilmsByUser($uuid) {
			try {
				$films = $this->_client
						->get('users/film')
						->param('uuid', $uuid)
						->run();
						
				return $films != null && !($films instanceof RestException)
						? array(json_decode($films))
						: null;
			
			} catch (RestException $e) {
				echo $e->getStatus();
			}
		}
	}
?>
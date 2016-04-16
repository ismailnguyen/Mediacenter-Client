<?php
	require_once 'base_repository.php';
	
	class FilmRepository extends BaseRepository {
		
		private $_client = null;
		
		public function __construct() {
			parent::__construct();
			
			$this->_client = $this->client->get('film');
		}
		
		public function getFilms() {
			try {
				$film = $this->_client
						->param('token', $_SESSION['token'])
						->run();
						
			return array(json_decode($film));
			
			} catch (RestException $e) {
				echo $e->getStatus();
			}
		}
		
		public function getFilmsByUser($uuid) {
			try {
				$film = $this->_client
						->get('users/film')
						->param('uuid', $uuid)
						->run();
						
			return array(json_decode($film));
			
			} catch (RestException $e) {
				echo $e->getStatus();
			}
		}
	}
?>
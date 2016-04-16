<?php
	require_once 'base_repository.php';
	
	class MusicRepository extends BaseRepository {
		
		private $_client = null;
		
		public function __construct() {
			parent::__construct();
			
			$this->_client = $this->client->get('musics');
		}
		
		public function getAlbums() {
			try {
				$musics = $this->_client
						->param('token', $_SESSION['token'])
						->run();
						
			return array(json_decode($musics));
			
			} catch (RestException $e) {
				echo $e->getStatus();
			}
		}
		
		public function getAlbumsByUser($uuid) {
			try {
				$musics = $this->_client
						->get('users/musics')
						->param('uuid', $uuid)
						->run();
						
			return array(json_decode($musics));
			
			} catch (RestException $e) {
				echo $e->getStatus();
			}
		}
	}
?>
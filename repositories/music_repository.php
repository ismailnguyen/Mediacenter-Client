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
			
				return $musics != null && !($musics instanceof RestException)
						? array(json_decode($musics))
						: null;
			
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
						
				return $musics != null && !($musics instanceof RestException)
						? array(json_decode($musics))
						: null;
			
			} catch (RestException $e) {
				echo $e->getStatus();
			}
		}
	}
?>
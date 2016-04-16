<?php
	require_once 'base_repository.php';
	
	class BookRepository extends BaseRepository {
		
		private $_client = null;
		
		public function __construct() {
			parent::__construct();
			
			$this->_client = $this->client->get('books');
		}
		
		public function getBooks() {
			try {
				$books = $this->_client
						->param('token', $_SESSION['token'])
						->run();
						
			return array(json_decode($books));
			
			} catch (RestException $e) {
				echo $e->getStatus();
			}
		}
		
		public function getBooksByUser($uuid) {
			try {
				$books = $this->_client
						->get('users/books')
						->param('uuid', $uuid)
						->run();
						
			return array(json_decode($books));
			
			} catch (RestException $e) {
				echo $e->getStatus();
			}
		}
	}
?>
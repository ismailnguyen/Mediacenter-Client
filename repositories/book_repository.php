<?php
	require_once 'base_repository.php';
	
	class BookRepository extends BaseRepository {
		
		private $_client = null;
		
		public function __construct() {
			parent::__construct();
			
			$this->_client = $this->client
								->header('token', $_SESSION['user']->token)
								->header('Content-Type', 'application/json');
		}
		
		public function create($title, $director, $description, $publication, $image, $path) {
			if (!empty($title) && !empty($director) && !empty($description) && !empty($path)) {
				
				if ($publication == null || empty($publication))
					$publication = date('Y-m-d\TH:i:sP');
				
				$book = $this->_client
							->post('books')
							->header('Content-Type', 'application/json')
							->param(array(
									'title' => $title,
									'author' => $director,
									'description' => $description,
									'publication' => $publication,
									'image' => $image,
									'path' => $path))
							->run();

				if ($book != null && !($book instanceof RestException))
					return true;
			}
			
			return false;
		}
		
		public function add($uuid) {
			if (!empty($uuid)) {
				$book = $this->_client
							->post('books/'.$uuid)
							->run();
					
				if ($book != null && !($book instanceof RestException))
					return true;
			}
			
			return false;
		}
		
		public function delete($uuid) {
			if (!empty($uuid)) {
				$book = $this->_client
							->delete('books/'.$uuid)
							->run();
					
				if ($book != null && !($book instanceof RestException))
					return true;
			}
			
			return false;
		}
		
		public function getBooks() {
			$books = $this->_client
						->get('books')
						->run();
				
			if ($books != null && !($books instanceof RestException))
				return json_decode($books);
						
			return null;
		}
		
		public function getPublicBooks($uuid) {
			if (!empty($uuid)) {
				$books = $this->_client
						->get('users/'.$uuid.'/books')
						->run();
						
				if ($books != null && !($books instanceof RestException))
						return json_decode($books);	
			}
			
			return null;
		}
	}
?>
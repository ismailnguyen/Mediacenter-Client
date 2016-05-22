<?php
	require_once 'repositories/book_repository.php';

	class BooksController {
		
		private $bookRepository;
		
		public function __construct() {
			$this->bookRepository = new BookRepository();
		}
		
		public function index() {
			if (!isset($_SESSION['user']))
				redirect('accounts');
			
			if (isset($_POST['remove']) && !empty($_POST['remove'])) {
				$this->bookRepository->delete($_POST['remove']);
			}
			
			if (isset($_POST['add']) && !empty($_POST['add'])) {
				$this->bookRepository->add($_POST['add']);
			}

			if (isset($_GET['u']) && !empty($_GET['u'])) {
				$books = $this->bookRepository->getPublicBooks($_GET['u']);
			} else {
				$books = $this->bookRepository->getBooks();
			}

			require_once('views/pages/books/index.php');
		}
		
		public function read() {
			if (isset($_GET['book'])) {
				$uuid = $_GET['book'];
				
				if (isset($_GET['user']) && !empty($_GET['user'])) {
					$books = $this->bookRepository->getPublicBooks($_GET['user']);
				} else {
					$books = $this->bookRepository->getBooks();
				}
				
				header('Content-Type: application/json');
				echo json_encode($books[$uuid]);
			}
		}
		
		public function create() {
			if (isset($_POST['create'])
				&& $this->bookRepository->create(
							$_POST['title'], 
							$_POST['author'], 
							$_POST['description'],
							$_POST['publication'], 
							$_POST['image'], 
							$_POST['path']
					)) {
				redirect('books');
			}
		}
	}
?>
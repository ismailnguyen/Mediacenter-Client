<?php
	require_once 'repositories/mock/book_repository.php';

	class BooksController {
		
		private $bookRepository;
		
		public function __construct() {
			$this->bookRepository = new MockBookRepository();
		}
		
		public function index() {
			if (!isset($_SESSION['token']))
				redirect('accounts');

			$books = $this->bookRepository->getBooks();
			
			require_once('views/pages/books/index.php');
		}
		
		public function read() {
			if (isset($_GET["u"])) {
				$uuid = $_GET["u"];
				
				$books = $this->bookRepository->getBooks();
				
				header('Content-Type: application/json');
				echo json_encode($books[$uuid]);
			}
		}
	}
?>
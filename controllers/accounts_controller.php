<?php
	require_once 'repositories/account_repository.php';
	require_once 'repositories/book_repository.php';
	require_once 'repositories/film_repository.php';
	require_once 'repositories/music_repository.php';

	class AccountsController {
		
		private $accountRepository;
		private $bookRepository;
		private $filmRepository;
		private $musicRepository;
		
		public function __construct() {
			$this->accountRepository = new AccountRepository();
			
			if (isset($_SESSION['user'])) {
				$this->bookRepository = new BookRepository();
				$this->filmRepository = new FilmRepository();
				$this->musicRepository = new MusicRepository();
			}
		}
				
		public function index() {
			if (!isset($_SESSION['user']))
				redirect('accounts', 'login');		
			
			$account = $_SESSION['user'];
			
			$books = array_slice($this->bookRepository->getBooks(), 0, 5);
			$films = array_slice($this->filmRepository->getFilms(), 0, 5);
			$musics = array_slice($this->musicRepository->getMusics(), 0, 5);

			require_once('views/pages/accounts/index.php');
		}
		
		public function login() {
			if (isset($_POST['login'])) {
				$user = $this->accountRepository->login($_POST['email'], $_POST['password']);
				
				if ($user == null)
					throw new WebException("Login failure");
				
				$_SESSION['user'] = $user;
					
				redirect('accounts');
			}
			
			require_once('views/pages/accounts/login.php');
		}

		public function register() {
			if (isset($_POST['register'])) {
				$user = $this->accountRepository->register($_POST['email'], $_POST['password'], $_POST['pseudo']);
				
				if ($user == null)
					throw new WebException("Registering failure");
				
				$_SESSION['user'] = $user;
					
				redirect('accounts');
			}
			
			require_once('views/pages/accounts/register.php');
		}
		
		public function settings() {
			if (isset($_POST['update'])) {
				$user = $this->accountRepository->update(
												$_SESSION['user']->email, 
												$_POST['password'],
												$_POST['pseudo'],
												$_POST['privacy'] == 'on' ? 'true' : 'false');
												
				if ($user == null)
					throw new WebException("Update failure");
				
				$_SESSION['user'] = $user;
					
				redirect('accounts');
			}
			
			$account = $_SESSION['user'];
			
			require_once('views/pages/accounts/settings.php');
		}	
		
		public function delete() {
			if (isset($_POST['delete']) && $this->accountRepository->delete())
				$this->logout();
		}
		
		public function logout() {
			$_SESSION['user'] = null;
			session_unset();
			session_destroy();
			
			redirect('accounts');
		}
		
		public function users() {
			$users = $this->accountRepository->getAllAccounts();
			
			require_once('views/pages/accounts/users.php');
		}
		
		public function library() {
			if (isset($_GET["u"]) && !empty($_GET["u"])) {
				$u = $_GET["u"];
				
				$account = $this->accountRepository->getPublicUser($u);
				
				$books = array_slice($this->bookRepository->getPublicBooks($u), 0, 5);
				$films = array_slice($this->filmRepository->getPublicFilms($u), 0, 5);
				$musics = array_slice($this->musicRepository->getPublicMusics($u), 0, 5);
				
				require_once('views/pages/accounts/library.php');
			}
		}
	}
?>
<?php
	class AccountsController {
				
		public function index() {
			if (!isset($_SESSION['token']))
				redirect('accounts', 'login');		
			
			$account = new Account("Ismail", "NGUYEN");

			require_once('views/pages/accounts/index.php');
		}
		
		public function login() {
			if (isset($_POST['login'])) {
				$_SESSION['token'] = "ismail";
				
				redirect('accounts');
			}
			
			require_once('views/pages/accounts/login.php');
		}

		public function register() {
			require_once('views/pages/accounts/register.php');
		}
		
		public function forgot() {
			require_once('views/pages/accounts/forgot.php');
		}
		
		public function settings() {
			$account = new Account("Ismail", "NGUYEN");
			
			require_once('views/pages/accounts/settings.php');
		}
		
		public function logout() {
			$_SESSION['token'] = null;
			session_unset();
			
			redirect('accounts');
		}
	}
?>
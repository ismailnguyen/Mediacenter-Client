<?php
	require_once 'base_repository.php';
	
	class AccountRepository extends BaseRepository {
		
		private $_client = null;
		
		public function __construct() {
			parent::__construct();
			
			$this->_client = $this->client;
		}
		
		public function login($email, $password) {
			if (!empty($email) && !empty($password)) {
				$login = $this->_client
							->get('connect')
							->header('Content-Type', 'application/json')
							->header('email', $email)
							->header('password', $password)
							->run();
					
				if ($login != null && !($login instanceof RestException))
					return json_decode($login);
			}
			
			return null;
		}
		
		public function register($email, $password, $pseudo) {
			if (!empty($email) && !empty($password) && !empty($pseudo)) {
				
				$token = md5(uniqid(rand(), true));
				
				$register = $this->_client
							->post('users')
							->header('Content-Type', 'application/json')
							->param(array(
									'email' => $email,
									'password' => $password,
									'pseudo' => $pseudo,
									'token' => $token))
							->run();
					
				if ($register != null && !($register instanceof RestException))
					return json_decode($register);
			}
			
			return null;
		}
		
		public function update($email, $password, $pseudo, $privacy = 'true') {
			if (!empty($email) && !empty($password) && !empty($pseudo)) {
				$update = $this->_client
							->put('users')
							->header('Content-Type', 'application/json')
							->header('token', $_SESSION['user']->token)
							->param(array(
									'email' => $email,
									'password' => $password,
									'pseudo' => $pseudo,
									'privacy' => $privacy))
							->run();
					
				if ($update != null && !($update instanceof RestException))
					return true;
			}
			
			return false;
		}
		
		public function delete() {
			$delete = $this->_client
						->delete('users')
						->header('Content-Type', 'application/json')
						->header('token', $_SESSION['user']->token)
						->run();
				
			if ($delete != null && !($delete instanceof RestException))
				return true;
			
			return false;
		}
		
		public function getAccount() {
			$user = $this->_client
					->get('users/'.$_SESSION['user']->uuid)
					->header('Content-Type', 'application/json')
					->header('token', $_SESSION['user']->token)
					->run();
					
					var_dump($user);
					
			if ($user != null && !($user instanceof RestException))
				return json_decode($user);	
			
			return null;
		}
		
		public function getPublicUser($uuid) {
			if (!empty($uuid)) {
				$user = $this->_client
						->get('users/'.$uuid)
						->header('Content-Type', 'application/json')
						->header('token', $_SESSION['user']->token)
						->run();
						
				if ($user != null && !($user instanceof RestException))
					return json_decode($user);
			}
			
			return null;
		}
		
		public function getAllAccounts() {
			$users = $this->_client
					->get('users')
					->header('Content-Type', 'application/json')
					->header('token', $_SESSION['user']->token)
					->run();
					
			if ($users != null && !($users instanceof RestException))
				return json_decode($users);	
			
			return null;
		}
	}
?>
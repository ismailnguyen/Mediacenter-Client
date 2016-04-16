<?php
	require_once 'base_repository.php';
	
	class AccountRepository extends BaseRepository {
		
		private $_client = null;
		
		public function __construct() {
			parent::__construct();
			
			$this->_client = $this->client->get('users');
		}
		
		public function login($email, $password) {
			if (!empty($email) && !empty($password)) {
				$login = $this->_client
							->get('users/connect')
							->param('email', $email)
							->param('password', $password)
							->run();
					
				if ($login != null && !($login instanceof RestException)) {
					return json_decode($login)->token;
				}
			}
			
			return null;
		}
		
		public function getAccount() {
			$m = new Account();
			$m->pseudo = "Ismail";
			$m->token = "23454H3UBJHJ32T33AFL34593I4UV5NSTJG23V4B";
			
			return $m;
		}
	}
?>
<?php
	require_once 'base_repository.php';
	
	class AccountRepository {
		
		public function login() {
			
		}
		
		public function getAccount() {
			$m = new Account();
			$m->pseudo = "Ismail";
			$m->token = "23454H3UBJHJ32T33AFL34593I4UV5NSTJG23V4B";
			
			return $m;
		}
	}
?>
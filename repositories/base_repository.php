<?php
	require_once 'rest/rest_client.php';
	
	abstract class BaseRepository {
		private $_server = 'localhost';
		private $_port = 8080;
		
		protected $client = null;
		
		protected function __construct() {
			$this->client = RestClient::connect($this->_server, $this->_port);
		}
	}
?>
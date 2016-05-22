<?php
	class RestException {
		private $_status = null;
		private $_method   = null;
		private $_url    = null;
		private $_params = null;
		private $_headers = null;
		private $_message = null;
		
		function __construct($status, $method, $url, $headers, $params, $message) {
			$this->_status   = $status;
			$this->_method   = $method;
			$this->_url      = $url;
			$this->_params   = $params;
			$this->_headers   = $headers;
			$this->_message  = $message;
			$response = json_decode($this->_message);
			$this->_message = $response != null ? $response->message : '';
		}
		
		function getStatus() {
			return $this->_status;
		}
		
		function getMethod() {
			return $this->_method;
		}
		
		function getUrl() {
			return $this->_url;
		}
		
		function getParams() {
			return $this->_params;
		}
		
		function getMessage() {
			return $this->_message;
		}
		
		function getHeaders() {
			return $this->_headers;
		}
	}
?>
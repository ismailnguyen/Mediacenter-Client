<?php
	class WebException extends Exception {
		function __construct($message) {
			parent::__construct($message);
		}
	}
?>
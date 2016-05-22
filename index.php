<?php
	session_start();
	
	require_once 'common/exceptions/web_exception.php';
	
	if (isset($_GET['controller'])) {
		$controller = $_GET['controller'];
		
		$action = isset($_GET['action'])
					? $_GET['action']
					: 'index';
	}
	else {
		$controller = 'pages';
		$action = 'index';
	}
	
	try {
		if (isset($_GET['json'])) {
		require_once 'views/routes.php';
		}
		else if (isset($_SESSION['user'])) {
			require_once 'views/back_layout.php';
		}
		else {
			require_once 'views/front_layout.php';
		}
	} catch (WebException $e) {
		redirect('pages', 'error');
	}
?>
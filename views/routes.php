<?php
	function redirect($controller, $action='index') {
		if (empty($action)) {
			$action = 'index';
		}
		
		header('Location: ?controller='.$controller.'&action='.$action);
	}
	
	function call($controller, $action='index') {
		if (empty($action)) {
			$action = 'index';
		}
		
		require_once 'controllers/'.$controller.'_controller.php';

		switch ($controller) {
			case 'pages':
				$controller = new PagesController();
			break;
	  
			case 'accounts':
				require_once('models/account.php');
				$controller = new AccountsController();
			break;
			
			case 'films':
				require_once('models/film.php');
				$controller = new FilmsController();
			break;
			
			case 'musics':
				require_once('models/music.php');
				$controller = new MusicsController();
			break;
			
			case 'books':
				require_once('models/book.php');
				$controller = new BooksController();
			break;
		}

		$controller->{ $action }();
	}

	$controllers = array('pages'
							=> [
								'index', 
								'error'
								],

					   'accounts' 
							=> [
								'index',
								'login', 
								'register',
								'forgot',
								'settings',
								'logout'
								],
								
						'films' 
							=> [
								'index',
								'create',
								'read',
								'update',
								'delete'
								],
						
						'musics' 
							=> [
								'index',
								'create',
								'read',
								'update',
								'delete',
								'album'
								],
						
						'books' 
							=> [
								'index',
								'create',
								'read',
								'update',
								'delete'
								]
					);

	if (array_key_exists($controller, $controllers)
		&& (in_array($action, $controllers[$controller])
			|| empty($action))) {
		call($controller, $action);
	}
	else {
		call('pages', 'error');
	}
?>
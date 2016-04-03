<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Mummy Center</title>
		
		<link rel="shortcut icon" href="./resources/images/logo.ico" type="image/x-icon">
		<link rel="icon" href="./resources/images/logo.ico" type="image/x-icon">
		
		<link rel="stylesheet" type="text/css" href="./styles/normalize.css" />
		<link rel="stylesheet" type="text/css" href="./styles/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="./styles/back_style.css" />
		<link rel="stylesheet" type="text/css" href="./styles/modal.css" />
		<link rel="stylesheet" type="text/css" href="./styles/player/style.css" />
		<link rel="stylesheet" type="text/css" href="./styles/player/skin.css" />
		<link rel="stylesheet" type="text/css" href="./resources/fonts/font-awesome-4.3.0/css/font-awesome.min.css" />

		<script type="text/javascript" src="./scripts/jquery-2.2.2.js"></script>
		<script type="text/javascript" src="./scripts/bootstrap.min.js"></script>
		<script type="text/javascript" src="./scripts/velocity.js"></script>
		<script type="text/javascript" src="./scripts/modal.js"></script>
		<script type="text/javascript" src="./scripts/player/jquery.jplayer.min.js"></script>
		<script type="text/javascript" src="./scripts/player/jplayer.playlist.min.js"></script>
	</head>

	<body>
	
		<div class="row">
			<div class="col-sm-3">
				<!-- Sidebar -->
				<ul id="sidebar" class="">
					
					<li id="search-bar" class="frost">
						<span class="entypo-search"></span>
						<input type="text" name="search" placeholder="Find ...">
					</li>
					<li>
						<a class="entypo-video" href="./?controller=films"><span>Films</span></a>
					</li>
					<li>
						<a class="entypo-music" href="./?controller=musics"><span>Musics</span></a>
					</li>
					<li>
						<a class="entypo-book" href="./?controller=books"><span>Books</span></a>
					</li>
					
					<li id="sidebar-footer">
						<a class="entypo-logout" href="./?controller=accounts&action=logout"></a>
						<a class="entypo-cog" href="./?controller=accounts&action=settings"></a>
						<a class="entypo-home" href="./?controller=accounts"></a>
					</li>
				</ul>
			</div>
			
			<div id="main-container" class="col-sm-9">
				<!-- Content -->
				<?php require_once 'routes.php'; ?>	
			</div>
		</div>
			
		<script src="./scripts/salvattore.js"></script>

	</body>
</html>
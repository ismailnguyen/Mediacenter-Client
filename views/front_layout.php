<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Mummy Center</title>
		
		<link rel="shortcut icon" href="./resources/images/logo.ico" type="image/x-icon">
		<link rel="icon" href="./resources/images/logofavicon.ico" type="image/x-icon">
		
		<link rel="stylesheet" type="text/css" href="./styles/normalize.css" />
		<link rel="stylesheet" type="text/css" href="./styles/front_style.css" />
		
		<link href="http://fonts.googleapis.com/css?family=Raleway:200,400,800" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Gafata|Nobile:400,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="canvas"></canvas>
					
					<div id="wrapper" class="main-title">
						<div id="box" class="frost">
							<div id="top_header">
								<h3>Mummy Center</h3>
							</div>
								
							<?php require_once 'routes.php'; ?>
							
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<script src="./scripts/TweenLite.min.js"></script>
		<script src="./scripts/EasePack.min.js"></script>
		<script src="./scripts/animatedBackground.js"></script>
	</body>
</html>
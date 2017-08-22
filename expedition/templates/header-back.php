<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Mon site</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $urlRoot;?>/assets/css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">

	</head>
	<body>

		<header>	
			<h1>Mon site</h1>			
			<nav>
				<ul>
					<li><a href="<?php echo $app['url_generator']->generate('accueil')?>">Accueil</a></li>
					<li><a href="<?php echo $app['url_generator']->generate('blog')?>">Blog</a></li>
					<li><a href="<?php echo $app['url_generator']->generate('pedagogie')?>">pedagogie</a></li>
					<li><a href="<?php echo $app['url_generator']->generate('presentation')?>">Présentation</a></li>
					<li><a href="<?php echo $app['url_generator']->generate('evenements')?>">Evénements</a></li>
					<li><a href="<?php echo $app['url_generator']->generate('contact')?>">Contact</a></li>					
				</ul>				
				<a href="<?php echo $app['url_generator']->generate('deconnexion')?>">Déconnexion</a>					
			</nav>
			
			
			
			
		</header>

		<main>
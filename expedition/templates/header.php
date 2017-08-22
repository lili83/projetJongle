<?php
use Symfony\Component\HttpFoundation\Session\Session;
$objSession = new Session();
//dump($objSession);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>L'expédition</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $urlRoot; ?>/assets/img/header/logo.png" />
	<link rel="stylesheet" type="text/css" href="<?php echo $urlRoot; ?>/assets/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $urlRoot; ?>/assets/css/style_cel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $urlRoot; ?>/assets/css/style_nic.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $urlRoot; ?>/assets/css/style.css">
	<!-- link untiegallery -->
	<link rel='stylesheet' href='<?php echo $urlRoot; ?>/unitegallery/css/unite-gallery.css' type='text/css' />
	<link rel='stylesheet' href='<?php echo $urlRoot; ?>/unitegallery/themes/default/ug-theme-default.css' type='text/css' /> 
	<link rel='stylesheet' href='<?php echo $urlRoot; ?>/unitegallery/themes/video/skin-right-thumb.css' type='text/css' />
	<!-- linkp layer video 
	<link href="http://vjs.zencdn.net/6.2.4/video-js.css" rel="stylesheet">-->
</head>
<body>
<!-- début header -->
	<header>
		<nav class="contain">
			<span id="btn-menu"> menu</span>
			<figure id="logo">
					<img src="<?php echo $urlRoot; ?>/assets/img/header/logo_miniature.svg">
			</figure>
			<?php								
			// Si l'utilisateur est connecté : on affiche le lien de déconnexion			
			if($objSession->get('email') != ""){
				
			?>
			<span id="btn-deconnexion" >
				<a href="<?php echo $app['url_generator']->generate('deconnexion')?>">
					déconnexion
				</a>
			</span>
			<?php 
			// Sinon, on affiche le lien de connexion
			}else{				
			?>
			<span id="btn-connexion">connexion</span>
			<?php
			}
			?>
		</nav>
		<div id="div-magique"></div>
<!-- début menu -->
		<div id="menu">
			<span id="btn-close">fermer menu</span>
			<ul class="contain-col">
				<li><a href="<?php echo $app['url_generator']->generate('accueil')?>">accueil</a></li>
				<li><a href="<?php echo $app['url_generator']->generate('presentation')?>">présentation</a></li>
				<li><a href="<?php echo $app['url_generator']->generate('methode')?>">méthode</a></li>
				<li><a href="<?php echo $app['url_generator']->generate('notation')?>">notation</a></li>
				<li><a href="<?php echo $app['url_generator']->generate('blog')?>">blog</a></li>
				<?php 
				// Si l'utilisateur est connecté : on affiche le lien vers l'espace membre			
				if($objSession->get('email') != ""){								
				?>
				<li><a href="<?php echo $app['url_generator']->generate('back-office/espace-membre');						
				?>
				">espace membre</a></li>
				<?php 
				} 
				?>
				<li><a href="<?php echo $app['url_generator']->generate('galerie')?>">galerie</a></li>
				<li><a href="<?php echo $app['url_generator']->generate('evenements')?>">événements</a></li>
				<li><a href="<?php echo $app['url_generator']->generate('contact')?>">contact</a></li>
			</ul>
		</div>
		<!-- début formulaire login -->	
		<div id="login">
			<div>
				<span id="btn-close2">a</span>
				<h1>connexion</h1>
				<form action="<?php echo $app['url_generator']->generate('connexion');?>" method="POST">
					<input type="email" name="email" required placeholder="adresse email">
					<input type="password" name="password" required placeholder="mot de passe">
					<a href="#">mot de passe oublié ?</a>
					<button type="submit">se connecter</button>	
					<input type="hidden" name="ClassTraitement" value="Connexion">
					<p>vous n'avez pas de compte?</p>
					<span id="btn-inscription">créer un compte</span>
					<div id="messageLogin">		
						<?php  $this->afficherVarGlob("Login"."Message"); ?>
					</div>
				</form>
			</div>	
		</div>
	<!-- début formulaire inscription -->
		<div id="inscription">
				<div>
					<span id="btn-close3">a</span>
					<h1>inscription</h1>
					<form action="<?php echo $app['url_generator']->generate('inscription');?>" method="POST">
						<input type="text" name="pseudo" required placeholder="pseudo">
						<input type="email" name="email" required placeholder="adresse email">
						<input type="password" name="password" required placeholder="mot de passe">
						<input type="password" name="password_confirm" required placeholder="confirmation mot de passe">
		                <div class="g-recaptcha" data-sitekey="6LcdcywUAAAAAHxX-HN4FaW3zsw-L7KwwvcNl-Mh"></div>
						<button type="submit">valider inscription</button>	
						<input type="hidden" name="ClassTraitement" value="Inscription">
						<div id="messageInscription">		
							<?php  $this->afficherVarGlob("Inscription"."Message"); ?>
						</div>
					</form>
				</div>
		</div>				
		</header>
	
	</div>
	<main>
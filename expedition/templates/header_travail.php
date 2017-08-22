<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>L'expédition</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $urlRoot; ?>/assets/img/header/logo.png" />
	<link rel="stylesheet" type="text/css" href="<?php echo $urlRoot; ?>/assets/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $urlRoot; ?>/assets/css/style.css">
	<script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
	<div>
	<!-- début header -->
		<header>
			<nav>
				<a href="#"><figure><img src="<?php echo $urlRoot; ?>/assets/img/header/toogle.png"></figure></a>
				<a href="#">connexion</a>
			</nav>
		</header>
	<!-- début menu -->
		<div id="menu">
			<ul>
				<li><a href="#">accueil</a></li>
				<li><a href="#">présentation</a></li>
				<li><a href="#">pédagogie</a></li>
				<li><a href="#">blog</a></li>
				<li><a href="#">espace membre</a></li>
				<li><a href="#">galerie</a></li>
				<li><a href="#">évènements</a></li>
				<li><a href="#">contact</a></li>
			</ul>
		</div>		
	<!-- début formulaire login -->	
		<div id="login">
			<h1>connexion</h1>
			<form action="" method="GET">
				<input type="email" name="email" required placeholder="adresse email">
				<input type="password" name="password" required placeholder="mot de passe">
				<div>
					<a href="#">mot de passe oublié ?</a>
				</div>
				<button type="submit">se connecter</button>	
				<input type="hidden" name="ClassTraitement" value="Login">
			</form>
			<p>vous n'avez pas de compte?</p>
			<a href="#">créer un compte</a>
		</div>
	<!-- début formulaire inscription -->
		<div id="inscription">
			<h1>inscription</h1>
			<form action="" method="GET">
				<input type="text" name="nom" required placeholder="nom">
				<input type="text" name="prenom" required placeholder="prenom">
				<input type="text" name="pseudo" required placeholder="pseudo">
				<input type="email" name="email" required placeholder="adresse email">
				<input type="password" name="password" required placeholder="mot de passe">
				<input type="password" name="password_confirm" required placeholder="confirmation mot de passe">
				<input type="text" name="age" required placeholder="âge">
				<select name="genre">
                    <option value="">-- genre --</option>    
                    <option value="femme">Femme</option>
                    <option value="homme">Homme</option>
                </select> 
                <div class="g-recaptcha" data-sitekey="6Lc1cSwUAAAAAKHiQ0HX9jhvx46VCHFbqZDBFmVS"></div>
				<button type="submit">valider inscription</button>	
				<input type="hidden" name="ClassTraitement" value="Inscription">
			</form>
		</div>		
	</div>
	<main>
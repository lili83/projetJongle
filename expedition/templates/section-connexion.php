
<section>
	<h2>Connexion</h2>
	<form id="formConnexion" method="GET">
		<!--<input type="text" name="login" placeholder="Entrez votre login ou votre email">-->
		<input type="email" name="email" placeholder="Entrez votre email">
		<input type="password" name="password" placeholder="Entrez votre mot de passe">
		
		<input type="hidden" name="traitementClass" value="Connexion">
		<button>Se connecter</button>
	</form>	
	<a href="">Mot de passe oublié ?</a>
	<div id="messageConnexion">		
	<?php  $this->afficherVarGlob("Connexion"."Message"); ?>
	</div>
</section>
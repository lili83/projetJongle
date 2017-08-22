<section>
	<h2>Ajout d'un utilisateur</h2>
	<form id="formInscription" method="GET">
		<input type="text" name="login" placeholder="Entrez votre login">
		<input type="email" name="email" placeholder="Entrez votre email">
		<input type="password" name="password" placeholder="Entrez votre mot de passe">
		
		<input type="hidden" name="traitementClass" value="Inscription">
		
		<button>Ajouter</button>
	</form>
	<div id="messageInscription">		
	<?php  $this->afficherVarGlob("Inscription"."Message"); ?>
	</div>
</section>
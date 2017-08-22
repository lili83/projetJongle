<?php 
use Symfony\Component\HttpFoundation\Session\Session;
 ?>
<section  id="section_membre_1" class="maxWidht">
	<h2>Votre profil</h2>
	<article>
	<?php  
	// Informations fournies par l'utilisateur
	// Si connecté, il peut les modifier à son gré
	// ** tests de sécurité : session started, email verified, id user and email and passwordhashed match 
	
		// 
		// récup des id, et email de l'user courant 
		//
		$objSession = new Session;
		//$objSession->start();
		dump($objSession);
		$email = $this->request->get("email");
		$reqInfosUsr = "SELECT * FROM USER WHERE EMAIL = '$email';";

		global $app;
		//$res = $app->db['expedition']->query($reqInfosUsr);
		
	?>
		<h2>Mes infos</h2>
		<form action="" method="post">
			<input 
				type="text" 
				name="pseudo" 
				value="	<?php 
							if(isset($resInfosUsr["pseudo"]) && $resInfosUsr["pseudo"] !="") 
								echo $resInfosUsr["pseudo"]; 
						?>"
			>
			<input 
				type="email" 
				name="email"
				value="	<?php 
							if(isset($resInfosUsr["email"]) && $resInfosUsr["email"] !="") 
								echo $resInfosUsr["email"]; 
						?>"

			>

			<input 
				type="text" 
				name="nom"
				value="	<?php 
							if(isset($resInfosUsr["nom"]) && $resInfosUsr["nom"] !="") 
								echo $resInfosUsr["nom"]; 
						?>"
			>
			<input 
				type="text" 
				name="prenom"
				value="	<?php 
							if(isset($resInfosUsr["prenom"]) && $resInfosUsr["prenom"] !="") 
								echo $resInfosUsr["prenom"]; 
						?>"
			>
			<input 
				type="text" 
				name="resume"
				value="	<?php 
							if(isset($resInfosUsr["resume"]) && $resInfosUsr["resume"] !="") 
								echo $resInfosUsr["resume"]; 
						?>"
			>
			<input 
				type="text" 
				name=""
				value="	<?php 
							if(isset($resInfosUsr["pseudo"]) && $resInfosUsr["pseudo"] !="") 
								echo $resInfosUsr["pseudo"]; 
						?>"
			>
			<button>Modifier</button>
			<input type="hidden" name="traitement" value="update">
		</form>
	</article>
</section>
<?php 
	//
	//	recup des articles dont l'id_auteur  = id en session
	//
 ?>
<section id="section_membre" class="maxWidht">
	<h2>Vos articles</h2>
	<div>
	<!-- 
	Liste des articles publiés 
		Pour chaque article, le membre peut les modifier ou les supprimer
	-->
	</div>
</section>


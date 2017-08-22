<?php 
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\DBAL\Connection;

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
//		$objSession->start();

		$email = $_SESSION["_sf2_attributes"]["email"];
		$_SESSION["$email"] = $email;

		$pseudo = $_SESSION["_sf2_attributes"]["pseudo"];
		$_SESSION["$pseudo"] = $pseudo;

		$niveau = $_SESSION["_sf2_attributes"]["niveau"];		
		$_SESSION["$niveau"] = $niveau;
		

		$reqInfosUsr = "SELECT * FROM USER WHERE EMAIL = '$email';";
		$config = new \Doctrine\DBAL\Configuration();
		$connectionParams = array(
			'driver'		=>	'pdo_mysql',
			'host'			=>	'localhost',
			'dbname'		=>	'expedition',
			'user'			=>	'root',
			'password'		=>	'',
			'charset'		=>	'utf8');

		$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);		
		$resInfosUsr = $conn->query($reqInfosUsr)->fetch();
		extract($resInfosUsr);
		
	?>
		<h2>Mes infos</h2>
		<form action="" method="post">
			<input 
				type="text" 
				name="pseudo" 
				value="	<?php 
							if(isset($pseudo) && $pseudo !="") 
								echo $pseudo; 
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
				type="hidden" 
				name="id"
				value="	<?php 
							if(isset($resInfosUsr["id"]) && $resInfosUsr["id"] !="") 
								echo $resInfosUsr["id"]; 
						?>"
			>
			<button>Modifier</button>
			<input type="hidden" name="traitementClass" value="Update">
		</form>
	</article>
</section>
<?php 

	//
	//	recup des articles du membre connecté
	//		on afffiche des forms de chq article
	//
 ?>
<section id="section_membre" class="maxWidht">
	<h2>Vos articles</h2>
	<div>
	<!-- 
	Liste des articles publiés 
		Pour chaque article, le membre peut les modifier ou les supprimer
	-->
<?php 	
	// On récupère le nombre d'articles de l'utilisateur
	$reqNbArticleUsr = "SELECT COUNT(*) FROM ARTICLE WHERE id_user = '".$resInfosUsr["id"]."';";
	$resNbArticleUsr = $conn->query($reqNbArticleUsr)->fetch();

	// On affiche les articles de l'utilisateur
	$reqArticleUsr = "SELECT * FROM ARTICLE WHERE id_user = '".$resInfosUsr["id"]."';";
	$resArticleUsr = $conn->query($reqArticleUsr)->fetchAll();

	foreach ($resArticleUsr as $tabArticle) {
		$article = new Article($tabArticle);
		
		extract($tabArticle);
		$codeHTML=<<<CODEHTML
	<form class="form-article" method="POST" action="/modifierArticle/{$id}">
			<label for="titre">Titre: </label>
			<input type="text" name="titre" value="${titre}"></input>

			<label for="resume">Résumé: </label>
			<textarea name="resume" cols=120 rows=10>${resume}"</textarea>

			<!--
			****************************************************************************
			****************************************************************************
			A REMPLACER AVEC LE PLUGIN CKEDIT
			****************************************************************************
			****************************************************************************
			-->
			<label for="contenu">Contenu: </label>
			<textarea name="contenu" cols=120 rows=10>${contenu}</textarea>

			<button type="reset">Annuler</button>
			<button type="submit">Modifier</button>
			<button type="submit">Supprimer</button>
	</form>
CODEHTML;
		echo $codeHTML;
	}
 ?>	
	</div>
</section>


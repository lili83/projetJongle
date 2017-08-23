<?php 
use Symfony\Component\HttpFoundation\Session\Session;
<<<<<<< HEAD
require_once("..\src\class\Article.php");
=======
require_once("../src/class/Article.php");
require_once ("../src/traitement/TraitementCategories.php");
use traitement\TraitementCategories;


>>>>>>> master
global $app;

 ?>
<section id="section_membre_2" class="contain-col maxWidht">
	<div class="contain">
		<span id="btn-profil">Mon profil</span>

<?php
if($objSession->get('niveau')>0) {

?>
		<span id="btn-mes-articles">Mes articles</span>
		<span id="btn-blog-membres">Blog membres</span>	
		<span id="btn-charte">charte</span>
<?php
	}
?>	
	</div>

<?php  

	/**
	*******************************************************************************
	*******************************************************************************	
	**	INFOS DU MEMBRE	
	*******************************************************************************
	*******************************************************************************	
	**/
	// Informations fournies par l'utilisateur
	// Si connecté, il peut les modifier à son gré
	if($objSession->get('email') != ""){
		$email = $objSession->get('email');
		$reqInfosUsr = "SELECT * FROM USER WHERE EMAIL = '$email'";

		$objetStatement = $app['db']->executeQuery($reqInfosUsr);
		if($infosUser = $objetStatement->fetch()){			
			extract($infosUser);
			$user = new User($infosUser);
?>		
	
	<section id="contenu">
		<div id="profil">
			<form action="" method="POST">
				<input type="hidden" name="id" value="<?php echo $user->id; ?>">
				<div class="contain">			
					<label>pseudo:</label>
					<input 
						type="text" 
						name="pseudo" 
						value="<?php echo $user->pseudo; ?>"
					>
				</div>
				<div class="contain">
					<label>email:</label>
					<input 
						type="email" 
						name="email"
						value="<?php echo $user->email; ?>"
						>
				</div>
				<div class="contain">
					<label>nom:</label>
					<input 
						type="text" 
						name="nom"
						value="<?php echo $user->nom; ?>"
					>
				</div>
				<div class="contain">
					<label>prenom:</label>
					<input 
						type="text" 
						name="prenom"
						value="<?php echo $user->prenom; ?>"
					>
				</div>
				<div class="contain-col">
					<label>resumé:</label>
					<textarea
						type="text" 
						name="resume"
						rows="5"
					><?php echo $user->resume; ?></textarea>
				</div> 
				<button>Modifier</button>
				<input type="hidden" name="traitementClass" value="
				<?php 
					if ($niveau>=10) 
						echo "updateAdmin";
					elseif ($niveau>1 && $niveau<10) 
						echo "updateUser";
				?>">
			</form>
		</div>	
<?php
		} 
	}

$niveauUser= $objSession->get('niveau');
if($niveauUser==0) {
echo 
<<<CODEHTML
<script type="text/javascript">
var ongletProfil = "profil";
</script>
CODEHTML;
}


if($objSession->get('niveau')>0) {


?>

		<div id="mes-articles">	
			<section class="contain-col">
			<a id="crea" href="<?php echo $app['url_generator']->generate('newArticle', ["id" => $user->id]); ?>">> Créer un article</a>
<?php
	/*
	*******************************************************************************
	*******************************************************************************	
	**	RECUPERATION DES ARTICLES DU MEMBRE
	*******************************************************************************
	*******************************************************************************
	*/

	$reqArticlesUsr = "SELECT * from article where id_user= $id";
	$objetStatement = $app['db']->executeQuery($reqArticlesUsr);	
	
	if($resArticles = $objetStatement->fetchAll()){	
		foreach($resArticles as $tabArticle){						
			$article = new Article($tabArticle, $user, $urlRoot);						
			echo $article->getHtmlMini();
		}
	}				
?>
			</section>
		</div>

<?php
	/*
	*******************************************************************************
	*******************************************************************************
	**	AFFICHAGE DES ARTICLES DES AUTRES MEMBRES
	*******************************************************************************
	*******************************************************************************
	*/
			
?>

		<div id="blog-membres">
			<div class="contain">
				<h1>nos recherches privées</h1>
				<form action="" method="GET" class="contain">
					<select id="select" name="categorie" required>
		                <option value="categorie">catégories</option>
<?php
	//	Récupération des catégories en BD
	$reqCategories = "select * from categorie";
	$objetStatement = $app['db']->executeQuery($reqCategories);
	if($categories = $objetStatement->fetchAll()){
		foreach($categories as $categorie){
			echo '<option id="'.$categorie['id'].'" value="'.$categorie['nom'].'">'.$categorie['nom'].'</option>';
		}
	}
?>
		            </select>
		            <button type="submit">> rechercher</button>
		            <input type="hidden" name="traitementClass" value="Categories">
				</form>
			</div>

			<section class="contain-col">

<?php
	//	Récupération des articles par catégories
	$traitementCategories = new TraitementCategories($this->request);
	$categorie= $traitementCategories->tabInfos['categorie'];
	if (!isset($categorie)) {
		// arrive sur la page
		// onglet charte
echo 
<<<CODEHTML
<script type="text/javascript">
var ongletActif = "";
</script>
CODEHTML;
		$nbArticles = 3;
		$indexDepart = $nbArticles * ($this->lireValeur("numPage") - 1);		
		$nbResultats = $app['db']->fetchColumn("SELECT COUNT(*) FROM article", []);
		$objStmnt = $app['db']->executeQuery("SELECT * FROM ARTICLE LIMIT $indexDepart, $nbArticles", []);	
		$reqArticles = "select * from article";
		$objetStatement = $app['db']->executeQuery($reqArticles);
		if($tabArticles = $objetStatement->fetchAll()){		
			foreach($tabArticles as $infosArticle){			
				$article = new Article($infosArticle,"", $urlRoot);		
				echo $article->getHtmlMini($urlRoot);
			}
		}

?>
		<nav>	
			<ul>
<?php
	//calculer le nombre de pag même si elle ne sont pas complètes avec ceil 
	$nombreDePages=ceil($nbResultats/$nbArticles);		
	for($i=1 ; $i <= $nombreDePages; $i++) {		
		$urlPage = $app["url_generator"]->generate("back-office/espace-membre/page", ["numPage" => $i]);		
		$uri        = $_SERVER["REQUEST_URI"];
    	$recherche  = parse_url($uri, PHP_URL_QUERY);
		echo "<li><a href='$urlPage?$recherche'>$i</a></li>";
	}
?>
			</ul>
		</nav>
<?php

	} else {
		// recherche
		if ($categorie!= "categorie"){
			// rechercher filtrée
			// onglet membre
echo 
<<<CODEHTML
<script type="text/javascript">
var ongletActif = "blog-membres";
</script>
CODEHTML;
			$nbArticles = 3;
			$indexDepart = $nbArticles * ($this->lireValeur("numPage") - 1);		
			$nbResultats = $app['db']->fetchColumn("SELECT COUNT(*) FROM article, categoriearticle, categorie
						WHERE categoriearticle.id_article = article.id
						AND categoriearticle.id_categorie = categorie.id
						AND categorie.nom = '$categorie'", []);

			$objStmnt = $app['db']->executeQuery("SELECT * FROM article, categoriearticle, categorie
						WHERE categoriearticle.id_article = article.id
						AND categoriearticle.id_categorie = categorie.id
						AND categorie.nom = '$categorie' 
						LIMIT $indexDepart, $nbArticles", []);
	

			$reqArticles = "SELECT * FROM article, categoriearticle, categorie
						WHERE categoriearticle.id_article = article.id
						AND categoriearticle.id_categorie = categorie.id
						AND categorie.nom = '$categorie'";
			$objetStatement = $app['db']->executeQuery($reqArticles);
			if($tabArticles = $objetStatement->fetchAll()){
		
				foreach($tabArticles as $infosArticle){			
					$article = new Article($infosArticle,"", $urlRoot);			
					echo $article->getHtmlMini($urlRoot);
				}
			}
?>
		<nav>	
			<ul>
<?php
	//calculer le nombre de pag même si elle ne sont pas complètes avec ceil 
	$nombreDePages=ceil($nbResultats/$nbArticles);		
	for($i=1 ; $i <= $nombreDePages; $i++) {		
		$urlPage = $app["url_generator"]->generate("back-office/espace-membre/page", ["numPage" => $i]);
		$uri        = $_SERVER["REQUEST_URI"];
    	$recherche  = parse_url($uri, PHP_URL_QUERY);
		echo "<li><a href='$urlPage?$recherche'>$i</a></li>";
		}
?>
			</ul>
		</nav>
<?php
		} else {
			// recherche toutes categories
			// onglet membre
echo 
<<<CODEHTML
<script type="text/javascript">
var ongletActif = "blog-membres";
</script>
CODEHTML;
		$nbArticles = 3;
		$indexDepart = $nbArticles * ($this->lireValeur("numPage") - 1);		
		$nbResultats = $app['db']->fetchColumn("SELECT COUNT(*) FROM article", []);
		$objStmnt = $app['db']->executeQuery("SELECT * FROM ARTICLE LIMIT $indexDepart, $nbArticles", []);	
		$reqArticles = "select * from article";
		$objetStatement = $app['db']->executeQuery($reqArticles);
		if($tabArticles = $objetStatement->fetchAll()){		
			foreach($tabArticles as $infosArticle){			
				$article = new Article($infosArticle,"", $urlRoot);		
				echo $article->getHtmlMini($urlRoot);
			}
		}
?>
		<nav>	
			<ul>
<?php
	//calculer le nombre de pag même si elle ne sont pas complètes avec ceil 
	$nombreDePages=ceil($nbResultats/$nbArticles);		
	for($i=1 ; $i <= $nombreDePages; $i++) {		
		$urlPage = $app["url_generator"]->generate("back-office/espace-membre/page", ["numPage" => $i]);
		$uri        = $_SERVER["REQUEST_URI"];
    	$recherche  = parse_url($uri, PHP_URL_QUERY);
		echo "<li><a href='$urlPage?$recherche'>$i</a></li>";
		}
?>
			</ul>
		</nav>	
<?php
		}
	}				
?>
			</section>						
		</div>
<!-- *********************************************************************************************************************************************************************************CHARTE*****************************************************************************************************************************************
 -->

		<div id="charte">
			<div class="contain-col">
				<h1>Charte du blog</h1>
				<article>
					<p>Bienvenue sur l’éditeur du blog de l’expédition !</p>
					<p>Pour commencer, nous vous proposons ce guide de rédaction. Avant de poster, <strong>pense</strong> ! Il est préférable de se demander si cet article sera :
					</p>
					<p>Positif. Le but est d’aller de l’avant, des textes positifs ne peuvent que soutenir votre idée.</p>
					<p>Exact. Prenez le temps de vérifier vos sources, voire de les publier à la fin de vos articles.</p>
					<p>Nécessaire. Votre point de vue est novateur et permet d’aider des jongleurs ? alors écrivez !</p>
					<p>Sage. Une idée est toujours plus percutante quand elle a pu être testé et muri par le temps.</p>
					<p>Enrichissant. Nous avons tous à y gagner, autant le lecteur que l’auteur.</p>
					<p>Pour le reste, nous comptons sur la motivation, la créativité et la bienveillance de chacun pour améliorer le contenu en privé. Vous êtes invités à aider les autres auteurs à rédiger leurs articles en les commentant dans la partie privée. Posez des questions, demandez des précisions, indiquez des coquilles ou des fautes de frappe. Cela peut être un bon moyen d’aider entre deux créations d’article.
					</p>
					<p>En espérant que cette aventure vous amuse autant que nous,  bonnes recherches :) </p>
					<p>Seul, on va plus vite, ensemble va plus loin...</p>
				</article>
			</div>
		</div>
<?php
	}
?>
	</section>	
</section>
<?php 

require_once("../src/class/Article.php");
require_once ("../src/traitement/TraitementCategories.php");
use traitement\TraitementCategories;

$nbArticles = 3;
$indexDepart = $nbArticles * ($this->lireValeur("numPage") - 1);		
$nbResultats = $app['db']->fetchColumn("SELECT COUNT(*) FROM article", []);
$objStmnt = $app['db']->executeQuery("SELECT * FROM ARTICLE LIMIT $indexDepart, $nbArticles", []);		
?>

<section id="section-blog" class="maxWidht">	
	<!-- **********************select catégories******************** -->
	<div class="contain">
		<h1>nos recherches</h1>		
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
		    <button type="submit"> rechercher</button>
		    <input type="hidden" name="traitementClass" value="Categories">
		</form>
	</div>
	<!-- **********************affichage des catégories**************** -->
	<section class="contain-col">
<?php
	//	Récupération des articles
	$traitementCategories = new TraitementCategories($this->request);	
	$categorie= $traitementCategories->tabInfos['categorie'];
	if (isset($categorie) && $categorie != "categorie")
	{
		//requete triée par catégorie
		
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
				

	} else

	{    
		//requete avec tous les articles
		$reqArticles = "select * from article";
		$objetStatement = $app['db']->executeQuery($reqArticles);
		if($tabArticles = $objetStatement->fetchAll()){
		
			foreach($tabArticles as $infosArticle){			
				$article = new Article($infosArticle,"", $urlRoot);			
				echo $article->getHtmlMini($urlRoot);
			}
		}
	}			
?>
	</section>
	

	
	<nav>	
		<ul>
<?php
	//calculer le nombre de pag même si elle ne sont pas complètes avec ceil 
	$nombreDePages=ceil($nbResultats/$nbArticles);		
	for($i=1 ; $i <= $nombreDePages; $i++) {		
		$urlPage = $app["url_generator"]->generate("blog/page", ["numPage" => $i]);
		echo "<li><a href=$urlPage>$i</a></li>";
	}
?>
		</ul>
	</nav>
</section>


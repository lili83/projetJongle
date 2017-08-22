<?php 
	require_once("..\src\class\Article.php");

	$nbArticles = 3;
	$indexDepart = $nbArticles * ($this->lireValeur("numPage") - 1);		
	$nbResultats = $app['db']->fetchColumn("SELECT COUNT(*) FROM article", []);
	$objStmnt = $app['db']->executeQuery("SELECT * FROM ARTICLE LIMIT $indexDepart, $nbArticles", []);		
?>

<section id="section-blog" class="maxWidht">	
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
	<section class="contain-col">
<?php
	//	Récupération des articles





	$reqArticles = "select * from article";
	$objetStatement = $app['db']->executeQuery($reqArticles);
	if($tabArticles = $objetStatement->fetchAll()){
		
		foreach($tabArticles as $infosArticle){			
			$article = new Article($infosArticle,"", $urlRoot);			
			echo $article->getHtmlMini($urlRoot);
		}
				
?>
			</section>
		</div>
<?php 
	}
?>
	
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


<?php 
<<<<<<< HEAD
	$nbArticles = 3;
	$indexDepart = $nbArticles * ($this->lireValeur("numPage") - 1);		
	$nbResultats = $app['db']->fetchColumn("SELECT COUNT(*) FROM article", []);
	$objStmnt = $app['db']->executeQuery("SELECT * FROM ARTICLE LIMIT $indexDepart, $nbArticles", []);
	while($tabLigne = $objStmnt->fetch()){
		extract($tabLigne);
		$routeUrl = $app["url_generator"]->generate("article", ["id" => $id]);
		echo
<<<CODEHTML
	<article>
		<h2>$titre</h2>		
		<p class="resume">$resume</p>
		<a href="$routeUrl">lien</a>
	</article>
CODEHTML;
=======

require_once("../src/class/Article.php");
require_once ("../src/traitement/TraitementCategories.php");
use traitement\TraitementCategories;
>>>>>>> master

	}
?>
<section id="section-blog" class="maxWidht">	
	<div class="contain">
		<h1>nos recherches</h1>
		<form action="" method="GET" class="contain">
			<select id="select" name="categorie" required>
                <option value="categorie">catégories</option>
                <option value="spectacle">spectacle</option>
                <option value="danse">danse</option>
                <option value="jongle">jongle</option>
                <option value="musique">musique</option>
            </select>
            <button type="submit">> rechercher</button>
            <input type="hidden" name="TraitementClass" value="Categories">
		</form>
	</div>
	<section class="contain-col">
<<<<<<< HEAD
		<article class="contain">
			<div>
				<figure>
					<img src="<?php echo $urlRoot; ?>/assets/img/test-blog.jpg" alt="photo de la recherche">
				</figure>
				<p>catégories: <span>danse, spectacle</span></p>
			</div>
			<div class="contain-col">
				<div class="contain">
					<h2>la balle noire</h2>
					<p>publié le 19/07/17 par <span>sidonie</span></p>
				</div>
				<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
				</p>
				<a href="#">> lire article</a>
			</div>
		</article>

		<article class="contain">
			<div>
				<figure>
					<img src="<?php echo $urlRoot; ?>/assets/img/test-blog2.jpg" alt="photo de la recherche">
				</figure>
				<p>catégories: <span>jongle, spectacle</span></p>
			</div>
			<div class="contain-col">
				<div class="contain">
					<h2>l’homme en bleu marine qui jongle</h2>
					<p>publié le 02/01/17 par <span>marc</span></p>
				</div>
				<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
				</p>
				<a href="#">> lire article</a>
			</div>
		</article>

		<article class="contain">
			<div>
				<figure>
					<img src="<?php echo $urlRoot; ?>/assets/img/test-blog3.jpg" alt="photo de la recherche">
				</figure>
				<p>catégories: <span>jongle, spectacle</span></p>
			</div>
			<div class="contain-col">
				<div class="contain">
					<h2>les objets volants</h2>
					<p>publié le 30/05/17 par <span>mia</span></p>
				</div>
				<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
				</p>
				<a href="#">> lire article</a>
			</div>
		</article>

		<article class="contain">
			<div>
				<figure>
					<img src="<?php echo $urlRoot; ?>/assets/img/test-blog4.jpg" alt="photo de la recherche">
				</figure>
				<p>catégories: <span>jongle, spectacle</span></p>
			</div>
			<div class="contain-col">
				<div class="contain">
					<h2>un mec de dos moche</h2>
					<p>publié le 07/03/17 par <span>christophe</span></p>
				</div>
				<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
				</p>
				<a href="#">> lire article</a>
			</div>
		</article>
	</section>
	<nav>	
	<ul>
=======
<?php
	//	Récupération des articles
	$traitementCategories = new TraitementCategories($this->request);	
	$categorie= $traitementCategories->tabInfos['categorie'];
	if (isset($categorie) && $categorie != "categorie")
	{
		//requete triée par catégorie
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
		$urlPage = $app["url_generator"]->generate("blog/page", ["numPage" => $i]);
		$uri        = $_SERVER["REQUEST_URI"];
    	$recherche  = parse_url($uri, PHP_URL_QUERY);
		echo "<li><a href='$urlPage?$recherche'>$i</a></li>";
	}
?>
			</ul>
		</nav>			
<?php
	} else

	{    

		$nbArticles = 3;
		$indexDepart = $nbArticles * ($this->lireValeur("numPage") - 1);		
		$nbResultats = $app['db']->fetchColumn("SELECT COUNT(*) FROM article", []);

		$objStmnt = $app['db']->executeQuery("SELECT * FROM ARTICLE LIMIT $indexDepart, $nbArticles", []);	

		//requete avec tous les articles
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
>>>>>>> master
<?php
	//calculer le nombre de pag même si elle ne sont pas complètes avec ceil 
	$nombreDePages=ceil($nbResultats/$nbArticles);		
	for($i=1 ; $i <= $nombreDePages; $i++) {		
		$urlPage = $app["url_generator"]->generate("blog/page", ["numPage" => $i]);
		$uri        = $_SERVER["REQUEST_URI"];
    	$recherche  = parse_url($uri, PHP_URL_QUERY);
		echo "<li><a href='$urlPage?$recherche'>$i</a></li>";
		}
?>
<<<<<<< HEAD
	</ul>
</nav>
=======
			</ul>
		</nav>
<?php
	}		
?>
	</section>
	
>>>>>>> master
</section>


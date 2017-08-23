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


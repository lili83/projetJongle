<section id="section_galerie_1" class="maxWidht">

		<h1><span>Nos recherches</span> dans la boite</h1>

<!-- galerie vidéo -->
		<div id="video_solo" class="contain">
<?php 
	$reqEvenements = "SELECT lien_url, id FROM media WHERE type='video' ORDER BY id DESC LIMIT 0, 1" ;
	$objStmnt = $app['db']->executeQuery($reqEvenements, []);
	$tabLigne = $objStmnt->fetch();
	extract($tabLigne);
	$idSolo = $id;	
	echo
<<<CODEHTML
<iframe width="560" height="315"  src="$lien_url" frameborder="0" allowfullscreen></iframe>
CODEHTML;
	
?>
		</div>

		<div id="video" class="contain">
<?php
	$nbEvenements = 4;	
	$indexDepart = $nbEvenements * ($this->lireValeur("numPage")-1 );		
	$nbResultats = $app['db']->fetchColumn("SELECT COUNT(*) FROM media  WHERE type='video'", []);	
	$reqEvenements= "SELECT lien_url FROM media WHERE type= 'video' AND id != $id LIMIT $indexDepart, $nbEvenements" ;
	$objStmnt = $app['db']->executeQuery($reqEvenements, []);
	while($tabLigne = $objStmnt->fetch())
	{
		extract($tabLigne);		
		echo
<<<CODEHTML
<div class="margin">
	<iframe width="560" height="315"  src="$lien_url" frameborder="0" allowfullscreen></iframe>
</div>
CODEHTML;
	}
?>
		</div>

		<div>
			<ul id="ul" class="contain">
<?php
	//calculer le nombre de pag même si elle ne sont pas complètes avec ceil
    $nombreDePages=ceil($nbResultats/$nbEvenements);
	for($i=1 ; $i <= $nombreDePages ; $i++) {		
	$urlPage = $app["url_generator"]->generate("galerie/page", ["numPage" => $i]);
	echo "<li><a href=$urlPage>$i</a></li>";
	}
?>
			</ul>
		</div>

		
<!-- galerie photo unitegallery -->
		<div id="gallery" style="display:none;">

<?php
	
	$reqEvenements = "SELECT * FROM media  WHERE type='photo' " ;
	$objStmnt = $app['db']->executeQuery($reqEvenements, []);
	while($tabLigne = $objStmnt->fetch())
	{
		extract($tabLigne);		
		echo
<<<CODEHTML
<img alt="$intitule" src="$urlRoot/assets/img/massonry/$lien_url.jpg"
data-image="$urlRoot/assets/img/massonry/$lien_url.jpg"
data-description="$intitule">
CODEHTML;
	}
?>
		</div>
</section>

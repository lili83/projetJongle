<section id="section_detailEvenement" class="maxWidht">
	<div>

<?php 	
	extract($this->infosDetail);
	$objStmnt = $app['db']->executeQuery("SELECT * FROM evenement WHERE id = '$id'");
	while($tabLigne = $objStmnt->fetch()){
		extract($tabLigne);
		$dateModif= date("d-m-Y", strtotime($date));
		echo
<<<CODEHTML
	<article>
		<h2>$titre</h2>
		<p>$lieu</p>
		<p>$dateModif</p>		
		<p>Description: $description<p>
	</article>
CODEHTML;

	}
 ?>
 	</div>

 	<a id="retour" href="<?php echo $app['url_generator']->generate('evenements')?>">Retour</a>
 </section>


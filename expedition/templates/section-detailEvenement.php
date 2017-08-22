<section id="section_detailEvenement" class="maxWidht">
<?php 	
	extract($this->infosDetail);
	$objStmnt = $app['db']->executeQuery("SELECT * FROM evenement WHERE id = '$id'");
	while($tabLigne = $objStmnt->fetch()){
		extract($tabLigne);
		$dateModif= date("d-m-Y", strtotime($date));
		echo
<<<CODEHTML
	<article>
		<h2>$lieu</h2>
		<h5>$dateModif</h5>		
		<p>Description: $description<p>
	</article>
CODEHTML;

	}
 ?>

 <a href="<?php echo $app['url_generator']->generate('evenements')?>">Retour</a>
 </section>


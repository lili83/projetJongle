<section id="section_evenements_1" class="maxWidht">

	<h1><span>Evénements</span> à venir...</h1>
	<div>
	  	<table>
	        <thead>
	            <tr>
	                <td>date</td>
	                <td>lieu</td>
	                <td>titre</td>
	                <td>description</td>
	                <td>détails</td>               
	            </tr>
	        </thead>
	        <tbody>
	
<?php 
	// A définir comment ?
	$dateJour= date("Y-m-d 00:00:00");	 	
	$reqEvenements = "SELECT * FROM evenement WHERE date>'$dateJour'  ORDER BY date " ;
	$objStmnt = $app['db']->executeQuery($reqEvenements, []);
	$index=0;
	while($tabLigne = $objStmnt->fetch())
	{
		extract($tabLigne);
		$routeUrl = $app["url_generator"]->generate("detailEvenement", ["id"=>$id]);
		$dateModif= date("d-m-Y", strtotime($date));
		
		if ($index%2 == 0) {
		echo 	
<<<CODEHTML
<tr class="color">
	<td>$dateModif</td>
	<td>$lieu</td>	
	<td>$titre</td>	
	<td>$description</td>
	<td><a href="$routeUrl">En savoir plus</a></td>
</tr>
CODEHTML;
		} else 
		{
		echo 	
<<<CODEHTML
<tr>
	<td>$dateModif</td>
	<td>$lieu</td>	
	<td>$titre</td>	
	<td>$description</td>
	<td><a href="$routeUrl">En savoir plus</a></td>
</tr>
CODEHTML;
		}
	$index++;	
	}
?>

		 	</tbody>
	    </table>
	</div>

   
</section> 

<!-- **********************************************************************************************************************************************EVENEMENTS PASSES****************************************************************************************************** -->
<section id="section_evenements_2" class="maxWidht">

	<h1><span>Evénements</span> passés...</h1>
		<div>
			<table>
				<thead>
				    <tr>
				        <td>date</td>
				        <td>lieu</td>
				        <td>titre</td>
				        <td>description</td>
				        <td>détails</td>               
				    </tr>
				</thead>
				<tbody>
	
<?php 
	// A définir comment ?
	$dateJour= date("Y-m-d 00:00:00");		
 	$nbEvenements = 20;	
	$indexDepart = $nbEvenements * ($this->lireValeur("numPage") - 1);		
	$nbResultats = $app['db']->fetchColumn("SELECT COUNT(*) FROM evenement WHERE date>'$dateJour'", []);	
	$reqEvenements = "SELECT * FROM evenement WHERE date<'$dateJour'  ORDER BY date LIMIT $indexDepart, $nbEvenements" ;
	$objStmnt = $app['db']->executeQuery($reqEvenements, []);
	$index=0;
	while($tabLigne = $objStmnt->fetch())
	{
		extract($tabLigne);
		$routeUrl = $app["url_generator"]->generate("detailEvenement", ["id"=>$id]);
		$dateModif= date("d-m-Y", strtotime($date));
		
	if ($index%2 == 0) {
		echo 	
<<<CODEHTML
<tr class="color">
	<td>$dateModif</td>
	<td>$lieu</td>	
	<td>$titre</td>	
	<td>$description</td>
	<td><a href="$routeUrl">En savoir plus</a></td>
</tr>
CODEHTML;
		} else 
		{
		echo 	
<<<CODEHTML
<tr>
	<td>$dateModif</td>
	<td>$lieu</td>	
	<td>$titre</td>	
	<td>$description</td>
	<td><a href="$routeUrl">En savoir plus</a></td>
</tr>
CODEHTML;
		}
	$index++;	
	}
?>

		 	</tbody>
	    </table>
	   </div>  
	    <ul>
    <?php
    	//calculer le nombre de pag même si elle ne sont pas complètes avec ceil
    	$nombreDePages=ceil($nbResultats/$nbEvenements);
		for($i=1 ; $i <= $nombreDePages ; $i++) {		
			$urlPage = $app["url_generator"]->generate("evenements/page", ["numPage" => $i]);
			echo "<li><a href=$urlPage>$i</a></li>";
		}
    ?>
    </ul>	
</section>
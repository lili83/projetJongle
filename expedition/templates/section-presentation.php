<!-- image bannière -->
<div id="banniere">
		<img id="img-after" src="<?php echo $urlRoot ?>/assets/img/presentation/jongle_presentation.jpg" alt="jongleur devant un mur">
</div>


<section id="section_presentation_1" class="maxWidht">
		<article>
			<h1 ><span>L'expédition...</span> C'est quoi?</h1>
			<p id="before">L’expédition est un projet artistique favorisant la recherche et le développement de la jonglerie.
			Pour cela, elle incite les jongleurs curieux, motivés, et désireux de travailler en groupe à se centrer sur 3 axes : </p>

			<p>La méthode des lancers harmoniques </p>
			<p>C’est une pédagogie ludique développant la capacité à travailler à plusieurs, grâce à l’intégration de la notion de rythme. </p>

			<p>La notation 3 couches</p>
			<p>C’est un système de notation de la jonglerie qui facilite le partage et la réflexion de chacun.</p>

			<p>Les spectacles</p>
			<p>Pour guider les réflexions, tester des hypothèses, et pour partager les découvertes, l’expédition réalise régulièrement des spectacles dans différents cadres (scène, rue, vidéos)</p>

			<p id="after"> Tous les travaux effectués sont pris en notes, mis en forme, et publiés sous forme d’articles dans le blog. Vous pouvez ainsi suivre les avancées de l’expédition au rythme de ses recherches.</p>
		</article>
		
		<!-- trombinoscope de l'équipe -->
		<section>
			<h1 ><span>L'expédition...</span> C'est qui?</h1>
			<p>l’expédition regroupe des artistes formés au rythme comme des jongleurs, des vidéastes, des danseurs ou des musiciens.</p>
			<!-- plus tard: à récupérer de la data base -->
			<div class="contain">
			<?php 
	// A définir comment ?	 	
	$reqUser = "SELECT * FROM user WHERE niveau>0" ;
	$objStmnt = $app['db']->executeQuery($reqUser, []);
	while($tabLigne = $objStmnt->fetch())
	{
		extract($tabLigne);
		
		echo 	
<<<CODEHTML
				<article>				    
						<img src="{$urlRoot}{$url_photo}" alt="photo de $pseudo">
						<p>$pseudo</p>					
				</article>
CODEHTML;
	}
?>
					
			</div>
		</section>
</section>
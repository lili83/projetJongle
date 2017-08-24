<section id="section-article_2">
	<div class="maxWidht">
		<h2>commentaires:</h2>
<?php
	require_once("../src/class/commentaire.php");
	$reqGetComment = "
	SELECT * 
	FROM commentaire JOIN user 
	ON commentaire.id_user = user.id 
	WHERE commentaire.id_article = $id
	ORDER BY date_envoi DESC";
	$resCommentaires = $app['db']->executeQuery($reqGetComment)->fetchAll();
	dump($resCommentaires);
	if (isset($resCommentaires)){
		foreach($resCommentaires as $infosCommentaire){
			$commentaire = new Commentaire($infosCommentaire, $urlRoot);
			echo $commentaire->getHtml();
		}
	}
?>		
	</div>
</section>
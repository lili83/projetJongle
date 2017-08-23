<section id="section-article_update" class="maxWidht contain-col">
<a id="firsta" href="<?php echo rtrim($this->request->headers->get('referer'),'/update'); ?>"> retour aux articles</a>
<?php 		
	require_once("../src/class/article.php");	
	
	$pseudo = $objSession->get("pseudo");
	$niveau = $objSession->get("niveau");

	extract($this->infosDetail);
	
		
	$requeteArticle = "
	SELECT * 
	FROM ARTICLE 
	WHERE ARTICLE.id = $id";
	$article = new Article($app['db']->executeQuery($requeteArticle)->fetch(),"", $urlRoot);	
	if (isset($article)){
		echo $article->getHtmlDetail($pseudo, $niveau);
	}
 ?>

 </section>
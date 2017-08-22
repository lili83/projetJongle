<section id="section-article" class="maxWidht">
<a href="<?php echo $app['url_generator']->generate("back-office/espace-membre"); ?>#mes-articles">retour aux articles</a>

<?php 		
	require_once("../src/class/article.php");
	
	extract($this->infosDetail);	
	
	$requeteArticle = "
	SELECT * 
	FROM ARTICLE 
	WHERE ARTICLE.id = $id";
	$article = new Article($app['db']->executeQuery($requeteArticle)->fetch(),"", $urlRoot);
	
	if (isset($article)){
		echo $article->getHtmlDetail();
	}
 ?>

 </section>
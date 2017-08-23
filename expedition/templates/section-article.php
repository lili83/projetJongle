<?php 
	$retour = '';
	if($objSession->get("niveau")>=10){
		 $retour = $app['url_generator']->generate("back-office/espace-admin"); 
	}
	if($objSession->get("niveau")>0 && $objSession->get("niveau") <10){
		 $retour = $app["url_generator"]->generate("back-office/espace-membre");
	}
?>

<section id="section-article" class="maxWidht">
<a id="firsta" href="<?php echo $retour;?>"> retour aux articles</a>
<?php 		
	require_once("../src/class/article.php");	
	
	$pseudo = $objSession->get("pseudo");
	$niveau = $objSession->get("niveau");
	dump($objSession);
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
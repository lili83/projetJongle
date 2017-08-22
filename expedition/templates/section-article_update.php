<section id="section-article" class="maxWidht">
<a href="<?php echo rtrim($this->request->headers->get('referer'),'/update'); ?>"> retour aux articles</a>
<?php 		
	require_once("../src/class/article.php");
	
	extract($this->infosDetail);	
	
	$requeteArticle = "
	SELECT * 
	FROM ARTICLE 
	WHERE ARTICLE.id = $id";
	$article = new Article($app['db']->executeQuery($requeteArticle)->fetch(),"", $urlRoot);

	if (isset($article)){
?>	
	<section id="contenu">
	<article class="contain-col">
	
        <form 	action = "<?php //echo $app['url_generator']->generate('articleUpdate', ['id' => $article->id]); ?>" 
        		method = "POST">
            
            
				<div class="contain-col">
				<input 	type="text" 
						name = "titre"
						value="<?php echo $article->titre; ?>" 
						placeholder="<?php echo $article->titre;?>">
				</div>
            
            
<?php
		
        if (isset($article->user->urlPhoto) && $article->user->urlPhoto != ""){    
?>
				<div class="contain-col">			                                   
			        <figure>
			            <img src="<?php echo $article->urlRoot.$article->user->urlPhoto; ?> " alt="Photo de profil">
			        </figure>
				</div>
			
<?php		
		}
?>
            <div class="contain">
                <label for ="resume">Résumé: 
                <textarea name="resume" value="resume"  cols="120">                                	
            		<?php echo $article->resume; ?>
                </textarea>
            </div>                

<?php        
			// On ajoute à l'URL des éventuelles images de l'article 
			// le vrai chemin du dossier des photos        
			$article->contenu = str_replace('<img src="', '<img src="'.$article->urlRoot, $article->contenu);         
?>

            <div class="contain">                        
                <textarea name="contenu" value="contenu" rows="50" cols="120">
                	<?php echo $article->contenu; ?>
            	</textarea>
            </div>                
			<div>
        		<button type="submit">Modifier</button>
            	<button type="reset">Annuler</button>
			</div>
			<input type="hidden" name="id" value="<?php echo $article->id;?>">
            <input type="hidden" name="traitementClass" value="UpdateArticle">
        </form>

	</article>	
<?php		
	}
?>

 </section>
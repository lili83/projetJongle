<section id="section-article_update" class="maxWidht contain-col">
<a id="firsta" href="<?php echo rtrim($this->request->headers->get('referer'),'/update'); ?>"> retour aux articles</a>
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
	<section>
	<article class="contain-col">
	
        <form 	action = "<?php //echo $app['url_generator']->generate('articleUpdate', ['id' => $article->id]); ?>" 
        		method = "POST">
            
            
				<div class="contain">
					<label for ="titre">titre: </label>
					<input 	type="text" 
							name = "titre"
							value="<?php echo $article->titre; ?>" 
							placeholder="<?php echo $article->titre;?>">
				</div>
            
            <div id="div2" class="contain">
                <label for ="resume">resumé: </label>
					<input 	type="text" 
							name = "resume"
							value="<?php echo $article->resume; ?>" 
							placeholder="<?php echo $article->resume;?>">
				</div>               

<?php        
			// On ajoute à l'URL des éventuelles images de l'article 
			// le vrai chemin du dossier des photos        
			$article->contenu = str_replace('<img src="', '<img src="'.$article->urlRoot, $article->contenu);         
?>

<<<<<<< HEAD
            <div class="contain">                        
                <textarea name="contenu" id="contenu" value="contenu" rows="50" cols="120">
                	<?php echo $article->contenu; ?>
            	</textarea>
				 <script>
					CKEDITOR.replace('contenu');
				</script>
=======
            <div class="contain-col"> 
            	<label for ="contenu">contenu: </label>                       
                <textarea id="CKEditor2" name="contenu" value="contenu">
                	<?php echo $article->contenu; ?>
            	</textarea>
            	<script>
	                // Replace the <textarea id="editor1"> with a CKEditor
	                // instance, using default configuration.
	                CKEDITOR.replace( 'CKEditor2', {
    filebrowserBrowseUrl: '/browser/browse.php',
    filebrowserUploadUrl: '/uploader/upload.php'
});
            	</script>
>>>>>>> master
            </div>                
			<div class="contain">
        		<button type="submit">Modifier</button>
            	<button type="reset">Annuler</button>
			</div>
			<input type="hidden" name="id" value="<?php echo $article->id;?>">
            <input type="hidden" name="traitementClass" value="updateArticle">
        </form>

	</article>	
<?php		
	}
?>
	</section>
 </section>
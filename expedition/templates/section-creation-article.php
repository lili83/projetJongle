<section id="section-creation-article" class="maxWidht contain-col">
<a id="firsta" href="<?php echo $app['url_generator']->generate("back-office/espace-membre"); ?>">retour mes articles</a>
	<section>
		<article class="contain-col">
		
	        <form 	action = "" 
	        		method = "POST">
	            
	            
					<div class="contain">
						<label for ="titre">titre: </label>
						<input 	type="text" 
								name = "titre"
								placeholder="titre de votre article">
					</div>
	            
	            <div id="div2" class="contain">
	                <label for ="resume">resumé: </label>
						<input 	type="text" 
								name = "resume"
								placeholder="le résumé de votre article">
					</div>               


	            <div class="contain-col"> 
	            	<label for ="contenu">contenu: </label>                       
	                <textarea id="CKEditor3" name="contenu" value="">Le contenu de votre article
	            	</textarea>
	            	<script>
	                // Replace the <textarea id="editor1"> with a CKEditor
	                // instance, using default configuration.
	                CKEDITOR.replace( 'CKEditor3', {
    filebrowserBrowseUrl: '/browser/browse.php',
    filebrowserUploadUrl: '/uploader/upload.php'
});
	            	</script>
	            </div>                
				<div class="contain">
	        		<button type="submit">créer article</button>
				</div>
	            <input type="hidden" name="traitementClass" value="Creation">
	            <input type="hidden" name="id_user" value="<?php echo $objSession->get("id"); ?>">
	        </form>

		</article>	

		</section>
	 </section>
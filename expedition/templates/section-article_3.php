<?php
if (null !== $objSession->get('email') && $objSession->get('email')!=''){
	$email = $objSession->get('email');
?>
<section id="section-article_3" class="maxWidht">
	<p>(pour commenter, il faut être connecté)</p>
	<h2>commentez cet article</h2>
	coucou
	<form id="commentaire" action="" method="POST">
		<input name="titre" placeholder="votre titre">
		<textarea name="texte" value="texte" placeholder="votre commentaire" rows="5"></textarea>
		<button type="submit" <?php if (isset($email)&& ($email == "")) echo "disabled"; ?>> publier</button>
		<input type="hidden" name="email_user" value="<?php if (isset($email)&& ($email == "")) echo $email; ?>">		
		<input type="hidden" name="id_article" value="<?php if (isset($email)&& ($email == "")) echo $id; ?>">
		<input type="hidden" name="traitementClass" value="Commentaire">
	</form>
</section>

<?php
}
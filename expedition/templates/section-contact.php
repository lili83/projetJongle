<section id="section_contact_1" class="maxWidht">
	
		<h1>Contactez-nous</h1>

		<form id="formContact">
			<input type="texte" name="nom" placeholder="nom">
			<input type="texte" name="nom" placeholder="prénom">
			<input type="email" name="email" placeholder="email">
			
			<textarea name="message"  rows=5 placeholder="message"></textarea>
			<input type="hidden" name="traitementClass" value="Contact">
			<div class="g-recaptcha" data-sitekey="6Lc1cSwUAAAAAKHiQ0HX9jhvx46VCHFbqZDBFmVS"></div>
			<button>Envoyer</button>
		</form>
		
		<div id="messageContact">		
		<?php  $this->afficherVarGlob("Contact"."Message"); ?>
		</div>
	
</section>
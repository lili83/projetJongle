<?php 
namespace traitement;
use Symfony\Component\HttpFoundation\Session\Session;
class TraitementCreation extends TraitementCommun{

	//
	//	Récupération des infos du formulaire dès le constructeur
	//
	function __construct($request){
		$this->request = $request;
		$this->creation();
	}

	function creation(){			
		global $app; 
		$this
			->traiterForm("Creation")
			->lireChamps("id_user")		
			->lireChamps("titre")
			->lireChamps("resume")
			->lireChamps("contenu")
			->ajouterNameValeur("date_publication", date("Y-m-d H:i:s"))
			->envoyer("article", "")		
			->setMessage("Creation de votre article réussie. Merci !");	

			$this->urlRedirection = $app["url_generator"]->generate("back-office/espace-membre");					
	}
}

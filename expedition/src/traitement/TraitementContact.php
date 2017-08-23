<?php 
namespace traitement;
class TraitementContact extends TraitementCommun{

	//
	//	Récupération des infos du formulaire dès le constructeur
	//
	function __construct($request){
		$this->request = $request;
		$this
			->traiterForm("Contact")
			->lireEmail("email")
			->lireChamps("nom")
			->lireChamps("message")	
			->ajouterNameValeur("date", date("Y-m-d H:i:s"))		
			->envoyer("Contact", "");

			->setMessage($this->tabMessages);
	}
}
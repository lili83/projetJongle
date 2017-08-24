<?php 
namespace traitement;
class TraitementCategorie extends TraitementCommun{

	//
	//	Récupération des infos du formulaire dès le constructeur
	//
	function __construct($request){
		$this->request = $request;
		$this
			->traiterForm("Categorie")			
			->lireChamps("nom")							
			->envoyer("categorie", "nom")
			->setMessage("La catégorie a bien été rajoutée");
	}
}
<?php 
namespace traitement;
class TraitementCategories extends TraitementCommun{
	//
	//	Récupération des infos du formulaire dès le constructeur
	//
	function __construct($request){
		$this->request = $request;		
		$this
			->traiterForm("Categories")			
			->lireChamps("categorie");
		return $this->tabInfos["categorie"];						
	}
}
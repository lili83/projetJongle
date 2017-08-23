<?php

namespace traitement;
class AfficherProfil extends TraitementCommun{

	//
	//	Récupération des infos du formulaire dès le constructeur
	//
	function __construct($request){
        dump($request);
        if ($request->isXMLHttpRequest()){

        }
    }
}
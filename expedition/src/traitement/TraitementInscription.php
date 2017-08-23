<?php 
namespace traitement;
use Symfony\Component\HttpFoundation\Session\Session;
class TraitementInscription extends TraitementCommun{

	//
	//	Récupération des infos du formulaire dès le constructeur
	//
	function __construct($request){
		$this->request = $request;
		$this->inscrire();
		return $this;
	}

	function inscrire(){			
		global $app; 
		$this
		->traiterForm("Inscription")			
		->lireEmail("email");
		if (!$this->emailExists()){
			$this
			->lireChamps("pseudo")
			->lirePassword("password", "password_crypt")	
			->ajouterNameValeur("date_inscription", date("Y-m-d H:i:s"))		
			->ajouterNameValeur("niveau", 0)
			->envoyer("user", "email")
			->setMessage("Inscription réussie. Bienvenue !");

			$objSession = new Session();
			$objSession->start();
			$objSession->set("email", $this->tabInfos["email"]);
			//	Redirection vers l'accueil ou le profil user			
			$this->urlRedirection = $app["url_generator"]->generate("back-office/espace-membre");
		}
		else{
			$this->setMessage("Cet email existe déjà.");
			$this->urlRedirection = $app["url_generator"]->generate("accueil");
		}						
	}
}
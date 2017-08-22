<?php 
namespace route;
use Silex\Application;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class Back extends RouteParent{		

	function membre(){		
		
		$objSession = new Session;

		//->verifier qu'il n'y a pas de session ouverte...
		$objSession->start();		
		$niveau = $objSession->get("niveau");

		if($niveau >= 1 && $niveau < 10 ){
			// if (null !== $this->request->get("traitement")){
			// 	$traitement = $this->request->get("traitement");
			// 	if($traitement == "update"){
			// 		$trait = new \traitement\TraitementUpdate($this->request);					
			// 	} 				
			// }
					
			return $this->construireHtml(["header","section-membre-2", "footer"]);			
		}
		else{				
			return $this->redirectToRoute("accueil");
		}
	}


	//
	//	MAJ d'un membre
	//

	function updateUser($id){
		
		$objSession = new Session;
		
		//->verifier qu'il n'y a pas de session ouverte...
		$objSession->start();
		$niveau = $objSession->get("niveau");		
		$trait = new \traitement\TraitementUpdate($this->request);
		
		return $this->construireHtml(["header","section-membre_update", "footer"]);				
	}

	


	function AfficherProfil() {
		global $app;
		return $this->redirectToRoute("AfficherProfil");
	}


	function deconnecter()
 	{	 		
 		// DETRUIRE LES INFOS DE SESSION
        // ON VA CREER UN OBJET DE LA CLASSE Session
        // NE PAS OUBLIER use Symfony\Component\HttpFoundation\Session\Session;
        $objetSession = new Session;
        // REPRENDRE UNE SESSION EXISTANTE 
        // OU DEMARRER UNE NOUVELLE SESSION
        $objetSession->start();
        // DETRUIRE LES INFOS
        $objetSession->set("email", "");
        $objetSession->set("level", "");
        $objetSession->set("login", "");
        
        // REDIRIGER VERS LA PAGE /login
        global $app;       
        // https://silex.symfony.com/doc/2.0/usage.html#redirects
        return $app->redirect($app["url_generator"]->generate("accueil")); 
    }


	//
	//	MAJ d'un article
	//
    function articleUpdate($id){
    	$objSession = new Session;	

		//->verifier qu'il n'y a pas de session ouverte...
		$objSession->start();
		$niveau = $objSession->get("niveau");		
		
		if($niveau >= 1 ){			
			$trait = new \traitement\TraitementUpdate($this->request);							 				
			$this->infosDetail["id"] = $id;
			return $this->construireHtml([	"header",
											"section-article_update", 
											"footer"]);		
		}
		else{						
			$this->infosDetail["id"] = $id;				
			return $this->construireHtml([	"header",
											"section-article", 
											"section-article_2", 
											"section-article_3", 
											"footer"]);		
    	}
	}

	//
	//	Affichage de la page admin
	//
	function admin(){
		global $app;
		// récup du $level depuis la session
		$objSession = new Session;
		$objSession->start();		
		// on ne construit que si le visiteur a le niveau suffisant
		if($objSession->get("niveau") >= 10)
			return $this->construireHtml(["header", "section-admin", "footer"]);		
		else{
			// https://silex.symfony.com/doc/2.0/usage.html#redirects
            return $this->redirectToRoute($app["url_generator"]->generate("accueil"));
		}
	}
}
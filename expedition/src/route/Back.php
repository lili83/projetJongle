<?php 
namespace route;
use src\traitement;
use Symfony\Component\HttpFoundation\Session\Session;

class Back extends RouteParent{		

/**
******************************************************************************
**	GESTON DES UTILISATEURS
******************************************************************************
**/

	function membre($numPage=1){
		global $app;
		// récup du $level depuis la session
		$objSession = new Session;
		$objSession->start();
		if($objSession->get("niveau") > 1 && $objSession->get("niveau") < 10){
			
			$this->infosDetail["numPage"] = $numPage;
			if (null !== $this->request->get("traitementClass")){
				
				$traitement = $this->request->get("traitementClass");				
				if($traitement == "updateUser"){				
					$trait = new \traitement\TraitementUpdate($this->request);					
				} 				
			}							
			return $this->construireHtml(["header","section-membre-2", "footer"]);
		}
		else{
			// https://silex.symfony.com/doc/2.0/usage.html#redirects
			return $this->redirectToRoute($app["url_generator"]->generate("accueil"));
		}					
	}	

	//
	//	Récupération du profil utilisateur
	//
	function afficherUser($id) {
		global $app;
		$objSession = new Session();		
		$objSession->start();		

		$infosUser = $app['db']->executeQuery("select * from user where id= $id")->fetch();		
		$objSession->set("infosUser", $infosUser);
		return $this->redirectToRoute("back-office/espace-admin");
	}

	//
	// Gestion des actions à mener sur l'utilisateur
	//
	function modifUser($id){
		$modif = $this->request->get("modifUser");
		
		if ($modif == 'Modifier')
			$this->updateUser($id, 'admin');

		elseif($modif == 'Supprimer')
			$this->deleteUser($id);

		return $this->redirectToRoute("back-office/espace-admin");
	}

	//
	//	MAJ d'un membre
	//
	function updateUser($id, $user=''){				
		$trait = new \traitement\TraitementUpdate($this->request);				
		if($user == "admin")
			return $this->redirectToRoute("back-office/espace-admin");
		else
			return $this->construireHtml(["header","section-membre-2", "footer"]);				
	}

	//
	//	Supression d'un membre
	//
	function deleteUser($id){
		global $app;					
		$app['db']->delete("user", ["id" => $id]);						
		return $this->redirectToRoute("back-office/espace-admin");
	}

	//
	//	Déconnexion du membre
	//
	function deconnecter()
 	{	 		
		 
 		// DETRUIRE LES INFOS DE SESSION
        // ON VA CREER UN OBJET DE LA CLASSE Session
        // NE PAS OUBLIER use Symfony\Component\HttpFoundation\Session\Session;
        $objSession = new Session;
        // REPRENDRE UNE SESSION EXISTANTE 
        // OU DEMARRER UNE NOUVELLE SESSION
        //$objetSession->start();
        // DETRUIRE LES INFOS
        $objSession->set("email", "");
        $objSession->set("niveau", "");
        $objSession->set("pseudo", "");
		$objSession->set("id", "");
		$objSession->clear();
		
        // REDIRIGER VERS LA PAGE /login
        global $app;       
        // https://silex.symfony.com/doc/2.0/usage.html#redirects
        return $app->redirect($app["url_generator"]->generate("accueil")); 
    }

/**
******************************************************************************
**	GESTON DES ARTICLES
******************************************************************************
**/

	//
	//	Creation d'article par un membre
	//
	function newArticle($id){		
		return $this->construireHtml(["header","section-creation-article", "footer"]);				
	}

	//
	//	MAJ d'un article
	//
	function articleUpdate($id){
		$objSession = new Session;	

		//->verifier qu'il n'y a pas de session ouverte...
		$objSession->start();
		$niveau = $objSession->get("niveau");		
		
		if($niveau > 1){			
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
	
/**
******************************************************************************
**	GESTON DES COMMENTAIRES
******************************************************************************
**/
	//
	//	Envoi d'un commentaire
	//
	function commentaire(){			
		// formulaire d'envoi de commentaire
		
		$traitement = new \traitement\TraitementCommentaire($this->request);
		$this->urlRedirection = $traitement->urlRedirection;		
		
		if ($this->urlRedirection == ""){			
			
			return $this->construireHtml([	"header", 
											"section-membre-2", 
											"footer"
										]);	
		}
		else{
			global $app;
			return $app->redirect($this->urlRedirection);
		}		
	}

	//
	//	Supression d'un commentaire
	//
	function deleteCommentaire(){			
		// formulaire d'envoi de commentaire		
		$this->request->query->set("traitementClass","delete");
		$traitement = new \traitement\TraitementCommentaire($this->request);
		$this->urlRedirection = $traitement->urlRedirection;		
		if ($this->urlRedirection == ""){
			return $this->construireHtml([	"header", 
											"section-admin", 
											"footer"
										]);		
					
		}
		else{
			global $app;
			return $app->redirect($this->urlRedirection);
		}		
	}

/**
******************************************************************************
**	GESTON DE L'ADMINISTRATEUR
******************************************************************************
**/
	//
	//	Affichage de la page admin
	//
	function admin($numPage=1){
		global $app;
		// récup du $level depuis la session
		$objSession = new Session;
		$objSession->start();		
		// on ne construit que si le visiteur a le niveau suffisant
		if($objSession->get("niveau") >= 10){

			$this->infosDetail["numPage"] = $numPage;			
			if (null !== $this->request->get("traitementClass")){
				$traitement = $this->request->get("traitementClass");
				if($traitement == "updateAdmin"){					
					$trait = new \traitement\TraitementUpdate($this->request);
				} 				
			}
				
			return $this->construireHtml(["header", "section-admin", "footer"]);		
		}
		else{
			// https://silex.symfony.com/doc/2.0/usage.html#redirects
            return $this->redirectToRoute($app["url_generator"]->generate("accueil"));
		}		
	}
}
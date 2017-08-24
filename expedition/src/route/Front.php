<?php 
namespace route;
use src\traitement;


class Front extends RouteParent
{

	//	traitement des formulaires de le header (connexion et inscription)
	function traitementFormHeader(){
		
		if(isset(	$this->request->request)
				&& 	$this->request->request->get('traitementClass')!=""){

			$traitement = $this->request->request->get('traitementClass');	
			
			switch($traitement){

				// formulaire de connexion			
				case "Connexion":{				
					return new \traitement\TraitementConnexion($this->request);												
				}
				
				// formulaire d'inscription
				case "Inscription": {				
					return new \traitement\TraitementInscription($this->request);
				}				
			}
		}
	}
/*
*******************************************************************************
*******************************************************************************
**	EVENEMENTS
*******************************************************************************
*******************************************************************************
*/
	function evenements($numPage = 1){	
		$this->infosDetail["numPage"] = $numPage;
		return $this->construireHtml(["header", "section-evenements", "footer"]);
	}

	// Route dynamique avec $url fourni par Silex
	function detailEvenement($id){	
		$this->infosDetail["id"] = $id;
		return $this->construireHtml(["header", "section-detailEvenement", "footer"]);
	}

/*
*******************************************************************************
*******************************************************************************
**	PAGES STATIQUES
*******************************************************************************
*******************************************************************************
*/

	function accueil(){	
		return $this->construireHtml(["header", "section-accueil", "section-accueil_2", "section-accueil_3", "section-accueil_4", "footer"]);
	}

	function contact(){			
		return $this->construireHtml(["header", "section-contact", "footer"]);		
	}

	function presentation(){	
		return $this->construireHtml(["header", "section-presentation", "footer"]);
	}

	function notation(){			
		return $this->construireHtml(["header", "section-notation", "footer"]);
	}

	function methode(){			
		return $this->construireHtml(["header", "section-methode", "footer"]);
	}

/*
*******************************************************************************
*******************************************************************************
**	Partie blog et articles du blog
*******************************************************************************
*******************************************************************************
*/
	function blog($numPage = 1){
		//$this->traitementFormHeader();
		$this->infosDetail["numPage"] = $numPage;
		return $this->construireHtml(["header", "section-blog", "footer"]);
	}

	function article($id){
		//$this->urlRedirection = $this->traitementFormHeader();
		if ($this->urlRedirection!=""){
			global $app;
            return $app->redirect($this->urlRedirection);
		}
		else{
			$this->infosDetail["id"] = $id;				
			return $this->construireHtml(["header", "section-article","section-article_2", "section-article_3", "footer"]);
		}
	}
	
	//
	//	Photos publiques
	//
	function galerie($numPage = 1){	
		$this->traitementFormHeader();	
		$this->infosDetail["numPage"] = $numPage;		
		return $this->construireHtml(["header", "section-galerie", "footer"]);
	}

	

/*
*******************************************************************************
*******************************************************************************
**	Ajout d'un utilisateur
*******************************************************************************
*******************************************************************************
*/

	function inscription(){			
		// Verification des données entrées
		$this->urlRedirection = $this->traitementFormHeader()->urlRedirection;
		
		if ($this->urlRedirection == "")		
	
			return $this->construireHtml([	"header", 
											"section-accueil", 
											"section-accueil_2", 
											"section-accueil_3", 
											"section-accueil_4", 
											"footer"
										]);	
		else{

			global $app;
            return $app->redirect($this->urlRedirection);
		}	
	}

/*
*******************************************************************************
**	Connexion d'un utilisateur
*******************************************************************************
*/
	function connexion(){		
	
		$this->urlRedirection = $this->traitementFormHeader()->urlRedirection;		

		if ($this->urlRedirection == "")			
			return $this->construireHtml([	"header", 
											"section-accueil", 
											"section-accueil_2", 
											"section-accueil_3", 
											"section-accueil_4", 
											"footer"
										]);	
		else{
			global $app;
            return $app->redirect($this->urlRedirection);
		}		
	}


	
	
}


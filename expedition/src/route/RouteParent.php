<?php 

namespace route;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

//	CODE COMMUN AU FRONT ET BACK
class RouteParent{
	public $request = null;
	public $codeHtml = '';
	public $infosDetail = [];
	public $cheminTemplate = "";
	public $urlRedirection = "";

	function __construct(){	
		$this->cheminTemplate = __DIR__."/../../templates";	
		// Utilisation de la classe Request de Symfony pour 
		// un traitement généraliste des form
		$this->request = Request::createFromGlobals();
		
		// Equivalent du lireChamps utilisé auparavant : 
		$traitementClass = $this->request->get("traitementClass");
		// dump($traitementClass);
		if ($traitementClass != ""){			
			// echo "il faut traiter le form $traitementClass ! ";		
			$nomClasse = "\\traitement\\Traitement$traitementClass";
			if(class_exists($nomClasse)){
				// Création d'un objet à partir d'une classe définie dynamiquement				
				$objetTraitement = new $nomClasse($this->request);
				  // RECUPERER L'INFO SI IL FAUT FAIRE UNE REDIRECTION
                $this->urlRedirection = $objetTraitement->urlRedirection;
			}
		}
	}

	protected function construireHtml($listePartPage){		
		global $app;			
		//$request = Request::createFromGlobals();
		$urlRoot = $this->request->getBasePath();
		//	--	TECHNIQUE DE BUFFERING
		//	(Pour éviter l'echo direct, on "dévie" ce que l'on veut afficher 
		//	 vers une zone temporaire.)		
		ob_start();		
		foreach ($listePartPage as $part) {
			require_once("$this->cheminTemplate/$part.php");
		}
		return ob_get_clean();	
	}

/*
*******************************************************************************
**	Affiche une var globale si elle existe
*******************************************************************************
*/
	function afficherVarGlob($nomMsg){
		if (isset($GLOBALS[$nomMsg]))
			echo $GLOBALS[$nomMsg];
	}

	// POUR RECUPERER LA VALEUR DANS UNE VARIABLE
    public function lireValeur($cle){    	
        if (isset($this->infosDetail[$cle]))
            return $this->infosDetail[$cle];
        else
            return "";
    }

    public function afficherValeur(){
 		if (isset($this->infosDetail[$cle]))
            echo $this->infosDetail[$cle];
    }

  // FAIT UNE REDIRECTION VERS UNE ROUTE
    function redirectToRoute ($nomRoute, $tabParamRoute=[])
    {
        global $app;

        $urlRoute = $app["url_generator"]->generate($nomRoute, $tabParamRoute);
        // https://silex.symfony.com/doc/2.0/usage.html#redirects
        return $app->redirect($urlRoute); 
    }	
}
<?php 
namespace traitement;
use Symfony\Component\HttpFoundation\Session\Session;

class TraitementConnexion extends TraitementCommun{
	
	//
	//	Récupération des infos du formulaire dès le constructeur
	//
	function __construct($request){
		$this->request = $request;
		$this->connecter();
			
	}

	// CONNEXION D'UN UTILISATEUR
	function connecter(){
		// Vérification de l'existence de l'adresse mail ds la bd
		$this
			->traiterForm("Connexion")			
			->lireEmail("email");

		if ($this->emailExists()){
			//	Vérification de la concordance du mot de passe
			//	avec celui présent en BD
			if($this
				->lireChamps("password")
				->verifPassword()){
				//	Récupération du niveau de l'utilisateur:
				//	Cela permet de savoir si on a affaire à 
				//	un membre ou un admin (pages différentes) 
				$this
					->lireChamps("niveau")
					->setMessage("Connexion réussie ! ");	

				$infosUser = $this->getInfosUser();				
				extract($infosUser);
				
				// Démarrage ou reprise de la session 
				$objSession = new Session;	
				
				// if ($objSession->isStarted())
				// 	$objSession = $this->request->getSession();
				// else					
				// 	$objSession->start();
				
				// Mémorisation des infos utilisateur
				$objSession->set('id', $id);
				$objSession->set("email", $email);
				$objSession->set("pseudo", $pseudo);
				$objSession->set("niveau", $niveau);

				//	Redirection vers l'accueil ou le profil user
				global $app; 
				if(intval($niveau) == 1){														
					$this->urlRedirection = $app["url_generator"]->generate("back-office/espace-membre");					
				}
				if ($niveau>=10){	
					$this->urlRedirection = $app["url_generator"]->generate("back-office/espace-admin");
				}
			}
			else{
				$this->setMessage("Erreur de mot de passe");				
			}
		}
		else{
			$this->setMessage("Erreur d'email");						
		}
	}

	//
	//	Méthode de vérification du mot de passe
	//
	function verifPassword(){
		global $app;
		$reqPwdHash = <<<CODESQL
SELECT PASSWORD_CRYPT
FROM USER 
WHERE EMAIL LIKE '{$this->tabInfos["email"]}'
CODESQL;

		return password_verify(
								$this->tabInfos["password"],
								$app['db']->fetchColumn($reqPwdHash)
								);
	}

	//
	//	Récupération des informations de l'utilisateur grace à son email
	//
	function getInfosUser(){
		global $app;
        $objetStatement = $app['db']->executeQuery("SELECT * FROM User WHERE email = :email",
        											[ ":email" => $this->tabInfos["email"] ]); 

       return $objetStatement->fetch();        
	}

	// 
	// DECONNEXION
	//	
	function deconnecter(){
		//	Destruction des infos de session
		$session = new Session;
		$session->start();
		$session->set("email", "");
		$session->set("login","");
		$session->set("level","");
		
		// Redirection vers la page de login
		$this->redirectToRoute("Connexion", []);		
	}
}
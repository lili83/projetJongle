<?php	
namespace traitement;

class TraitementCommun{
	public $request = null;
	public $tabInfos = [];
	public $traitement = "";
	public $isConnected = false;
	public $isInscrit = false;
	public $urlRedirection = "";

	function __construct($request){		
		$this->request = $request;
	}

	function lireChamps($nomChamps){	
		$this->tabInfos["$nomChamps"] = $this->request->get("$nomChamps");
		return $this;
	}
	
	function lireEmail($email){
		// Mais manque la vérification de l'email
		return $this->lireChamps($email);
	}
	
	function lirePassword($password, $nomCol){
		$pwd = $this->request->get("$password");
		$pwdHash = password_hash($pwd,PASSWORD_DEFAULT);		
		$this->tabInfos["$nomCol"] = $pwdHash;
		return $this ;
	}

	// Vérification de l'existence d'un email dans la BD
	function emailExists(){
		global $app;
		$email = $this->tabInfos["email"];
		$req = "SELECT COUNT(*) FROM user WHERE email LIKE '$email'";		
		return $this->isInscrit = ($app['db']->fetchColumn($req) > 0);		
	}

	function envoyer($nomTable, $colUnique){
		// $colUnique est utilisé pour vérifier l'unicité  d'un champ
		//	...
		global $app;
		
		$app['db']->insert("$nomTable", $this->tabInfos);
		return $this;
	}

	function mettreAJour($nomTable, $id){
		global $app;		
		$app['db']->update("$nomTable", 
							$this->tabInfos,
							["id"=>$id]);
		return $this;
	}

	


	function traiterForm($traitement){
		$this->traitement = $traitement;
		return $this;
	}

	function setMessage($msg){		
		$nomVarErreur = $this->traitement."Message";
		$GLOBALS["$nomVarErreur"] = $msg;
		return $this;
	}

	//
	//	Ajout'une valeur a $this->tabInfos
	//	
	function ajouterNameValeur($name, $valeur){
		$this->tabInfos[$name] = $valeur;
		return $this;
	}

}
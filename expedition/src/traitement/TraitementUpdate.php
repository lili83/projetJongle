<?php

namespace traitement;

use Symfony\Component\HttpFoundation\Session\Session;

class TraitementUpdate
    extends TraitementCommun
{
    public $route;
    
    function __construct ($request)
    {
        global $app;
        $objSession = new Session;
        $niveau = $objSession->get("niveau");
        $this->route = "";
        $this->request =$request;
        
         
        // ON VERIFIE SI LE LEVEL EST SUFFISANT
        if ($niveau >= 10)
        {
            // ON VA modifier LA LIGNE
            // ON RECUPERE LES AUTRES INFOS DU FORMULAIRE
            $nomTable = $request->get("nomTable");
            $idLigne  = $request->get("idLigne");
            $login  = $request->get("login");    
            
            // ON VEUT UN ENTIER
            $idLigne = intval($idLigne);
            
            // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html
            $app["db"]->update($nomTable, ["id" => $idLigne], ["login"=>$login]);        
            $route = "espace-admin";
        }
        else if ($niveau >0 && $niveau < 10){
            $traitement = $this->request->get('traitementClass');
            
            $this->route = "espace-membre";
           
            switch($traitement){                
                case 'UpdateUser':{
                    $this
                        ->traiterForm("UpdateUser")
                        ->lireChamps("nom")
                        ->lireChamps("prenom")
                        ->lireChamps("pseudo")
                        ->lireChamps("resume")                                            	
                        ->ajouterNameValeur("date_modification", date("Y-m-d H:i:s"))		
                        ->mettreAJour("user", $this->request->request->get("id"))
                        ->setMessage("Merci pour votre message.");                      
                    break;
               }
               case 'UpdateArticle':{                   
                    $this
                        ->traiterForm("UpdateArticle")            
                        ->lireChamps("titre")
                        ->lireChamps("resume")
                        ->lireChamps("contenu")                                                 
                        ->ajouterNameValeur("date_modification", date("Y-m-d H:i:s"))		
                        ->mettreAJour("article", $this->request->request->get("id"))
                        ->setMessage("Merci pour votre message.");                                            
                        $this->route = "article";
                    break;
                }
            }                                 
        }        
        return $this->route ;
    }
}
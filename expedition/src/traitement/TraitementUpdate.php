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
        if ($niveau >= 10){
            $traitement = $this->request->get('traitementClass');            
            $this->route = "espace-membre";
             switch($traitement){                
                case 'updateAdmin':{
                    $this
                        ->traiterForm("UpdateAdmin")
                        ->lireChamps("id")
                        ->lireChamps("nom")
                        ->lireChamps("prenom")
                        ->lireChamps("pseudo")
                        //->lireChamps("imgProfil")
                        ->lireChamps("resume")                        
                        ->ajouterNameValeur("date_modification", date("Y-m-d H:i:s"))		
                        ->mettreAJour("user", $this->request->request->get("id"));                        
                    $this->route = "espace-admin";
                    break;
               }
            }            
        }
        else if ($niveau >0 && $niveau < 10){
            $traitement = $this->request->get('traitementClass');            
            $this->route = "espace-membre";
            
            switch($traitement){                
                case 'updateUser':{
                    $this
                        ->traiterForm("UpdateUser")
                        ->lireChamps("nom")
                        ->lireChamps("prenom")
                        ->lireChamps("pseudo")
                        //->lireChamps("imgProfil")
                        ->lireChamps("resume")                                            	
                        ->ajouterNameValeur("date_modification", date("Y-m-d H:i:s"))		
                        ->mettreAJour("user", $this->request->request->get("id"));                        
                    break;
               }               
               case 'updateArticle':{                   
                    $this
                        ->traiterForm("UpdateArticle")            
                        ->lireChamps("titre")
                        ->lireChamps("resume")
                        ->lireChamps("contenu")                                                 
                        ->ajouterNameValeur("date_modification", date("Y-m-d H:i:s"))		
                        ->mettreAJour("article", $this->request->request->get("id"));                                            
                        $this->route = "article";
                    break;
                }
            }                                 
        }        
        return $this->route ;
    }
}
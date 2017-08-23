<?php

namespace traitement;
use Symfony\Component\HttpFoundation\Session\Session;

class TraitementCommentaire
    extends TraitementCommun
{
    // METHODES
    // CONSTRUCTEUR
    function __construct ($request)
    {
        $this->request = $request;        
        global $app;
            
        //  Suppression d'un commentaire
        if (isset($this->request->query) && $this->request->query->get("traitementClass")=="delete"){
            
            $this
            ->traiterForm("DeleteCommentaire")            
            ->supprimer("Commentaire", $this->request->query->get("id"))
            ->setMessage("Commentaire supprimé");
            $this->urlRedirection = $app["url_generator"]->generate("back-office/espace-admin");
        }
        
        //  Création d'un commentaire
        else{
            $res = $app['db']->executeQuery("  SELECT * 
                                        from user 
                                        where email = '".$this->request->request->get("email_user")."'");
            
            if($tabUser = $res->fetch()){
                $id_article = $this->request->request->get('id_article');                
                $this
                ->traiterForm("Commentaire")            
                ->lireChamps("titre")	    
                ->lireChamps("texte")        
                ->lireChamps("id_article")	            	
                ->ajouterNameValeur("id_user", $tabUser["id"])	
                ->ajouterNameValeur("date_envoi", date("Y-m-d H:i:s"))		
                ->envoyer("Commentaire", "");
                $this->urlRedirection = $app["url_generator"]->generate("article",["id" => $id_article]);
            }
        }
    }
}
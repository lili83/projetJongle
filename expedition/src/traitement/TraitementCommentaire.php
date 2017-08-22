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
        //dump($this->request);
        global $app;
        $res = $app['db']->executeQuery("  SELECT * 
                                    from user 
                                    where email = '".$this->request->request->get("email_user")."'");
        $tabUser = $res->fetch();                                            
        
        // ON VERIFIE SI LE LEVEL EST SUFFISANT
        if ($tabUser['niveau'] >= 1)
        {
            $id_article = $this->request->request->get('id_article');
            // global $app;
            // $app["db"]->insert( "Commentaire", 
            //                     [
            //                         'id_user' => $tabUser['id'],
            //                         'id_article' => $id_article,
            //                         'titre' => $this->request->request->get('titre'),
            //                         'texte' => $this->request->request->get('txtCommentaire'),
            //                         'date_envoi' => date("Y-m-d H:i:s")
            //                     ]);
            // // On retourne vers la page de l'article
            // $this->urlRedirection = $app["url_generator"]->generate("article",["id" => $id_article]);
            
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
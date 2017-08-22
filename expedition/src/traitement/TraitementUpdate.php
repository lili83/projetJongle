<?php

namespace controller;

use Symfony\Component\HttpFoundation\Session\Session;

class TraitementUpdate
    extends ControllerParent
{
    // METHODES
    // CONSTRUCTEUR
    function __construct ($request, $level)
    {
        // ON VERIFIE SI LE LEVEL EST SUFFISANT
        if ($level >= 10)
        {
            // ON VA modifier LA LIGNE
            // ON RECUPERE LES AUTRES INFOS DU FORMULAIRE
            $nomTable = $request->get("nomTable");
            $idLigne  = $request->get("idLigne");
            $login  = $request->get("login");    
            
            // ON VEUT UN ENTIER
            $idLigne = intval($idLigne);
            
            // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#delete
            global $app;
            $app["db"]->update($nomTable, ["id" => $idLigne], ["login"=>$login]);
        }

    }
}
<?php	
namespace route;

//	ROUTES POUR LE BACK-OFFICE
//	PROTEGEES PAR UN LOGIN

// ROUTE POUR LA PAGE /back-office/espace-membre
$app
->match('/back-office/espace-membre/', "\\route\\Back::membre")
->bind('back-office/espace-membre')
;

// ROUTE POUR LA PAGE /back-office/espace-admin
$app
->match('/back-office/espace-admin', "\\route\\Back::admin")
->bind('back-office/espace-admin')
;
//
//  GESTION DES MEMBRES 
//
//  Route pour la modification d'un membre

$app
->match('/back-office/espace-membre/{id}/update', "\\route\\Back::updateUser")
->bind('updateUser')
;
//  Route pour la création d'un membre
$app
->match('/back-office/espace-membre/create', "\\route\\Back::createUser")
->bind('createUser')
;
//  Route pour la suppression d'un membre
$app
->match('/back-office/espace-membre/delete', "\\route\\Back::deleteUser")
->bind('deleteUser')
;

//
//  GESTION DES ARTICLES
//
// Route pour la creation d'un article
$app->match('/article/create ',"\\route\\Back::articleCreate")
->bind('articleCreate')
;
// Route pour la modification d'un article
$app->match('/article/{id}/update ',"\\route\\Back::articleUpdate")
->bind('articleUpdate')
;
// Route pour la supression d'un article
$app->match('/article/{id}/delete ',"\\route\\Back::articleDelete")
->bind('articleDelete')
;


$app
->match('/back-office/espace-membre/{id}/update', "\\route\\Back::updateUser")
->bind('updateUser')
;
//  Route pour la création d'un membre
$app
->match('/back-office/espace-membre/create', "\\route\\Back::createUser")
->bind('createUser')
;
//  Route pour la suppression d'un membre
$app
->match('/back-office/espace-membre/delete', "\\route\\Back::deleteUser")
->bind('deleteUser')
;

$app
->match('/back-office/AfficherProfil', "\\route\\Back::AfficherProfil")
->bind('AfficherProfil	')
;
// ROUTE POUR LA PAGE DU PROFIL DE L'UTILISATEUR
// $app->get('/users', "\\route\\Back::users")
// ->bind('users')
// ;
// $app->get('/users/{userName}', "\\route\\Back::users")
// ->bind('users')
// ;


//
//  GESTION DES ARTICLES
//
// Route pour la creation d'un article
$app->match('/article/create ',"\\route\\Back::articleCreate")
->bind('articleCreate')
;
// Route pour la modification d'un article
$app->match('/article/{id}/update ',"\\route\\Back::articleUpdate")
->bind('articleUpdate')
;
// Route pour la supression d'un article
$app->match('/article/{id}/delete ',"\\route\\Back::articleDelete")
->bind('articleDelete')
;

$app
->get('/deconnexion', "\\route\\Back::deconnecter")
->bind('deconnexion')
;
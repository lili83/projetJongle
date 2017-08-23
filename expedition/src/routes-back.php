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

$app
->match('/back-office/espace-membre/{id}/update', "\\route\\Back::updateUser")
->bind('updateUser')
;
//  Route pour la création d'un nouvel article par un membre
$app
->match('/back-office/espace-membre/{id}/new_article', "\\route\\Back::newArticle")
->bind('newArticle')
;
//  Route pour la création d'un membre
$app
->match('/back-office/espace-membre/create', "\\route\\Back::createUser")
->bind('createUser')
;
//  Route pour la suppression d'un membre
$app
->match('/back-office/espace-membre/{id}/delete', "\\route\\Back::deleteUser")
->bind('deleteUser')
;

// Route pour la pagination
$app
->match('/back-office/espace-membre/page/{numPage}', "\\route\\Back::membre")
->bind('back-office/espace-membre/page')
;

// Route pour la pagination
$app
->match('/back-office/espace-admin/page/{numPage}', "\\route\\Back::admin")
->bind('back-office/espace-admin/page')
;

$app
->match('/back-office/AfficherProfil', "\\route\\Back::AfficherProfil")
->bind('AfficherProfil	')
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

// ROUTE le post d'un commentaire
$app->post('/commentaire', "\\route\\Back::commentaire")
->bind('commentaire')
;
//  Suppression d'un commentaire
$app->post('/commentaire/{$id}/delete', "\\route\\Back::deleteCommentaire")
->bind('commentaire')
;

$app
->get('/deconnexion', "\\route\\Back::deconnecter")
->bind('deconnexion')
;
<?php 
namespace route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->get('/evenements', "\\route\\Front::evenements")
->bind('evenements')
;
// ROUTE POUR LA PAGINATION
$app->get('/evenements/page/{numPage}', "\\route\\Front::evenements")
->bind('evenements/page')
;

$app->get('/evenement/{id}', "\\route\\Front::detailEvenement")
->bind('detailEvenement')
;

// ROUTE POUR LA PAGE D'ACCUEIL
$app->get('/', "\\route\\Front::accueil")
->bind('accueil')
;

// ROUTE POUR LA PAGE DE CONTACT
$app->get('/contact',"\\route\\Front::contact")
->bind('contact')
;

// ROUTE POUR LA PAGE DE PRESENTATION (membres et projet)
$app->get('/presentation',"\\route\\Front::presentation")
->bind('presentation')
;

// ROUTE POUR LA PAGE DE NOTATION
$app->get('/notation',"\\route\\Front::notation")
->bind('notation')
;
// ROUTE POUR LA PAGE DE METHODE
$app->get('/methode',"\\route\\Front::methode")
->bind('methode')
;
// ROUTE POUR LA PAGE DE GALERIE
$app->get('/galerie',"\\route\\Front::galerie")
->bind('galerie')
;

// ROUTE POUR LA PAGINATION
$app->get('/galerie/page/{numPage}', "\\route\\Front::galerie")
->bind('galerie/page')
;

// ROUTE POUR LA PAGE DU BLOG
//	On route également pour les éventuels erreurs ds la barre d'adresse
$app->get('/blog',"\\route\\Front::blog")
->bind('blog')
;

$app->get('/blog/page/{numPage}',"\\route\\Front::blog")
->bind('blog/page')
;

// ROUTE POUR LA PAGE D'UN ARTICLE
$app->match('/article/{id}', "\\route\\Front::article")
->bind('article')
;

// ROUTE POUR LA PAGE D'INSCRIPTION D'UN UTILISATEUR
// (MATCH --> POUR UTILISER POST ET GET)
$app->post('/inscription',"\\route\\Front::inscription")
->bind('inscription');

// ROUTE POUR LA PAGE DE CONNEXION D'UN UTILISATEUR
$app->post('/connexion', "\\route\\Front::connexion")	
->bind('connexion')
;

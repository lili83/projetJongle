<?php	
namespace route;

//	ROUTES POUR LE BACK-OFFICE
//	PROTEGEES PAR UN LOGIN

// ROUTE POUR LA PAGE /back-office/espace-membre
$app
->get('/back-office/espace-membre', "\\route\\Back::membre")
->bind('back-office/espace-membre')
;
// ROUTE POUR LA PAGE /back-office/espace-admin
$app
->get('/back-office/espace-admin', "\\route\\Back::admin")
->bind('back-office/espace-admin')
;

$app
->get('/deconnexion', "\\route\\Back::deconnecter")
->bind('deconnexion')
;
// ROUTE POUR LA PAGE DU PROFIL DE L'UTILISATEUR
// $app->get('/users', "\\route\\Back::users")
// ->bind('users')
// ;
// $app->get('/users/{userName}', "\\route\\Back::users")
// ->bind('users')
// ;

// ROUTE POUR LA PAGE DE CONNEXION
// $app->get('/connexion/{login}{pwdHash} ',"\\route\\Back::connexion")
// ->bind('connexion')
// ;

// ROUTE POUR LA PAGE D'INSCRIPTION'
// $app->get('/inscription',"\\route\\Back::inscription")
// ->bind('inscription')
// ;
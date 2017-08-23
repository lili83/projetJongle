// FONCTIONS

// fonction qui permet d'afficher un element au click
// qui prend deux parametre le selecteur du bouton et en second l'eleement à afficher 
function afficherElement(ClickButton, element){
	$(ClickButton).click(function(){
		$(element).fadeIn();
	})
	return ;
}
// fonction qui permet d'afficher un elements tout en cachant les autres
function cacherElement(ClickButton, element){
	$(ClickButton).click(function(){
		$(element).hide();
	})
	return ;
}
// fonction qui permet d'afficher un elements tout en cachant les autres
function afficherCacherElement(ClickButton, element1,element2){
	$(ClickButton).click(function(){
		$(element1).show();
		$(element2).hide();
	})
	return ;
}
// fonction qui permet d'afficher un elements tout en cachant les autres 
function afficherCacherElements(ClickButton, elementAffiche, elementCache1,
	elementCache2, elementCache3, bouton2, bouton3, bouton4){
	$(ClickButton).click(function(){
		$(elementAffiche).show();
		$(elementCache1).hide();
		$(elementCache2).hide();
		$(elementCache3).hide();
		$(this).animate({"padding-top" : "2rem", "margin-top" : "0", "border-bottom" : "0"} ,"fast");
		$(this).css({
						"color" : "#1DCCDB",
						"background" : "white"
					});
		$(bouton2).animate({"padding-top" : "1rem", "margin-top" : "1rem"} ,"fast");
		$(bouton2).css({
						"borderBottom": "1px solid black",
						"color" : "white",
						"background" : "#1DCCDB"
					});
		$(bouton3).animate({"padding-top" : "1rem", "margin-top" : "1rem"} ,"fast");
		$(bouton3).css({
						"borderBottom": "1px solid black",
						"color" : "white",
						"background" : "#1DCCDB"
					});
		$(bouton4).animate({"padding-top" : "1rem", "margin-top" : "1rem"} ,"fast");
		$(bouton4).css({
						"borderBottom": "1px solid black",
						"color" : "white",
						"background" : "#1DCCDB"
					});
	})
	return ;
}
var $window = $(window);
var largeur_fenetre = $(window).width();

$window.scroll(function () {
	if(($(window).width() > 1000) && ($(window).width() < 1300)){
	    if ($window.scrollTop() > 200){
	       $( "#figure-1" ).animate({ "top": "11rem" }, 3500 )
	       $( "#article-1" ).animate({ "top": "42rem" }, 3500 )
	    }
	    if ($window.scrollTop() > 900){
	       $( "#figure-2" ).animate({ "top": "7rem" }, 3500 )
	       $( "#article-2" ).animate({ "top": "30rem" }, 3500 )
	    }
	    if ($window.scrollTop() > 1600){
	       $( "#figure-3" ).animate({ "top": "10rem" }, 3000 )
	       $( "#article-3" ).animate({ "top": "31rem" }, 3000 )
	    }
	}
	else if ($(window).width() > 1300){
		if ($window.scrollTop() > 200){
	       $( "#figure-1" ).animate({ "top": "0" }, 3500 )
	       $( "#article-1" ).animate({ "top": "42rem" }, 3500 )
	    }
	    if ($window.scrollTop() > 900){
	       $( "#figure-2" ).animate({ "top": "4rem" }, 3500 )
	       $( "#article-2" ).animate({ "top": "30rem" }, 3500 )
	    }
	    if ($window.scrollTop() > 1600){
	       $( "#figure-3" ).animate({ "top": "5rem" }, 3000 )
	       $( "#article-3" ).animate({ "top": "31rem" }, 3000 )
	    }
	}
	else if (($(window).width() > 600) && ($(window).width() < 1000) ){
		if ($window.scrollTop() > 200){
	       $( "#figure-1" ).animate({ "top": "11rem" }, 3500 )
	       $( "#article-1" ).animate({ "top": "42rem" }, 3500 )
	    }
	    if ($window.scrollTop() > 900){
	       $( "#figure-2" ).animate({ "top": "7rem" }, 3500 )
	       $( "#article-2" ).animate({ "top": "30rem" }, 3500 )
	    }
	    if ($window.scrollTop() > 1600){
	       $( "#figure-3" ).animate({ "top": "10rem" }, 3000 )
	       $( "#article-3" ).animate({ "top": "31rem" }, 3000 )
	    }
	}
	else if ($(window).width() <= 600) {
		if ($window.scrollTop() > 200){
	       $( "#figure-1" ).animate({ "top": "0" }, 3500 )
	       $( "#article-1" ).animate({ "top": "19rem" }, 3500 )
	    }
	    if ($window.scrollTop() > 900){
	       $( "#figure-2" ).animate({ "top": "0rem" }, 3500 )
	       $( "#article-2" ).animate({ "top": "19rem" }, 3500 )
	    }
	    if ($window.scrollTop() > 1600){
	       $( "#figure-3" ).animate({ "top": "0rem" }, 3000 )
	       $( "#article-3" ).animate({ "top": "19rem" }, 3000 )
	    }
	}
});

// APPELS FONCTIONS

afficherElement('#btn-menu', '#menu');
afficherElement('#btn-connexion', '#login');
afficherCacherElement('#btn-inscription', '#inscription','#login');
cacherElement('#btn-close', '#menu');
cacherElement('#btn-close2', '#login');
cacherElement('#btn-close3', '#inscription');


afficherCacherElements("#btn-profil", "#profil", "#mes-articles", "#blog-membres", "#charte","#btn-blog-membres","#btn-mes-articles","#btn-charte");
afficherCacherElements("#btn-blog-membres", "#blog-membres", "#mes-articles", "#profil", "#charte","#btn-profil","#btn-mes-articles","#btn-charte");
afficherCacherElements("#btn-mes-articles", "#mes-articles", "#profil", "#blog-membres", "#charte","#btn-blog-membres","#btn-profil","#btn-charte");
afficherCacherElements("#btn-charte", "#charte", "#mes-articles", "#blog-membres", "#profil","#btn-blog-membres","#btn-mes-articles","#btn-profil");

afficherCacherElements("#btn-profil", "#profil", "#mes-articles", "#blog-membres", "#tableau-de-bord","#btn-blog-membres","#btn-mes-articles","#btn-tableau-de-bord");
afficherCacherElements("#btn-blog-membres", "#blog-membres", "#mes-articles", "#profil", "#tableau-de-bord","#btn-profil","#btn-mes-articles","#btn-tableau-de-bord");
afficherCacherElements("#btn-mes-articles", "#mes-articles", "#profil", "#blog-membres", "#tableau-de-bord","#btn-blog-membres","#btn-profil","#btn-tableau-de-bord");
afficherCacherElements("#btn-tableau-de-bord", "#tableau-de-bord", "#mes-articles", "#blog-membres", "#profil","#btn-blog-membres","#btn-mes-articles","#btn-profil");










/*
span id="btn-profil">Mon profil</span>
		<span id="btn-mes-articles">Mes articles</span>
		<span id="btn-blog-membres">Blog membres</span>	
		<span id="btn-charte">charte de l'expédition</span>	
	</div>
	<section id="contenu">
		<div id="profil">
			<p>section profil</p>
		</div>
		<div id="mes-articles">
			<p>section mes articles</p>
		</div>
		<div id="blog-membres">
			<p>section blog membre</p>
		</div>
		<div id="charte">
			<p>section charte</p>
		</div>
  */








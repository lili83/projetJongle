
function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}

//  $(".id").on("click", function(){
//     preventDefault();
//     console.log($(".id").val());
//     displayLastMessages($("select#nbMsg").val());  
//     return false
// });

//Je récupère l'id du lien et je crée un évènement
document.querySelectorAll('.fiche-profil').forEach(function(element) {
    element.addEventListener('click', function(){
        var id= element.id;
        console.log(id);
        
        //je crée une requete pour récupérer mes données
        var requete = new XMLHttpRequest();        
        var root= getBaseUrl();
        //console.log(root);
        // //j'utilise .open pour préciser que je veux récupérer les données dans le fichier AfficherProfil
        requete.open('GET', root+'AfficherProfil');
                console.log(requete);
        // //quand les données sont récupérées, je récupère le contenu sous forme de texte, et je l'intègre à index.html dans la div "contenu"
        requete.onload= function() {
            var html= requete.responseText;
            console.log(html);
        }
                
        // //j'envoie la requete
        // requete.send();
    })
    
}, this);






function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}




//Je récupère l'id du lien et je crée un évènement
document.querySelector('.fiche-profil').addEventListener('click', function(){
        var id= document.querySelector('.id').value;
        console.log(id);
        //je crée une requete pour récupérer mes données
        var requete = new XMLHttpRequest();
        
        var root= getBaseUrl();
        //j'utilise .open pour préciser que je veux récupérer les données dans le fichier AfficherProfil
        requete.open('GET', 'AfficherProfil');
                
        //quand les données sont récupérées, je récupère le contenu sous forme de texte, et je l'intègre à index.html dans la div "contenu"
        requete.onload= function() {
            var html= requete.responseText;
            console.log(html);
        }
                
        //j'envoie la requete
        requete.send();
    })



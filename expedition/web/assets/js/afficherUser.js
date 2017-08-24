//
//  Mise en majuscule de la première lettre d'une chaîne de caractères
//
function ucFirst(str){
    return str.charAt(0).toUpperCase() + str.slice(1);
}
//
//  Fonction d'affichage' d'un nouveau profil
//
function getProfile(){
    // const image = document.querySelector('#image');
    // const nom = document.querySelector('span#nom');
    // const age = document.querySelector('#age');
    // const email = document.querySelector('#email');
    // const genre = document.querySelector("#icoGenre i");

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "", );
    $.getJSON("./chat.php?tache=lire&nbMsg="+nbMsg, function(data){
        const user = JSON.parse(xhr.responseText).results[0];
        console.log(user.name.title);
        // image du profil
        image.src = user.picture.large;
        
        // email
        email.textContent = user.email;
        
        // calcul de l'âge
        var today = new Date();    //   date du jour
        var dob = new Date(user.dob);
        age.textContent = today.getUTCFullYear() - dob.getUTCFullYear() + " ans";
        
        // titre et nom complet avec mise en majuscule de la 1ere lettre
        var title = user.name.title;
        if (title == "miss")
            title = "Mademoiselle";
        else if(title == "mr") 
            title = "Monsieur";
        else if(title == "mrs" || title == "ms") 
            title = "Madame";        
        nom.innerHTML = title + " " + ucFirst(user.name.first) + " <strong> " + ucFirst(user.name.last) + "</strong>";
        
        
    }
    xhr.send();
}

/*
*******************************************************************************
*******************************************************************************
 * On lie l'affichage d'un nouveau profil aux boutons
 *******************************************************************************
 *******************************************************************************
 */
getProfile();
document.querySelectorAll(".fiche_profil").forEach(function(lienUser){
    console.log("coucou")
    lienUser.addEventListener("click", getProfile);
});
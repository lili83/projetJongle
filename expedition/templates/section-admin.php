<section>
    <h3>ESPACE ADMIN</h3>
</section>

<section>
    <h3>LISTE DES UTILISATEURS</h3>
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>login</td>
                <td>email</td>
                <td>update</td>
                <td>delete</td>
            </tr>
        </thead>
        <tbody>
<?php
// AFFICHER LA LISTE DES Users
$objetStatement = $app['db']->executeQuery("SELECT * FROM User", []);

// ON PARCOURT CHAQUE LIGNE TROUVEE PAR LA REQUETE
while( $tabLigne = $objetStatement->fetch() )
{
    // RECUPERER LES COLONNES DANS DES VARIABLES
    // http://php.net/manual/fr/function.extract.php
    extract($tabLigne);
    
    // URL DES ACTIONS DELETE ET UPDATE
    // FORGER UNE REQUETE GET (SANS PASSER PAR UN FORMULAIRE)
    $urlDelete = "?traitementClass=Delete&nomTable=User&idLigne=$id";
    $urlUpdate = "?traitementClass=Update&nomTable=User&idLigne=$id";
    
    echo
<<<CODEHTML
    <tr>
        <td>$id</td>
        <td>$login</td>
        <td>$email</td>
        <td><a href="$urlUpdate">update</a></td>
        <td><a href="$urlDelete">delete</a></td>
    </tr>
CODEHTML;

}

?>
        </tbody>
    </table>
</section>

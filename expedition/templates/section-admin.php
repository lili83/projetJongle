<?php 
use Symfony\Component\HttpFoundation\Session\Session;
 ?>
<section id="section_membre_2" class="contain-col maxWidht">
    <div class="contain">
        <span id="btn-profil">Mon profil</span>
        <span id="btn-mes-articles">Mes articles</span>
        <span id="btn-blog-membres">Blog membres</span> 
        <span id="btn-tableau-de-bord">Tableau de bord</span> 
    </div>
    <section id="contenu">
        <div id="profil">
            <form action="" method="post">
                <div class="contain">
<?php  
    // Informations fournies par l'utilisateur
    // Si connecté, il peut les modifier à son gré
    // ** tests de sécurité : session started, email verified, id user and email and passwordhashed match 
    //if (isset($_SESSION["email"]) && ($_SESSION["email"] != ""))
    if($objSession->get('email') != ""){
        
        $email = $objSession->get('email');
        $reqInfosUsr = "SELECT * FROM USER WHERE EMAIL = '$email';";
        global $app;        
        $objetStatement = $app['db']->executeQuery($reqInfosUsr);
        if($res = $objetStatement->fetch()){           
            extract($res);
            // dump($id);
?>              
                    <label>pseudo:</label>
                    <input 
                        type="text" 
                        name="pseudo" 
                        value="<?php echo $pseudo; ?>"
                    >
                </div>
                <div class="contain">
                    <label>email:</label>
                    <input 
                        type="email" 
                        name="email"
                        value="<?php echo $email; ?>"
                        >
                </div>
                <div class="contain">
                    <label>nom:</label>
                    <input 
                        type="text" 
                        name="nom"
                        value="<?php echo $nom; ?>"
                    >
                </div>
                <div class="contain">
                    <label>prenom:</label>
                    <input 
                        type="text" 
                        name="prenom"
                        value="<?php echo $prenom; ?>"
                    >
                </div>
                <div class="contain-col">
                    <label>resumé:</label>
                    <textarea
                        type="text" 
                        name="resume"
                        rows="5"
                    ><?php echo $resume; ?>
                </textarea>
                </div> 
                <input 
                    type="text" 
                    name="login"
                    value=" <?php echo $pseudo;?>"
                >
                <button>Modifier</button>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="hidden" name="traitementClass" value="Update">
            </form>
<?php
        } 
    }
?>
        </div>
        <div id="mes-articles">
            <section class="contain-col">
                <article class="contain">
                    <div>
                        <figure>
                            <img src="<?php echo $urlRoot; ?>/assets/img/test-blog.jpg" alt="photo de la recherche">
                        </figure>
                        <p>catégories: <span>danse, spectacle</span></p>
                    </div>
                    <div class="contain-col">
                        <div class="contain">
                            <h2>la balle noire</h2>
                            <p>publié le 19/07/17 par <span>sidonie</span></p>
                        </div>
                        <p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
                        </p>
                        <a href="#">> lire article</a>
                    </div>
                </article>
            </section>
        </div>
        <div id="blog-membres">
            <div class="contain">
                <h1>nos recherches privées</h1>
                <form action="" method="GET" class="contain">
                    <select id="select" name="categorie" required>
                        <option value="categorie">catégories</option>
                        <option value="spectacle">spectacle</option>
                        <option value="danse">danse</option>
                        <option value="jongle">jongle</option>
                        <option value="musique">musique</option>
                    </select>
                    <button type="submit">> rechercher</button>
                    <input type="hidden" name="traitementClass" value="Categories">
                </form>
            </div>
            <section class="contain-col">
                <article class="contain">
                    <div>
                        <figure>
                            <img src="<?php echo $urlRoot; ?>/assets/img/test-blog.jpg" alt="photo de la recherche">
                        </figure>
                        <p>catégories: <span>danse, spectacle</span></p>
                    </div>
                    <div class="contain-col">
                        <div class="contain">
                            <h2>la balle noire</h2>
                            <p>publié le 19/07/17 par <span>sidonie</span></p>
                        </div>
                        <p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
                        </p>
                        <a href="#">> lire article</a>
                    </div>
                </article>

                <article class="contain">
                    <div>
                        <figure>
                            <img src="<?php echo $urlRoot; ?>/assets/img/test-blog2.jpg" alt="photo de la recherche">
                        </figure>
                        <p>catégories: <span>jongle, spectacle</span></p>
                    </div>
                    <div class="contain-col">
                        <div class="contain">
                            <h2>l’homme en bleu marine qui jongle</h2>
                            <p>publié le 02/01/17 par <span>marc</span></p>
                        </div>
                        <p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
                        </p>
                        <a href="#">> lire article</a>
                    </div>
                </article>

                <article class="contain">
                    <div>
                        <figure>
                            <img src="<?php echo $urlRoot; ?>/assets/img/test-blog3.jpg" alt="photo de la recherche">
                        </figure>
                        <p>catégories: <span>jongle, spectacle</span></p>
                    </div>
                    <div class="contain-col">
                        <div class="contain">
                            <h2>les objets volants</h2>
                            <p>publié le 30/05/17 par <span>mia</span></p>
                        </div>
                        <p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
                        </p>
                        <a href="#">> lire article</a>
                    </div>
                </article>

                <article class="contain">
                    <div>
                        <figure>
                            <img src="<?php echo $urlRoot; ?>/assets/img/test-blog4.jpg" alt="photo de la recherche">
                        </figure>
                        <p>catégories: <span>jongle, spectacle</span></p>
                    </div>
                    <div class="contain-col">
                        <div class="contain">
                            <h2>un mec de dos moche</h2>
                            <p>publié le 07/03/17 par <span>christophe</span></p>
                        </div>
                        <p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...
                        </p>
                        <a href="#">> lire article</a>
                    </div>
                </article>
            </section>  
        </div>

        <div id="tableau-de-bord">
            <section>
                <h2>Gestion des utilisateurs</h2>
                <div>
                    <h3>Liste des utilisateurs</h3>
                    <table>
                        <thead>
                            <tr>
                                <td>Pseudo</td>
                                <td>Nom</td>
                                <td>Mail</td>
                                <td>Fiche</td>                                             
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                        $reqEvenements = "SELECT * FROM user ORDER BY pseudo " ;
                        $objStmnt = $app['db']->executeQuery($reqEvenements, []);
                        $index=0;
                        while($tabLigne = $objStmnt->fetch())
                        {
                            extract($tabLigne);
                            if ($index%2 == 0) 
                            {
                                echo 
<<<CODEHTML
    <tr class="color">
        <td>$pseudo</td>
        <td>$nom</td>
        <td>$email</td>
        <td><a href="" class="fiche-profil" >Acceder à la fiche</a></td>
        <input type="hidden" class="id" value="$id"/>
    </tr>
CODEHTML;
                            } else 
                            {
                                echo 
<<<CODEHTML
    <tr>
        <td>$pseudo</td>
        <td>$nom</td>
        <td>$email</td>
        <td><a href="" class="fiche-profil">Acceder à la fiche</a></td>
        <input type="hidden" class="id" value="$id"/>
    </tr>
CODEHTML;
                            }
                        $index++;
                        }                        
                    ?>
                        </tbody>
                    </table>
                </div>
            </section>







            <section>
                <h2>Profil de <?php echo $pseudo; ?></h2>
                <!-- FAIRE LA REQUETE EN AJAX -->
                <form action="" method="post">
                    <div class="contain">
                        <label>pseudo:</label>
                        <input 
                            type="text" 
                            name="pseudo" 
                            value="<?php echo $pseudo; ?>"
                        >
                    </div>
                    <div class="contain">
                        <label>email:</label>
                        <input 
                            type="email" 
                            name="email"
                            value="<?php echo $email; ?>"
                            >
                    </div>
                    <div class="contain">
                        <label>nom:</label>
                        <input 
                            type="text" 
                            name="nom"
                            value="<?php echo $nom; ?>"
                        >
                    </div>
                    <div class="contain">
                        <label>prenom:</label>
                        <input 
                            type="text" 
                            name="prenom"
                            value="<?php echo $prenom; ?>"
                        >
                    </div>
                    <div class="contain-col">
                        <label>resumé:</label>
                        <textarea
                            type="text" 
                            name="resume"
                            rows="5"
                        >
                        <?php echo $resume; ?>

                    </textarea>
                    </div>
                    <div class="contain-col">
                        <label>niveau:</label>
                        <input 
                            type="text" 
                            name="niveau"
                            value="<?php echo $niveau; ?>"
                        >
                    </div>               
                    <input type="submit" name="modifier" value="Modifier"/>
                    <input type="submit" name="supprimer" value="Supprimer"/>
                </form>
            </section>
            <section>
                <h2>Ajouter une nouvelle catégorie</h2>
                <form action="" method="POST">
                    <input type="text" name="nom" placeholder="nom de la nouvelle catégorie"/>
                    <button type="submit">Valider</button>
                    <input type="hidden" name="traitementClass" value="Categorie"/>
                </form>
                <div id="messageCategorie">     
                    <?php  $this->afficherVarGlob("Categorie"."Message"); ?>
                </div>
            </section>

            <section>
                <h2>Gestion des commentaires</h2>
                <h3>listes des commentaires</h3>
                 <table>
                        <thead>
                            <tr>
                                <td>Id utilisateur</td>
                                <td>Commentaire</td>
                                <td>Supprimer</td>                                                                     
                            </tr>
                        </thead>
                        <tbody>
                <?php
                    $reqEvenements = "SELECT * FROM commentaire";
                    $objStmnt = $app['db']->executeQuery($reqEvenements, []);
                    while($tabLigne = $objStmnt->fetch()) 
                    {
                        extract($tabLigne);
                        if ($index%2 == 0) 
                        {
                            echo
<<<CODEHTML
        <tr class="color">
            <td>$id_user</td>
            <td>$texte</td>
            <td><a href="">Supprimer</a></td>
        </tr>
CODEHTML;
                        } else
                        {
                            echo
<<<CODEHTML
        <tr>
            <td>$id_user</td>
            <td>$texte</td>
            <td><a href="">Supprimer</a></td>
        </tr>
CODEHTML;
                        }
                    $index++;
                    }
                ?>
                    </tbody>
                </table>
            </section>
        </div>
    </section>  
</section>



<script type='text/javascript' src='<?php echo $urlRoot; ?>/assets/js/ajax.js'></script>
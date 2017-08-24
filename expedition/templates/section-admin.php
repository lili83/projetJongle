<?php 
use Symfony\Component\HttpFoundation\Session\Session;
require_once("..\src\class\Article.php");
use traitement\TraitementCategories;
require_once("../src/traitement/TraitementCategories.php");


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
    
    if($objSession->get('email') != ""){
        
        $email = $objSession->get('email');
        $reqInfosUsr = "SELECT * FROM USER WHERE EMAIL = '$email';";
        global $app;        
        $objetStatement = $app['db']->executeQuery($reqInfosUsr);

        if($infosUser = $objetStatement->fetch()){           
            extract($infosUser);
            $user = new User($infosUser);

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
                <input type="hidden" name="traitementClass" value="updateAdmin">
            </form>
<?php
        } 
    }
?>
        </div>
        <div id="mes-articles"> 
            <section class="contain-col">
            <a id="crea" href="<?php echo $app['url_generator']->generate('newArticle', ["id" => $user->id]); ?>">> Créer un article</a>
<?php
    /*
    *******************************************************************************
    ******************************************************************************* 
    **  RECUPERATION DES ARTICLES DU MEMBRE
    *******************************************************************************
    *******************************************************************************
    */

    $reqArticlesUsr = "SELECT * from article where id_user= $id";
    $objetStatement = $app['db']->executeQuery($reqArticlesUsr);    
    
    if($resArticles = $objetStatement->fetchAll()){ 
        foreach($resArticles as $tabArticle){                       
            $article = new Article($tabArticle, $user, $urlRoot);                       
            echo $article->getHtmlMini();
        }
    }               
?>
            </section>

        </div>

        <div id="mes-articles">	
			<section class="contain-col">
<?php
		} 
	}
/*
*******************************************************************************
*******************************************************************************	
**	RECUPERATION DES ARTICLES DU MEMBRE
*******************************************************************************
*******************************************************************************
*/
	$reqArticlesUsr = "SELECT * from article where id_user= $id";
	$objetStatement = $app['db']->executeQuery($reqArticlesUsr);	
	
    if($resArticles = $objetStatement->fetchAll()){	
		
		foreach($resArticles as $tabArticle){						
			$article = new Article($tabArticle, $user, $urlRoot);						
			echo $article->getHtmlMini();
		}
	}				
?>
			</section>
		</div>

<?php
/*
*******************************************************************************
*******************************************************************************
**	AFFICHAGE DES ARTICLES DES AUTRES MEMBRES
*******************************************************************************
*******************************************************************************
*/
?>
		<div id="blog-membres">
			<div class="contain">
				<h1>nos recherches privées</h1>
				<form action="" method="GET" class="contain">
					<select id="select" name="categorie" required>
		                <option value="categorie">catégories</option>
<?php
	//	Récupération des catégories en BD
	$reqCategories = "select * from categorie";
	$objetStatement = $app['db']->executeQuery($reqCategories);
	if($categories = $objetStatement->fetchAll()){
		foreach($categories as $categorie){
			echo '<option id="'.$categorie['id'].'" value="'.$categorie['nom'].'">'.$categorie['nom'].'</option>';
		}
	}
?>
		            </select>
		            <button type="submit">> rechercher</button>
		            <input type="hidden" name="traitementClass" value="Categories">
				</form>
			</div>



			<section class="contain-col">


<?php
	//	Récupération des articles

    //  Si une catégorie a été selectionnée, on ne prend que les articles 
    //  de cette catégorie
    $traitementCategories = new TraitementCategories($this->request);	
	$categorie= $traitementCategories->tabInfos['categorie'];
    $reqArticles = "";
	if (isset($categorie) && $categorie != "categorie")
	{
		$reqArticles = "SELECT article.*, categorie.nom FROM article, categoriearticle, categorie
						WHERE categoriearticle.id_article = article.id
						AND categoriearticle.id_categorie = categorie.id
						AND categorie.nom = '$categorie'";
    }
    else{
	    $reqArticles = "select * from article";
    }

	$objetStatement = $app['db']->executeQuery($reqArticles);
	if($tabArticles = $objetStatement->fetchAll()){
		
		foreach($tabArticles as $infosArticle){			
			$article = new Article($infosArticle,"", $urlRoot);			
			echo $article->getHtmlMini($urlRoot);
		}
				
?>
			</section>
		</div>
<?php 
	}
?>
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
        <td><a href="{$app['url_generator']->generate('back-office/espace-admin')}/ajax/{$id}" class="fiche-profil"  id="$id">Accéder à la fiche</a></td>
        <input type="hidden" class="id"  value="$id"/>
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
        <td><a href="{$app['url_generator']->generate('back-office/espace-admin')}/ajax/{$id}" class="fiche-profil" id="$id">Accéder à la fiche</a></td>
        <input type="hidden" class="id" value="{$id}"/>
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

<?php
if (null!=$objSession->get('infosUser') && $objSession->get('infosUser')!=""){
    $infosUser = $objSession->get('infosUser');    
    extract($infosUser);
}
?>





            <section>
                <h2>Profil de <?php echo $pseudo; ?></h2>
                <!-- FAIRE LA REQUETE EN AJAX -->
                <form action="<?php echo $app['url_generator']->generate("modifUser", ["id"=>$id]);?>" method="post">
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
                    <input type="submit" name="modifUser" value="Modifier"/>
                    
                    <input type="submit" name="modifUser" value="Supprimer"/>

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
                        //extract($tabLigne);
                        if ($index%2 == 0) 
                        {
                            echo
<<<CODEHTML
        <tr class="color">
            <td>{$tabLigne["id_user"]}</td>
            <td>{$tabLigne["texte"]}</td>
            <td><a href="{$app['url_generator']->generate('deleteCommentaire', ["id" => $tabLigne["id"]])}">Supprimer</a></td>
        </tr>
CODEHTML;
                        } else
                        {
                            echo
<<<CODEHTML
        <tr>
            <td>{$tabLigne["id_user"]}</td>
            <td>{$tabLigne["texte"]}</td>
            <td><a href="{$app['url_generator']->generate('deleteCommentaire', ["id" => $tabLigne["id"]])}">Supprimer</a></td>
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
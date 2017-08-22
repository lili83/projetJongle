<?php
require_once("User.php");

class Article
{
    public $id;
    public $titre;
    public $resume;
    public $contenu;
    public $lienArticle;
    public $date_publication;
    public $date_modification;
    public $user;
    public $media;
    public $urlRoot;

    function __construct($tabInfos, $user="", $urlRoot=""){
        global $app;
        extract($tabInfos);

        $this->urlRoot = $urlRoot;
        $this->id = $id;
        $this->titre = $titre;
        $this->resume = $resume;
        $this->contenu = $contenu;
        $this->date_publication = $date_publication;
        $this->date_modification = $date_modification;        
        $this->lienArticle = $app['url_generator']->generate('article', array("id" => $this->id));
        
         //  Si l'utilisateur n'est pas renseigné : on le recherche         
         if ($user == ""){            
            $reqAuteur = "
            SELECT * 
            FROM user JOIN article 
            ON article.id_user = user.id 
            WHERE article.id= $this->id";	
            
            $this->user = new User($app['db']->executeQuery($reqAuteur)->fetch());
            
        }
        else
            $this->user = $user;            

        //  Récup des média associés à cet article
        $reqMediaArticle = "
        SELECT * 
        FROM media, mediaarticle 
        WHERE media.id = mediaarticle.id_media 
        AND mediaarticle.id_article= $this->id";
        $this->media = $app['db']->executeQuery($reqMediaArticle)->fetch();        
    }

    function getHtmlMini(){
        global $app;
        
        //  Récup des catégories associées à cet article
        $reqCategoriesArticle = "
        SELECT * 
        FROM categorie JOIN categoriearticle 
        ON categorie.id = categoriearticle.id_categorie 
        WHERE categoriearticle.id_article= $this->id";
        $resCategoriesArticle = $app['db']->executeQuery($reqCategoriesArticle)->fetchAll();
        
        $codeHtml = 
<<<CODEHTML
<article class="contain">
    <div>
CODEHTML;

        if (isset($this->user->urlPhoto) && $this->user->urlPhoto != ""){            
            $codeHtml .= 
<<<CODEHTML
        <figure>
            <img src="{$this->urlRoot}{$this->user->urlPhoto}" alt="Photo de profil">
        </figure>
CODEHTML;

        }
        
        $codeHtml .= 
<<<CODEHTML
        <p>catégories: 
            <span>';
CODEHTML;

        foreach($resCategoriesArticle as $categorie){								
            $codeHtml .= $categorie['nom'].",";
        }
        $codeHtml = rtrim("$codeHtml", ",");		                        
        
        $codeHtml .= 
<<<CODEHTML
            </span>
        </p>
    </div>
    <div class="contain-col">
        <div class="contain">
            <h2>{$this->titre}</h2>
            <p>publié le {$this->date_publication} par <span>{$this->user->pseudo}</span></p>
        </div>
        <p>{$this->resume}</p>
        <a href="{$this->lienArticle}"> lire article</a>
    </div>
</article>
CODEHTML;

        return $codeHtml;        				
    }

    //
    //  Récupération du code HTML du détail de l'article
    //

    function getHtmlDetail(){
        global $app;

        $codeHtmlDetail = 
<<<CODEHTML
                <a href="{$app['url_generator']->generate("articleUpdate", ["id" => $this->id])}"> Modifier l'article </a>
                <article class="contain-col">
                    <div class="contain">
                        <div>
                            <h2>{$this->titre}</h2>
                            <p>publié par <span>{$this->user->pseudo}</span> le {$this->date_publication}</p>
                        </div>
                        <div>
CODEHTML;

        if (isset($this->user->urlPhoto) && $this->user->urlPhoto != ""){
            $codeHtmlDetail .= 
<<<CODEHTML
                        <figure>
                            <img src="{$this->urlRoot}{$this->user->urlPhoto}" alt="Photo de profil">
                        </figure>
CODEHTML;

        }
        // On ajoute à l'URL des éventuelles images de l'article 
        // le vrai chemin du dossier des photos        
        $this->contenu = str_replace('<img src="', '<img src="'.$this->urlRoot, $this->contenu); 
        
        $codeHtmlDetail .= 
<<<CODEHTML
                        </div>
                       
                    </div
                    <span>
                    <div id="second">
                        <h3>résumé article</h3>
                        <p>{$this->resume}</p>
                    </div>                
                    </span>
                    <article>
                        <p>{$this->contenu}</p>
                    </article>
                </article>
CODEHTML;

        return $codeHtmlDetail;
    }

    //
    //  Récupération du code HTML du formulaire de modification de l'article
    //

    function getHtmlFormDetail(){
        global $app;

        $codeHtmlDetail = 
<<<CODEHTML
                <article class="contain-col">
                
                <form action = "{$app['url_generator']->generate('userUpdate')}" method = "POST">
                    
                    <div class="contain">
                        <div>
                            <input type="text" value="{$this->titre}" placeholde="{$this->titre}">                            
                        </div>
                        <div>
CODEHTML;

        if (isset($this->user->urlPhoto) && $this->user->urlPhoto != ""){
            $codeHtmlDetail .= 
<<<CODEHTML
                        <label for="urlPhoto">Lien vers la photo:
                        <input  type="text" 
                                name= "urlPhoto"
                                value="{$this->urlRoot}{$this->user->urlPhoto}" 
                                placeholde="{$this->urlRoot}{$this->user->urlPhoto}">                            
                        <figure>
                            <img src="{$this->urlRoot}{$this->user->urlPhoto}" alt="Photo de profil">
                        </figure>
CODEHTML;

        }
        // On ajoute à l'URL des éventuelles images de l'article 
        // le vrai chemin du dossier des photos        
        $this->contenu = str_replace('<img src="', '<img src="'.$this->urlRoot, $this->contenu); 
        
        $codeHtmlDetail .= 
<<<CODEHTML
                        </div>                        
                    </div

                    <div class="contain">
                        <label for ="resume">Résumé: </label>
                        <textarea  class="CKEDITOR" name="resume"                                 
                                value="{$this->resume}"
                                placeholder="{$this->resume}">
                        </textare
                    </div>                
                    
                    <div class="contain">                        
                        <textarea class="CKEDITOR" name= "contenu"
                                    value="{$this->contenu}"
                                    placeholder="{$this->contenu}">
                        </teaxtarea>
                    </div>                

                        <button type="submit">Modifier</button>
                        <button type="reset">Annuler</button>

                        <input type="hidden" name="traitementClass" value="upgradeArticle">
                    </form>
                </article>
CODEHTML;

        return $codeHtmlDetail;
    }
               
}
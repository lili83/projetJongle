<?php
class Commentaire{
    public $id;
    public $user;
    public $titre;
    public $texte;
    public $urlRoot;
    public $date_envoi;
    
    
    function __construct($tabInfos, $urlRoot=""){
        extract($tabInfos);
        
        $this->id = $id;
        $this->user = new User  ([
                                "id"=>$id_user,
                                "pseudo" => $pseudo,
                                "nom" => $nom,
                                "prenom" => $prenom,
                                "email" => $email,
                                "password_crypt" => $password_crypt,
                                "resume" => $resume,
                                "url_photo" => $url_photo,
                                "date_naissance" => $date_naissance,
                                "date_inscription" => $date_inscription,
                                "date_modification" => $date_modification,
                                "niveau" => $niveau
                                ]);
        $this->titre = $titre;
        $this->texte = $texte;
        $this->date_envoi = $date_envoi;        
        $this->urlRoot = $urlRoot;
    }

    function getHtml(){
        $root = $this->urlRoot;
        $imgDefaut = "$root/assets/img/presentation/article_none.jpg";
        

        $codeHtml =
'        
        <article class="contain">
			<div>
';

        if (isset($this->user->urlPhoto) && $this->user->urlPhoto != ""){
            $codeHtml .= 
'
        <figure>
            <img src="'.$this->urlRoot.$this->user->urlPhoto.'" alt="Photo de profil">
        </figure>
';
        
        }
        else{
            $codeHtml .= 
'
                <figure>
                    <img src="'.$imgDefaut.'">
                </figure>
';

        }

        $codeHtml .= 
'       <p>'.$this->user->pseudo.'</p>
            </div>            
		    <div>
				<p>le '.$this->date_envoi.'</p>	
				<h3>'.$this->titre.'</h3>
                <p>« '.$this->texte.' »</p>
			</div>
        </article>
';
        
       return $codeHtml; 
    }
}


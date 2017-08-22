<?php

class User{
    public $id;
    public $nom;
    public $prenom;
    public $pseudo;
    public $email;
    public $resume;
    public $urlPhoto;
    public $niveau;
    public $password_crypt;
    public $date_naissance;
    public $date_inscription;
    public $date_modification;

    function __construct($tabInfos){
        // initialisation d'après un tableau contenant les données User 
        extract($tabInfos);        
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->urlPhoto = $url_photo;
        $this->resume = $resume;
        $this->niveau = $niveau;
        $this->password_crypt = $password_crypt;
        $this->date_naissance = $date_naissance;
        $this->date_inscription = $date_inscription;
        $this->date_modification = $date_modification;
    }
}
<?php

class Producer extends Database {

    public $id;
    public $name;
    public $address;
    public $zip;
    public $mail;
    public $password;
    public $description;
    public $picture;
    public $idRoles;
    
    // initialisation du tableau d'erreurs
    public $formErrors = array();

    /**
     * connexion à la base de données
     * le constructeur hérite du construct de la classe parente
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * fermeture automatique de la connexion à la destruction de l'instance de classe
     */
    public function __destruct() {
        parent::__destruct();
    }

}
?>


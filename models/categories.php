<?php

class Category extends Database {

    public $id;
    public $name;
    
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


<?php

// Héritage de la classe Database
class Producer extends Database {

    public $id;
    public $name;
    public $address;
    public $zip;
    public $mail;
    public $password;
    public $confirmPassword;
    public $description;
    public $picture;
    public $id_7ie1z_roles;
    
    // Initialisation du tableau d'erreurs
    public $formErrors = array();

    /**
     * Connexion à la base de données.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Fermeture automatique de la connexion à la destruction de l'instance de classe
     */
    public function __destruct() {
        parent::__destruct();
    }

    /**
     * Méthode permettant d'inscrire un nouveau client dans la BDD
     * @return boolean
     */
    public function createProducer() {
        //Éxecution de la requête
        try {
            // Préparation de la requête au serveur de bdd
            $results = $this->db->prepare("INSERT INTO `7ie1z_producers` (`mail`, `password`, `id_7ie1z_roles`)
                                                  VALUES ( :mail, :password, :id_roles)");

            // association des marqueurs nommées aux véritables informations
            $results->bindValue(':lastname', $this->mail, PDO::PARAM_STR);
            $results->bindValue(':firstname', $this->password, PDO::PARAM_STR);
            $results->bindValue(':id_roles', $this->id_7ie1z_roles, PDO::PARAM_INT);

            // Éxecution de la requête, renvoi TRUE en cas de succès, sinon FALSE là où j'appelle ma méthode createProducer(ctrl).
            return $results->execute();
        }
        //bloc catch de renvoi des erreurs
        catch (PDOException $e) {
            die('Error :' . $e->getMessage());
        }
    }

    /**
     * Méthode permettant de vérifier si un mail est déjà existant
     * @return booléen
     */
    public function hasUniqueMail() {
        try {
            $results = $this->db->prepare('SELECT `id`,`mail` FROM `7ie1z_producers` WHERE `mail`= :mail');
            $results->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $results->execute();
            $check = $results->fetch(PDO::FETCH_OBJ);

            // Vérification de l'existence du mail ET n'appartienne pas à un autre patient
            if (is_object($check) && $check->id !== $this->id) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            die('erreur : ' . $e->getMessage());
        }
    }

}
?>


<?php

// Héritage de la classe Database
class Producer extends Database {

    public $id;
    public $mail;
    public $password;
    public $confirmPassword;
    public $nameCompany;
    public $lastname;
    public $firstname;
    public $city;
    public $fileUrl;
    public $description;
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
            $results = $this->db->prepare("INSERT INTO `7ie1z_producers` (`mail`, `password`, `lastname`, `firstname`, `nameCompany`, `city`, `fileUrl`, `description`, `id_7ie1z_roles`)
                                                  VALUES ( :mail, :password, :lastname, :firstname, :nameCompany, :city, :file, :description, :id_roles)");

            // association des marqueurs nommées aux véritables informations
            $results->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $results->bindValue(':password', $this->password, PDO::PARAM_STR);
            $results->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
            $results->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
            $results->bindValue(':nameCompany', $this->nameCompany, PDO::PARAM_STR);
            $results->bindValue(':city', $this->city, PDO::PARAM_STR);
            $results->bindValue(':fileUrl', $this->file, PDO::PARAM_STR);
            $results->bindValue(':description', $this->description, PDO::PARAM_STR);
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

    /*
     * Méthode permettant  de récupérer le profil Producteur par le mail
     * @array
     */

    public function ProducerProfile() {
        try {
            $results = $this->db->prepare('SELECT `id`, 
                                                                                 `mail`, 
                                                                                 `password`, 
                                                                                 `lastname`,
                                                                                 `firstname`,
                                                                                 `nameCompany`,
                                                                                 `city`,
                                                                                 `fileUrl`,
                                                                                 `description`,
                                                                                 `id_7ie1z_roles` 
                                                                   FROM `7ie1z_producers`
                                                                   WHERE `mail` =:mail');
            $results->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $results->execute();
            return $results->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('erreur : ' . $e->getMessage());
        }
    }

    /*
     * Méthode pour récupérer le profil Producteur par l'id
     * @array
     */

    public function ProducerProfileById() {
        try {
            $results = $this->db->prepare('SELECT `id`, 
                                                                             `mail`, 
                                                                             `password`, 
                                                                             `lastname`,
                                                                             `firstname`,
                                                                             `nameCompany`,
                                                                             `city`,
                                                                             `fileUrl`,
                                                                             `description`,
                                                                             `id_7ie1z_roles` 
                                                               FROM `7ie1z_producers`
                                                               WHERE `id`= :id');
            $results->bindValue(':id', $this->id, PDO::PARAM_INT);
            $results->execute();
            return $results->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Error :' . $e->getMessage());
        }
    }

}
?>


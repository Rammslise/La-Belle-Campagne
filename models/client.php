<?php

// Client hérite de la classe Database
class Client extends Database {

    public $id;
    public $mail;
    public $password;
    public $confirmPassword;
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
     * Fermeture automatique de la connexion à la destruction de l'instance de classe.
     */
    public function __destruct() {
        parent::__destruct();
    }

    /**
     * Méthode permettant d'inscrire un nouveau client dans la BDD
     * @return boolean
     */
    public function createClient() {
        //Éxecution de la requête
        try {
            // Préparation de la requete au serveur de bdd et insertion de marqueurs nominatifs
            $results = $this->db->prepare("INSERT INTO `7ie1z_clients` (`mail`, `password`, `id_7ie1z_roles`)
                            VALUES ( :mail, :password, :id_roles)");

            // Association des marqueurs nommées aux véritables informations
            $results->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $results->bindValue(':password', $this->password, PDO::PARAM_STR);
            $results->bindValue(':id_roles', $this->id_7ie1z_roles, PDO::PARAM_INT);

            // Éxecution de la requête, renvoi TRUE en cas de succès, sinon FALSE à l'appel de la méthode createClient(ctrl).
            return $results->execute();
        }
        // Renvoi des erreurs
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
            $results = $this->db->prepare('SELECT `id`,`mail` FROM `7ie1z_clients` WHERE `mail`= :mail');
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

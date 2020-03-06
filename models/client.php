<?php

// Client hérite de la classe Database
class Client extends Database {

    public $id;
    public $pseudo;
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
            $results = $this->db->prepare("INSERT INTO `7ie1z_clients` (`mail`, `password`, `pseudo`, `id_7ie1z_roles`)
                            VALUES ( :mail, :password, :pseudo, :id_roles)");

            // Association des marqueurs nommées aux véritables informations
            $results->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $results->bindValue(':password', $this->password, PDO::PARAM_STR);
            $results->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
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
     * @return boolean
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

    /*
     * Méthode permettant  de récupérer le profil Client par le mail
     * @array
     */

    public function clientProfile() {
        try {
            $results = $this->db->prepare('SELECT `id`, 
                                                                                 `mail`, 
                                                                                 `password`, 
                                                                                 `pseudo`, 
                                                                                 `id_7ie1z_roles` 
                                                                   FROM `7ie1z_clients`
                                                                   WHERE `mail` =:mail');
            $results->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $results->execute();
            return $results->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('erreur : ' . $e->getMessage());
        }
    }

    /*
     * Méthode pour récupérer le profil Client par l'id
     * @array
     */

    public function ClientProfileById() {
        $results = $this->db->prepare('SELECT  `id`,
                                                                              `mail`,            
                                                                              `password`, 
                                                                              `pseudo`,    
                                                                              `id_7ie1z_roles` 
                                                               FROM `7ie1z_clients`
                                                               WHERE `id`= :id');
        $results->bindValue(':id', $this->id, PDO::PARAM_INT);

        try {
            $results->execute();
            return $results->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Error :' . $e->getMessage());
        }
    }

    /*
     * Méthode permettant au Client de modifier ses données
     * @array
     */

    public function editClientProfile() {
        try {
            $results = $this->db->prepare('UPDATE `7ie1z_clients` 
                               SET        `pseudo` = :pseudo, 
                                             `mail` = :mail, 
                                             `password` = :password,         
                                             `id_7ie1z_roles` = :id_roles
                               WHERE `id` = :id');
            $results->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
            $results->bindValue(':mail', $this->mail, PDO::PARAM_STR);
            $results->bindValue(':password', $this->password, PDO::PARAM_STR);
            $results->bindValue(':id_roles', $this->id_7ie1z_roles, PDO::PARAM_INT);
            $results->bindValue(':id', $this->id, PDO::PARAM_INT);
            return $results->execute();
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }

    /**
     *  Méthode permettant de supprimer un Client
     * @return boolean
     */
    public function deleteClient() {
        try {
            $results = $this->db->prepare('DELETE FROM `7ie1z_clients` WHERE `id` = :id LIMIT 1');
            $results->bindValue(':id', $this->id, PDO::PARAM_INT);
            return $results->execute();
        } catch (PDOException $e) {
            echo 'Connexion echoué : ' . $e->getMessage();
        }
    }
    
     /**
     * méthode permettant de récupérer la liste de tous les clients
     * @return array
     */
    public function getClientList($limit, $offset) {
           try {
        $results = $this->db->prepare('SELECT `id`,`pseudo`,`mail`, `id_7ie1z_roles`
                                                               FROM `7ie1z_clients`
                                                               LIMIT :limit OFFSET :offset');
        $results->bindValue(':limit', $limit, PDO::PARAM_INT);
        $results->bindValue(':offset', $offset, PDO::PARAM_INT);   
        $results->execute();
            return $results->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('erreur : ' . $e->getMessage());
        }
    }

    /**
     * méthode permettant de réaliser une pagination de  la liste de tous les clients
     * @return array
     */
    public function pagingClientList() {
        try {
            $results = $this->db->query('SELECT  COUNT(*)  FROM `7ie1z_clients`');
            return $results->fetchColumn();
        } catch (PDOException $e) {
            die('erreur : ' . $e->getMessage());
        }
    }
    
        /**
     * méthode permettant de trouver un client
     * @return array
     */
    public function searchClient($perPage, $offset, $search) {
        try {
            $results = $this->db->prepare('SELECT `id`, `peudo`, `mail`
                                                                   FROM `7ie1z_clients`
                                                                   WHERE `pseudo` LIKE :search1  OR `mail` LIKE :search2
                                                                   LIMIT :limit OFFSET :offset');
            $results->bindValue(':search1', "%$search%", PDO::PARAM_STR);
            $results->bindValue(':search2', "%$search%", PDO::PARAM_STR);
            $results->bindValue(':limit', $perPage, PDO::PARAM_INT);
            $results->bindValue(':offset', $offset, PDO::PARAM_INT);
            $results->execute();
            return $results->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Connexion echoué : ' . $e->getMessage();
        }
    }

    /**
     * méthode permettant de comptabiliser
     * @return array
     */
    public function pagingClientSearchList($search) {
        try {
            $results = $this->db->prepare('SELECT  COUNT(*)  FROM `7ie1z_clients` 
                                                                  WHERE `pseudo` LIKE :search1 OR `mail` LIKE :search2');
            $results->bindValue(':search1', "%$search%", PDO::PARAM_STR);
            $results->bindValue(':search2', "%$search%", PDO::PARAM_STR);
            $results->execute();
            return $results->fetchColumn();
        } catch (PDOException $e) {
            die('erreur : ' . $e->getMessage());
        }
    }

}

?>

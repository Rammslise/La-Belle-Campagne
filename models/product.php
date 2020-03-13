<?php

class Product extends Database {

    public $id;
    public $name;
    public $description;
    public $price;
    public $weight;
    public $productPicture;
    public $id_7ie1z_producers;
    public $id_7ie1z_categories;
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

    /**
     * Méthode permettant d'ajouter un produit
     * @return boolean
     */
    public function createProduct() {
        try {
            $results = $this->db->prepare("INSERT INTO `7ie1z_products` 
                                                                                           (`name`, 
                                                                                           `description`, 
                                                                                           `price`, 
                                                                                           `weight`,
                                                                                           `productPicture`,
                                                                                           `id_7ie1z_producers`,
                                                                                           `id_7ie1z_categories`)
                            VALUES ( :name, :description, :price, :weight, :productPicture, :id_producers, :id_categories)");
            $results->bindValue(':name', $this->name, PDO::PARAM_STR);
            $results->bindValue(':description', $this->description, PDO::PARAM_STR);
            $results->bindValue(':price', $this->price, PDO::PARAM_INT);
            $results->bindValue(':weight', $this->weight, PDO::PARAM_INT);
            $results->bindValue(':productPicture', $this->productPicture, PDO::PARAM_STR);
            $results->bindValue(':id_producers', $this->id_7ie1z_producers, PDO::PARAM_INT);
            $results->bindValue(':id_categories', $this->id_7ie1z_categories, PDO::PARAM_INT);
            return $results->execute();
        } catch (PDOException $e) {
            die('Error :' . $e->getMessage());
        }
    }

    /**
     * Méthode permettant de récupérer la liste de tous les produits
     * @return array
     */
    public function getProductList() {
        try {
            $results = $this->db->query('SELECT  `7ie1z_products`.`id`, 
                                                                              `7ie1z_products`.`name`, 
                                                                              `7ie1z_products`.`description`,
                                                                              `7ie1z_products`.`price`, 
                                                                              `7ie1z_products`.`weight`, 
                                                                              `7ie1z_products`.`productPicture`, 
                                                                             `7ie1z_products`. `id_7ie1z_producers`,
                                                                             `7ie1z_products`.`id_7ie1z_categories`,
                                                                             `7ie1z_producers`.`companyName`                                                                                
                                                          FROM   `7ie1z_products`
                                                          INNER JOIN `7ie1z_producers`
                                                          ON `7ie1z_producers`.`id` = `7ie1z_products`.`id_7ie1z_producers`');
            return $results->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Error :' . $e->getMessage());
        }
    }

    /**
     * Méthode permettant de récupérer les informations d'un produit
     * @return array
     */
    public function getProduct() {
        try {
            $results = $this->db->query('SELECT  `7ie1z_products`.`id`, 
                                                                              `7ie1z_products`.`name`, 
                                                                              `7ie1z_products`.`description`,
                                                                              `7ie1z_products`.`price`, 
                                                                              `7ie1z_products`.`weight`, 
                                                                              `7ie1z_products`.`productPicture`, 
                                                                             `7ie1z_products`. `id_7ie1z_producers`,
                                                                             `7ie1z_products`.`id_7ie1z_categories`,
                                                                             `7ie1z_producers`.`companyName`                                                                                
                                                          FROM   `7ie1z_products`
                                                          INNER JOIN `7ie1z_producers`
                                                          ON `7ie1z_producers`.`id` = `7ie1z_products`.`id_7ie1z_producers`');
            return $results->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Error :' . $e->getMessage());
        }
    }
    
    /**
     * Méthode permettant d'afficher les produits d'un producteur
     * @return array
     */
    public function viewProduct() {
        try {
            $results = $this->db->prepare('SELECT `id`, 
                                                                              `name`, 
                                                                              `description`,
                                                                              `price`, 
                                                                              `weight`, 
                                                                              `productPicture`, 
                                                                              `id_7ie1z_producers`,
                                                                             `id_7ie1z_categories`                                                                           
                                                                   FROM `7ie1z_products`
                                                                   WHERE `id` = :id');
            $results->bindValue(':id', $this->id, PDO::PARAM_INT);
            $results->execute();
            return $results->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Connexion echoué : ' . $e->getMessage();
        }
    }

    /**
     * Méthode permettant de modifier une fiche Produit
     * @return boolean
     */
    public function editProductInfo() {
        try {
            $results = $this->db->prepare('UPDATE  `7ie1z_products` 
                                                                   SET          `name` = :name,             
                                                                                    `description` = :description
                                                                                    `price` = :price
                                                                                    `weight` = :weight
                                                                                    `productPicture` = :productPicture                 
                                                                    WHERE   `id` = :id');
            $results->bindValue(':name', $this->name, PDO::PARAM_STR);
            $results->bindValue(':description', $this->description, PDO::PARAM_STR);
            $results->bindValue(':price', $this->price, PDO::PARAM_STR);
            $results->bindValue(':weight', $this->weight, PDO::PARAM_STR);
            $results->bindValue(':productPicutre', $this->productPicture, PDO::PARAM_STR);
            $results->bindValue(':id', $this->id, PDO::PARAM_INT);
            return $results->execute();
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }

    /**
     * Méthode permettant de supprimer un produit
     * @return boolean
     */
    public function deleteProduct() {
        try {
            $results = $this->db->prepare('DELETE FROM `7ie1z_products`
                                                                   WHERE id = :id                            
                                                                   LIMIT 1');
            $results->bindValue(':id', $this->id, PDO::PARAM_INT);
            return $results->execute();
        } catch (PDOException $e) {
            echo 'Connexion echoué : ' . $e->getMessage();
        }
    }

}
?>


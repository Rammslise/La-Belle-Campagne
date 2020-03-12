<?php

$producer = new Producer();
$product = new Product();

// Regex  NOM 
define('NAME_REGEX', '/^[a-zA-ZÀ-ÿ\' -]+$/');
// Regex DESCRIPTION
define('DESCRIPTION_REGEX', '/^[a-zA-Z0-9À-ÿ\' -]+$/');
// Regex poids et prix

if (isset($_POST['submit'])) {

    $product->name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $product->category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : '';
    $product->price = isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '';
    $product->weight = isset($_POST['weight']) ? htmlspecialchars($_POST['weight']) : '';
    $product->description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    $imageArray = isset($_FILES['profilPicture']['name']) ? $_FILES['profilPicture']['name'] : '';

    if (empty($product->formErrors) && empty($producer->formErrors)) {

        $product->id_7ie1z_producers = $producer->producerProfile()->id;
        $success = $product->createProduct();
        if ($success) {
            $_SESSION['message'] = 'La fiche produit a bien été créée';
            header('Location: ../views/producerProduct.php');
            exit();
        } else {
            $message = 'La fiche n\'a pas pu être créée';
        }
    }
}
?>


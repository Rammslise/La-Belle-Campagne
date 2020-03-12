<?php

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $productId = htmlspecialchars($_GET['id']);

    //si le panier existe et que le produit est référencé dans le panier.
    if (isset($_SESSION['cart']) && array_key_exists($productId, $_SESSION['cart'])) {
        if ($_SESSION['cart'][$productId]['quantity'] > 1) {
            // soustrait 1 à la quantité
            $_SESSION['cart'][$productId]['quantity'] -= 1;
        } else {
            // sinon retire le produit du panier.
            unset($_SESSION['cart'][$productId]);
        }
    }
}
header('Location: ../views/basket.php');
?>


<?php

$product = new Product();
$producer = new Producer();

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $producer->id = htmlspecialchars($_GET['id']);
    $product->id_7ie1z_producers = htmlspecialchars($_GET['id']);

    $producerProfile = $producer->producerProfileById();
    $productInfos = $product->getProduct();

    if (!is_object($producerProfile)) {
        header('Location: ../views/producerProduct.php');
        exit();
    }
} else {
    header('Location: ../index.php');
    exit();
}
?>

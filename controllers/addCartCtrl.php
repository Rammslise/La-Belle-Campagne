<?php

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $productId = htmlspecialchars($_GET['id']);
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    if(array_key_exists($productId, $_SESSION['cart'])){
        $_SESSION['cart'][$productId]['quantity'] += 1;
    } else {
        $product = new Product();
        $product->id = $productId;
        
        $productDetails = $product->viewProduct();
//        debug($productDetails); die();
        
        $_SESSION['cart'][$productId] = ['quantity' =>1, 'name' => $productDetails->name, 'price' => $productDetails->price];
    }
}

header('Location: ../views/basket.php');
?>


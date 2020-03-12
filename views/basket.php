<?php
session_start();

require '../init/functions.php';
require '../models/database.php';
require '../models/client.php';
require '../models/product.php';
include '../utilities/header.php';

if (isProducer()) {
    header('Location: ../index.php');
}
?>
<!-- Panier en session, aurait besoin d'une table transaction-->
<div class= "p-4 m-0">
    <h2 class="text-center" id="idTitle">Votre panier</h2>
</div>
<div class="row p-0 m-0 justify-content-center">
    <div class="col-md-9">
        <table class="table ">
            <thead class="thead-dark">
                <tr>              
                    <th scope="col"><span>Produit</span></th>
                    <th scope="col"><span>Quantité</span></th>
                    <th scope="col"><span>Prix</span></th>
                    <th scope="col"><span>Total</span></th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <?php
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $idProduct => $value) {
                        $productTotal = $value['price'] * $value['quantity'];
                        ?>
                        <tr>    
                            <td class="col-3">
                                <p class="h6"><?= $value['name']; ?></p>
                            </td>
                            <td class="col-3">
                                <a class="btn" href="removeCart.php?id=<?= $idProduct; ?>"><i class="fas fa-minus"></i></a><?= $value['quantity']; ?> <a class="btn" href="addCart.php?id=<?= $idProduct; ?>"><i class="fas fa-plus"></i></a>
                            </td>              
                            <td class="col-3">
                                <p class="h6"><?= $value['price']; ?> €</p>                          
                            </td>
                            <td class="col-3">
                                <p class="h6"><?= $productTotal ?> €</p>                          
                            </td>                   
                        </tr>
                    <?php } ?>
                    <?php
                } else {
                    echo 'Votre panier est vide';
                }
                ?>              
            </tbody>
        </table>       
    </div>
</div>
<div class="row p-0 m-0">
    <div class="btn-group col-md-12" id="basketButton" role="group"> 
        <div class="col-md-2 text-center"><a href="" class="btn">Retour aux articles</a></div>
        <div class="col-md-2 text-center"><a href="removeBasket.php" class="btn">Vider votre panier</a></div>
        <div class="col-md-2 text-center"><a href="" class="btn">Commander</a></div>
    </div>
</div>
<?php include '../utilities/footer.php'; ?>
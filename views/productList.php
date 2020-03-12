<?php
session_start();

require '../init/functions.php';
require '../init/credentials.php';
require '../models/database.php';
require '../models/product.php';
require_once'../controllers/productListCtrl.php';
include '../utilities/header.php';
?>
<div class= "p-4">
    <h2 class="text-center">Liste des produits</h2>
</div>
<div class="row">
    <?php foreach ($productList as $product) { ?>
        <div class="col-md-4 mb-4 d-flex justify-content-center card-group">
            <div class="card" style="max-width: 17rem;">
                <img src="<?= PRODUCT_IMAGE_FOLDER . $product->productPicture ?>" class="card-img-top" alt="productPicture">
                <div class="card-body">
                    <h5 class="card-title"><span><?= $product->name; ?></span></h5>
                    <p class="card-text p-0 m-0">Poids : <?= $product->weight; ?></p>
                    <p class="card-text p-0 m-0">Prix : <?= $product->price; ?></p>
                    <p class="card-text p-0 mb-2">Vendu par : <?= $product->companyName; ?></p>
                    <a href="addCart.php?id=<?= $product->id ?>" class="btn btn-primary rounded-pill mt-4">Ajouter au panier</a> 
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php include '../utilities/footer.php'; ?>

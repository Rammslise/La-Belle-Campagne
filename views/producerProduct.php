<?php
session_start();

require '../init/credentials.php';
require '../init/functions.php';
require '../models/database.php';
require '../models/producer.php';
require '../models/product.php';
require_once '../controllers/producerProductCtrl.php';
include '../utilities/header.php';

if (isClient()) {
    header('Location: ../index.php');
    exit();
}
?>
<div class= "p-2">
    <h2 class="text-center">Liste de vos produits</h2>
</div>
<div class="card mb-3 mt-2 ml-2" style="max-width: 500px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= PRODUCT_IMAGE_FOLDER . $productInfos->productPicture ?>" class="card-img-top" />
        </div>
        <div class="col-md-7">
            <div class="card-body p-0 m-0">
                <div class="card-body">
                    <h5 class="card-title p-0 m-0"><?= $productInfos->name; ?></h5>
                    <p class="card-text p-0 m-0">Poids : <?= $productInfos->weight; ?>g</p>
                    <p class="card-text p-0 m-0">Prix : <?= $productInfos->price; ?>€</p>
                    <a href="" class="btn btn-success rounded-pill"><span>Modifier</span></a>
                    <a href="" class="btn btn-danger rounded-pill"><span>Supprimer</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../utilities/footer.php'; ?>
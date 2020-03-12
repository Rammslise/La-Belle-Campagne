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
      <div class="card mt-4" style="width: 18rem;">
          <img src="<?= PRODUCT_IMAGE_FOLDER . $productInfos->productPicture ?>" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title"><?= $productInfos ->name; ?></h5>
        <p class="card-text">Poids : <?= $productInfos ->weight; ?></p>
        <p class="card-text">Prix : <?= $productInfos ->price; ?></p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>  
<?php include '../utilities/footer.php'; ?>
<?php
session_start();

require '../init/credentials.php';
require '../init/functions.php';
require '../models/database.php';
require '../models/producer.php';
require '../models/product.php';
require_once '../controllers/producerProductCtrl.php';
include '../utilities/header.php';
?>
<?php foreach ($productInfos as $infos) { ?>
    <li><?= $infos->weight; ?></li>
<?php } ?>                 
<div class="card" style="width: 18rem;">
    <img src="<?= $infos->productPicture; ?>" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title"><?= $infos->name; ?></h5>
        <p class="card-text">Poids : <?= $infos->weight; ?></p>
        <p class="card-text">Prix : <?= $infos->price; ?></p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>  
<?php include '../utilities/footer.php'; ?>
<?php
session_start();

require '../init/credentials.php';
require '../init/functions.php';
require '../models/database.php';
require '../models/product.php';
require '../models/producer.php';
//require_once '../controllers/createProductCtrl.php';
include '../utilities/header.php';

if (isClient()) {
    header('Location: ../index.php');
    exit();
}
?>
<?php if (isset($message)) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $message ?>
    </div>
<?php } ?>

<div class="container-fluid">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md text-center">
                <p class="h2 p-2"><span>Ajouter un article</span></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="formPart1">
                <div class="form-group row">
                    <label for="name" class="col-md-6 col-form-label">Nom du produit</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" id="name"  />
                        <small class="text-danger">         
                            <?php
                            if (isset($product->formErrors['name'])) {
                                echo $product->formErrors['name'];
                            }
                            ?>
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="category">Catégorie</label>
                            </div>
                            <select class="custom-select" id="category">
                                <option selected>Sélectionner</option>
                                <option value="1">Légumes</option>
                                <option value="2">Fruits</option>
                                <option value="3">Viandes</option>
                                <option value="3">Crémerie</option>
                                <option value="3">Épicerie</option>
                            </select>
                        </div>
                        <small class="text-danger">         
                            <?php
                            if (isset($product->formErrors['category'])) {
                                echo $product->formErrors['category'];
                            }
                            ?>
                        </small>
                    </div>
                </div>            
            <div class="formPart2">
                <div class="form-group row">
                    <label for="price" class="col-md-6 col-form-label">Prix vendu TTC</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="price" id="price"  />
                        <small class="text-danger">         
                            <?php
                            if (isset($product->formErrors['price'])) {
                                echo $product->formErrors['price'];
                            }
                            ?>
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="weight" class="col-md-6 col-form-label">Poids</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="weight" id="weight"  />
                        <small class="text-danger">         
                            <?php
                            if (isset($product->formErrors['weight'])) {
                                echo $product->formErrors['weight'];
                            }
                            ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<?php include '../utilities/footer.php'; ?>
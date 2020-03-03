<?php
session_start();

require_once '../init/credentials.php';
require_once '../init/functions.php';
require_once '../models/database.php';
require_once '../models/client.php';
require_once '../controllers/clientProfileCtrl.php';
include '../utilities/header.php';
?>

<!--Message erreur -->
<?php if (isset($message)) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $message ?>
    </div>
<?php } ?>

<h3 class="text-center p-2" id="idTitle">Votre profil Client</h3>
<div id="editClientProfile">
    <div class="row ml-4 p-4">
        <div class="col-12">
            <form method="POST" action="" class="justify-content-center">         
                <span class="identifyProfile">Votre identifiant </span>
                <a href="" name="logout"><img class="ml-1" src="https://img.icons8.com/ios/32/000000/logout-rounded-up.png" /></a>
                <div class="pseudoProfile mt-4">
                    <div class="form-group row">
                        <label for="pseudo" class="col-6 col-form-label">Pseudo*</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="pseudo" name="pseudo"  value="<?= $clientProfile->pseudo ?>" />
                            <small class="text-danger">       
                                <?php
                                if (isset($profile->formErrors['pseudo'])) {
                                    echo $profile->formErrors['pseudo'];
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                </div>              
                <div class="mailProfile">
                    <div class="form-group row">
                        <label for="mail" class="col-6 col-form-label">Email*</label>
                        <div class="col-10">
                            <input type="email" class="form-control" id="mail" name="mail"  value="<?= $clientProfile->mail ?>" />
                            <small class="text-danger">       
                                <?php
                                if (isset($profile->formErrors['mail'])) {
                                    echo $profile->formErrors['mail'];
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                </div>
                <button type="submit" name="validateSubmit" href="" class="btn btn-success disabled rounded-pill ml-2 mb-2"><span>Modifier</span></button>
            </form>
            <form method="POST" action="">
                <span class="identifyProfile">Votre mot de passe</span>
                <div class="passwordProfile mt-2">
                    <div class="form-group row">
                        <label for="password" class="col-6 col-form-label">Mot de passe*</label>
                        <div class="col-10">
                            <input type="password" class="form-control" id="password" name="password"  />
                            <small class="text-danger">
                                <?php
                                if (isset($profile->formErrors['password'])) {
                                    echo $profile->formErrors['password'];
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                </div>
                <button type="submit" name="deleteSubmit" href="" class="btn btn-danger disabled rounded-pill mt-2"><span>Supprimer</span></button>                 
            </form>
        </div>
    </div>
</div>
<?php include '../utilities/footer.html'; ?>

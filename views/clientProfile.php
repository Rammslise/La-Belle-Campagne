<?php
session_start();

require '../init/credentials.php';
require '../init/functions.php';
require '../models/database.php';
require '../models/client.php';
require '../controllers/clientProfileCtrl.php';
//require '../controllers/deleteClientCtrl.php';
require '../views/editClientProfile.php';
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
        <div class="col-md-12">
            <form method="POST" action="" class="justify-content-center">         
                <span class="identifyProfile">Votre identifiant </span>
                <div class="pseudoProfile mt-4">
                    <div class="form-group row">
                        <label for="pseudo" class="col-6 col-form-label">Pseudo</label>
                        <div class="col-md-10">
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
                        <label for="mail" class="col-md-6 col-form-label">Email</label>
                        <div class="col-md-10">
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
                <span class="identifyProfile">Votre mot de passe</span>
                <div class="passwordProfile mt-4">
                    <div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label">Mot de passe</label>
                        <div class="col-md-10">
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
                    <div class="form-group row">
                        <label for="confirmPassword" class="col-md-10 col-form-label">Mot de passe de confirmation</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"  />
                            <small class="text-danger">
                                <?php
                                if (isset($profile->formErrors['confirmPassword'])) {
                                    echo $profile->formErrors['confirmPassword'];
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $clientProfile->id ?>" />
                <input type="hidden" name="roles" value="<?= $clientProfile->id_7ie1z_roles ?>" />
                <button name="validate" class="btn btn-success disabled rounded-pill  mt-2 mr-1"><span>Modifier</span></button>                                                                     
            </form>
            <a href="deleteClient.php"><button name="delete" class="btn btn-danger disabled rounded-pill mt-2" ><span>Supprimer</span></button></a>     
            <a href="deconnexion.php"><button class="btn disabled rounded-pill mt-2 "><i class="fas fa-power-off"></i></button></a>
        </div>
    </div>
</div>
<?php include '../utilities/footer.html'; ?>

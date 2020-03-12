<?php
session_start();

require '../init/credentials.php';
require '../init/functions.php';
require '../models/database.php';
require '../models/client.php';
require_once '../controllers/clientProfileCtrl.php';
require_once '../views/editClientProfile.php';
include '../utilities/header.php';

if (isProducer()) {
    header('Location: ../index.php');
    exit();
}
?>
<!--Message  -->
<?php if (isset($message)) { ?>
    <div class="alert alert-danger mb-3" role="alert">
        <?= $message ?>
    </div>
<?php } ?>
<div class="container-fluid">
    <!-- Récupération des valeurs id et rôles par des liens cachés -->
    <input type="hidden" name="id" value="<?= $clientProfile->id ?>" />
    <input type="hidden" name="roles" value="<?= $clientProfile->id_7ie1z_roles ?>" />
    <h3 class="text-center p-2" id="idTitle">Profil Client</h3>
    <div class="row" id="editClientProfile">
        <form method="POST" action="">         
            <div class="mt-4">
                <span class="identifyProfile">Identifiant </span>
            </div>
            <div class="mt-4">
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
            <span class="identifyProfile">Votre mot de passe</span>
            <div class="mt-4">
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
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <button type="submit" name="submit" class="btn btn-success rounded-pill  mt-2 mr-1"><span>Modifier</span></button>                                                                                               
                <button name="delete" class="btn btn-danger rounded-pill mt-2" data-toggle="modal" data-target="#modal-<?= $producer->id ?>"><span>Supprimer</span></button>
                <a href="deconnexion.php"><button class="btn rounded-pill mt-2 "><i class="fas fa-power-off"></i></button></a>              
            </div>                                                       
        </form>
    </div>
</div>
<?php include '../utilities/footer.php'; ?>
<!-- Modal -->
<div class="modal fade" id="modal-<?= $client->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Vous allez nous manquer, êtes vous sûr de vouloir supprimer votre compte ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="deleteClient.php?id=<?= $clientProfile->id ?>" class="btn btn-primary">Confimer</a>
            </div>
        </div>
    </div>
</div>

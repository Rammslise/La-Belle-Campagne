<?php
session_start();

require '../init/credentials.php';
require '../init/functions.php';
require '../models/database.php';
require '../models/producer.php';
require_once '../controllers/producerProfileCtrl.php';
require_once '../views/editProducerProfile.php';
include '../utilities/header.php';
?>

<!--Message  -->
<?php if (isset($message)) { ?>
    <div class="alert alert-danger mb-3" role="alert">
        <?= $message ?>
    </div>
<?php } ?>
<!-- Récupération des valeurs id et rôles par des liens cachés -->
<input type="hidden" name="id" value="<?= $producerProfile->id ?>" />
<input type="hidden" name="roles" value="<?= $producerProfile->id_7ie1z_roles ?>" />
<h3 class="text-center p-2" id="idTitle">Votre Compte Utilisateur</h3>
<div class="container-fluid">
    <div class="row p-0 m-4" id="editProducerProfile">
        <div class="col-md-5">
            <form method="POST" action="" > 
                <div class="mt-4">
                    <span class="identifyProfile">Identifiant </span>
                </div>                
                <div class="mt-4">
                    <div class="form-group row">
                        <label for="companyName" class="col-6 col-form-label">Nom de société</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="companyName" name="companyName"  value="<?= $producerProfile->companyName ?>" />
                            <small class="text-danger">       
                                <?php
                                if (isset($profile->formErrors['companyName'])) {
                                    echo $profile->formErrors['companyName'];
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                </div>                         
                <div class="form-group row">
                    <label for="mail" class="col-md-6 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" id="mail" name="mail"  value="<?= $producerProfile->mail ?>" />
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
            </form>
        </div>
        <img src="../assets/img/body/lierre1.png" id="ivyPicture" class="img-responsive" alt="ivy" />
        <div class="col-md-5">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mt-4">
                    <span class="identifyProfile">Informations personnelles</span>
                </div>
                <!-- Nom de famille -->
                <div class="form-group row mt-4">
                    <div class="col-md-5">
                        <label for="lastname" class="col-form-label">Votre nom*</label>                     
                        <input type="text" class="form-control" id="lastname" name="lastname"  value="<?= $producerProfile->lastname ?>"/>
                        <small class="text-danger">         
                            <?php
                            if (isset($producer->formErrors['lastname'])) {
                                echo $producer->formErrors['lastname'];
                            }
                            ?>
                        </small>
                    </div>
                    <!-- Prénom-->
                    <div class="col-md-5">
                        <label for="firstname" class="col-form-label">Votre prénom*</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"  value="<?= $producerProfile->firstname ?>"/>
                        <small class="text-danger">         
                            <?php
                            if (isset($producer->formErrors['firstname'])) {
                                echo $producer->formErrors['firstname'];
                            }
                            ?>
                        </small>
                    </div>
                </div>
                <!-- Lieu de l'exploitation -->
                <div class="form-group row">                    
                    <label for="city" class="col-md-6 col-form-label" >Lieu*</label>         
                    <div class="col-md-10">
                        <input  type="text" id="city" name ="city"  value="<?= $producerProfile->city ?>"/>
                        <small class="text-danger">         
                            <?php
                            if (isset($producer->formErrors['city'])) {
                                echo $producer->formErrors['city'];
                            }
                            ?>
                        </small>
                    </div>
                </div>
                <!-- Insertion du logo-->
                <div class="form-group row">
                    <div class="col-md-10">
                        <label for="profilPicture" class="col-form-label">Image*</label>
                        <input type="file" class="form-control" id="profilPicture" name="profilPicture" />
                        <small class="form-text text-muted">Formats acceptés, png, jpg, jpeg, gif.</small>
                        <small class="text-danger">         
                            <?php
                            if (isset($producer->formErrors['profilPicture'])) {
                                echo $producer->formErrors['profilPicture'];
                            }
                            ?>
                        </small>
                    </div>
                </div>
                <!-- Description de l'exploitation-->
                <div class="form-group row">                    
                    <label for="descriptionProducer" class="col-md-6 col-form-label" >Description*</label>         
                    <div class="col-md-10">
                        <textarea  id="descriptionProducer" name="descriptionProducer" rows="4" cols="38" placeholder="Présentez-vous et votre exploitation. Décrivez les produits que vous vendez."></textarea>
                        <small class="text-danger">         
                            <?php
                            if (isset($producer->formErrors['description'])) {
                                echo $producer->formErrors['description'];
                            }
                            ?>
                        </small>
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
</div>
<?php include '../utilities/footer.php'; ?>
<!-- Modal -->
<div class="modal fade" id="modal-<?= $producer->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="deleteProducer.php?id=<?= $producerProfile->id ?>" class="btn btn-primary">Confimer</a>
            </div>
        </div>
    </div>
</div>

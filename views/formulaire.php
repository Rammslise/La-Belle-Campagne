<?php
session_start();

require '../init/functions.php';
require '../init/credentials.php';
require '../models/database.php';
require '../models/client.php';
require '../models/producer.php';
require_once '../controllers/formulaireClientCtrl.php';
require_once '../controllers/formulaireProducerCtrl.php';
include '../utilities/header.php';
?>

<?php if (isset($message)) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $message ?>
    </div>
<?php } ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md text-center">
            <p class="h2 p-2"><span>Créer mon compte</span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md text-center">
            <p class="h4" id="idTitle">Vous êtes ?</p>            
        </div>        
    </div>
    <div class="row">
        <div class="col-md text-center mt-2">
            <small>* Champs obligatoires</small>
        </div>
    </div>

    <!-- Formulaire d'inscription-->
    <div id="registrationForm" class="mt-4">
        <ul class="nav nav-tabs" id="RegistrationTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="client-tab" data-toggle="tab" href="#client" role="tab" aria-controls="client" aria-selected="true">Client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="producer-tab" data-toggle="tab" href="#producer" role="tab" aria-controls="producer" aria-selected="false">Producteur</a>
            </li>
        </ul>
        <div class="tab-content" id="RegistrationTab">
            <!-- Formulaire client -->
            <div class="tab-pane fade show active" id="client" role="tabpanel" aria-labelledby="home-tab">   
                <form method="POST" action="" id="formClient">
                    <!-- Enregistrer son pseudo-->
                    <div class="form-group row">
                        <label for="pseudo" class="col-md-6 col-form-label">Pseudo*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="pseudo" placeholder="15 carac. max" id="pseudo"  />
                            <small class="text-danger">         
                                <?php
                                if (isset($client->formErrors['pseudo'])) {
                                    echo $client->formErrors['pseudo'];
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                    <!-- Inscription par mail-->
                    <div class="form-group row">
                        <label for="mail" class="col-md-6 col-form-label">Email*</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="mail" name="mail" placeholder="adresse@example.com" value="<?= isset($client->mail) ? $client->mail : ''; ?>" />
                            <small class="text-danger">       
                                <!-- Insertion du message d'erreur sur les champs-->
                                <?php
                                if (isset($client->formErrors['mail'])) {
                                    echo $client->formErrors['mail'];
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                    <!-- Enregistrer son mot de passe-->
                    <div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label">Mot de passe*</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="password" id="password"  />
                            <small class="text-danger">         
                                <?php
                                if (isset($client->formErrors['password'])) {
                                    echo $client->formErrors['password'];
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                    <!-- Confirmation du mot de passe-->
                    <div class="form-group row">
                        <label for="confirmPassword" class="col-md-6 col-form-label">Confirmation*</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"  />
                            <small class="text-danger">         
                                <?php
                                if (isset($client->formErrors['confirmPassword'])) {
                                    echo $client->formErrors['confirmPassword'];
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                    <button type="submit" name="submitClient" class="btn btn-success rounded-pill"><span>Valider</span></button>
                </form>
            </div>
            <!-- Formulaire Producteur-->
            <div class="tab-pane fade" id="producer" role="tabpanel" aria-labelledby="profile-tab">
                <div class="tab-pane fade show active" id="client" role="tabpanel" aria-labelledby="home-tab">   
                    <form method="POST" action="" id="formProducer" enctype="multipart/form-data">
                        <!-- Inscription par mail-->
                        <div class="form-group row">
                            <label for="mail" class="col-md-6 col-form-label">Email*</label>
                            <div class="col-md-10">
                                <input type="email" name="mail" class="form-control" id="mail" placeholder="adresse@example.com" value="<?= isset($producer->mail) ? $producer->mail : ''; ?>" />
                                <small class="text-danger">         
                                    <?php
                                    if (isset($producer->formErrors['mail'])) {
                                        echo $producer->formErrors['mail'];
                                    }
                                    ?>
                                </small>
                            </div>
                        </div>
                        <!-- Enregistrer son mot de passe-->
                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label">Mot de passe*</label>
                            <div class="col-md-10">
                                <input type="password" name="password" class="form-control" id="password" />
                                <small class="text-danger">         
                                    <?php
                                    if (isset($producer->formErrors['password'])) {
                                        echo $producer->formErrors['password'];
                                    }
                                    ?>
                                </small>
                            </div>
                        </div>
                        <!-- Confirmation du mot de passe-->
                        <div class="form-group row">
                            <label for="confirmPassword" class="col-md-6 col-form-label">Confirmation*</label>
                            <div class="col-md-10">
                                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword"  />
                                <small class="text-danger">         
                                    <?php
                                    if (isset($producer->formErrors['confirmPassword'])) {
                                        echo $producer->formErrors['confirmPassword'];
                                    }
                                    ?>
                                </small>
                            </div>
                        </div> 
                        <!-- Nom de famille -->
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="lastname" class="col-form-label">Votre nom*</label>                     
                                <input type="text" class="form-control" id="lastname" name="lastname" />
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
                                <input type="text" class="form-control" id="firstname" name="firstname" />
                                <small class="text-danger">         
                                    <?php
                                    if (isset($producer->formErrors['firstname'])) {
                                        echo $producer->formErrors['firstname'];
                                    }
                                    ?>
                                </small>
                            </div>
                        </div>
                        <!-- Nom de l'exploitation agricole -->
                        <div class="form-group row">
                            <label for="companyName"class="col-md-6 col-form-label" >Nom de votre exploitation*</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="companyName" name="companyName" value="<?= isset($producer->companyName) ? $producer->companyName : ''; ?>"/>
                                <small class="text-danger">         
                                    <?php
                                    if (isset($producer->formErrors['companyName'])) {
                                        echo $producer->formErrors['companyName'];
                                    }
                                    ?>
                                </small>
                            </div>
                        </div>
                        <!-- Lieu de l'exploitation -->
                        <div class="form-group row">                    
                            <label for="city" class="col-md-6 col-form-label" >Lieu*</label>         
                            <div class="col-md-10">
                                <input  type="text" id="city" name ="city" />
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
                            <label for="description" class="col-md-6 col-form-label" >Description*</label>         
                            <div class="col-md-10">
                                <textarea  id="description" name="description" rows="4" cols="38" placeholder="Présentez-vous et votre exploitation. Décrivez les produits que vous vendez."></textarea>
                                <small class="text-danger">         
                                    <?php
                                    if (isset($producer->formErrors['description'])) {
                                        echo $producer->formErrors['description'];
                                    }
                                    ?>
                                </small>
                            </div>
                        </div>
                        <button type="submit" name="submitProducer" class="btn btn-success rounded-pill"><span>Valider</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require '../utilities/footer.php'; ?>

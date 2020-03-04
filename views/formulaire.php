<?php
session_start();

require '../init/functions.php';
require '../init/credentials.php';
require '../models/database.php';
require '../models/client.php';
//require '../models/producer.php';
require '../controllers/formulaireCtrl.php';
include '../utilities/header.php';
?>

<!--Message erreur -->
<?php if (isset($message)) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $message ?>
    </div>
<?php } ?>

<div class="row">
    <div class="col-md-12 text-center">
        <h2><span>Créer mon compte</span></h2>
    </div>
</div>
<div class="row p-4">
    <div class="col-md-12 text-center">
        <h4 id="idTitle">Vous êtes ?</h4>
    </div>
</div>

<!-- Formulaire d'inscription-->
<div id="registrationForm">
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
                <!-- Enregistrer son mot de passe-->
                <div class="form-group row">
                    <label for="pseudo" class="col-md-6 col-form-label">Pseudo*</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="pseudo" placeholder="10 carac. max" id="pseudo"  />
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
                <button type="submit" name="submitClient" class="btn btn-success rounded-pill">Valider</button>
            </form>
        </div>

        <!-- Formulaire Procuteur-->
        <div class="tab-pane fade" id="producer" role="tabpanel" aria-labelledby="profile-tab">
            <div class="tab-pane fade show active" id="client" role="tabpanel" aria-labelledby="home-tab">   
                <form method="POST" action="" id="formProducer" enctype="multipart/form-data">
                    <!-- Inscription par mail-->
                    <div class="form-group row">
                        <label for="mail" class="col-md-6 col-form-label">Email*</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="mailForm" placeholder="adresse@example.com" value="" />
                            <small class="text-danger">         
                                <!-- Placer le tableau d'erreurs php-->
                            </small>
                        </div>
                    </div>
                    <!-- Enregistrer son mot de passe-->
                    <div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label">Mot de passe*</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" id="password" value="" />
                            <small class="text-danger">         
                                <!-- Placer le tableau d'erreurs php-->
                            </small>
                        </div>
                    </div>
                    <!-- Confirmation du mot de passe-->
                    <div class="form-group row">
                        <label for="confirmPassword" class="col-md-6 col-form-label">Confirmation*</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" id="confirmPassword"  value="" />
                            <small class="text-danger">         
                                <!-- Placer le tableau d'erreurs php-->
                            </small>
                        </div>
                    </div>
                    <!-- Nom de l'exploitation agricole -->
                    <div class="form-group row">
                        <label for="name"class="col-md-6 col-form-label" >Nom de la société*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="name" value="" />
                            <small class="text-danger">         
                                <!-- Placer le tableau d'erreurs php-->
                            </small>
                        </div>
                    </div>
                    <!-- Adresse de l'exploitation -->
                    <div class="form-group row">                    
                        <label for="address" class="col-md-6 col-form-label" >Adresse*</label>         
                        <div class="col-md-10">
                            <textarea  id="address" name ="address" rows="4" cols="38" value="" >
                            </textarea>
                            <small class="text-danger">         
                                <!-- Placer le tableau d'erreurs php-->
                            </small>
                        </div>
                    </div>
                    <!-- Code postal -->
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="zipCode" class="col-form-label">Code postal*</label>                     
                            <input type="text" class="form-control" id="zipCode" name="zipCode" value="" />
                            <small class="text-danger">         
                                <!-- Placer le tableau d'erreurs php-->
                            </small>
                        </div>
                        <!-- Ville-->
                        <div class="col-md-5">
                            <label for="place" class="col-form-label">Lieu*</label>
                            <input type="text" class="form-control" id="place" name="place" value="" />
                            <small class="text-danger">         
                                <!-- Placer le tableau d'erreurs php-->
                            </small>
                        </div>
                    </div>
                    <!-- Insertion du logo-->
                    <div class="form-group row">
                        <div class="col-10">
                            <label for="logo" class="col-form-label">Logo*</label>
                            <input type="file" class="form-control" id="logo" name="logo" />
                            <small id="fileHelp" class="form-text text-muted">Insérer votre fichier</small>
                            <small class="text-danger">         
                                <!-- Placer le tableau d'erreurs php-->
                            </small>
                        </div>
                    </div>
                    <!-- Description de l'exploitation-->
                    <div class="form-group row">                    
                        <label for="descriptionProducer" class="col-md-6 col-form-label" >Description*</label>         
                        <div class="col-md-10">
                            <textarea  id="descriptionProducer" name="descriptionProducer" rows="4" cols="38"> </textarea>
                            <!-- Présentez-vous et votre exploitation. Décrivez les produits que vous vendez.-->
                            <small class="text-danger">         
                                <!-- Placer le tableau d'erreurs php-->
                            </small>
                        </div>
                    </div>
                    <button type="submit" name="submitProducer" class="btn btn-success rounded-pill">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../utilities/footer.php'; ?>
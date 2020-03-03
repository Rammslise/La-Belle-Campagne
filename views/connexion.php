<?php
session_start();

require_once '../init/credentials.php';
require_once '../init/functions.php';
require_once '../models/database.php';
require_once '../models/client.php';
require_once '../models/producer.php';
require_once '../controllers/connexionCtrl.php';
include '../utilities/header.php';
?>

<h3 class="text-center"><span>Se connecter</span></h3>
<div class="row">   
    <div class="col-4 ml-2">
        <h5>Nouveau client / Nouveau producteur</h5>
        <h6>Inscription</h6>
        <p>En vous créant un compte, vous allez pouvoir commander et régler directement.</p>
        <input type="button" class="btn btn-success disabled rounded-pill" onclick=window.location.href='formulaire.php'; value="Continuer" />
    </div>
    <span class="border-right border-dark"></span>
    <div id="connexionContainer" class="col-4 ml-4">
        <form method="POST" action="">
            <div>
                <h5>Identification</h5>
                <h6>Déjà chez nous</h6>
                <label for="mail">Adresse mail : </label>
                <input type="email" class="form-control" id="mail" name="mail" placeholder="adresse@example.com" value="<?= isset($client->mail) ? $client->mail : ''; ?>"  /> 
                <small class="text-danger">       
                    <!-- Insertion du message d'erreur sur les champs-->
                    <?php
                    if (isset($client->formErrors['mail'])) {
                        echo $client->formErrors['mail'];
                    }
                    ?>
                </small>
                <div>
                    <label for='password'>Mot de passe :</label>
                    <input type="password" class="form-control" name="password" id="password" />
                    <small class="text-danger">       
                        <!-- Insertion du message d'erreur sur les champs-->
                        <?php
                        if (isset($client->formErrors['password'])) {
                            echo $client->formErrors['password'];
                        }
                        ?>
                    </small> 
                </div>
                <button type="submit" name="submitClient" class="btn btn-success disabled rounded-pill mt-2">Se connecter</button>
            </div>
        </form>
    </div>
    <span class="border-right border-dark"></span>
    <div class="col-3">         
        <ul id="accountList">
            <h5>Compte</h5>
            <li>> Inscription / Connexion</li>
            <li>> Mot de passe oublié</li>
            <li>> Mon compte</li>
            <li>> Carnet d'adresses</li>
            <li>> Historique des commandes</li>
            <li>> Lettre d'information</li>
        </ul>
    </div>
</div>
<?php include '../utilities/footer.html'; ?>
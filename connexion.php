<?php
include 'utilities/header.php';
?>
<h3 class="text-center">Se connecter</h3>
<div class="row">   
    <div class="col-4">
        <h5>Nouveau client / Nouveau producteur</h5>
        <h6>Inscription</h6>
        <p>En vous créant un compte, vous allez pouvoir commander et régler directement.</p>
        <button type="button" class="btn btn-success disabled rounded-pill">Continuer</button>
    </div>
    <div id="connexionContainer" class="col-4">
        <form method="POST" action="">
            <div>
                <h5>Identification</h5>
                <h6>Déjà chez nous</h6>
                <p>Adresse mail :</p>
                <input type="text"  />
                <p>Mot de passe :</p>
                <input type="text" />
                <button type="submit" name="submit" class="btn btn-success disabled rounded-pill pt-2">Se connecter</button>
            </div>
        </form>
    </div>
    <div class="col-4">         
        <ul id="accountList">
            <h5>Compte</h5>
            <li>> Connexion / Enregistrement</li>
            <li>> Mot de passe oublié</li>
            <li>> Mon compte</li>
            <li>> Carnet d'adresses</li>
            <li>> Historique des commandes</li>
            <li>> Lettre d'information</li>
        </ul>
    </div>
</div>
<?php
include 'utilities/footer.html';
?>
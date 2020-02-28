<?php require 'utilities/header.php'; ?>

    <!--Message de succès ou d'erreur -->
    <?php if (isset($message)) { ?>
        <div class="alert alert-success" role="alert">
            <?= $message ?>
        </div>
    <?php } ?>
    
<h3 class="text-center">Se connecter</h3>
<div class="row">   
    <div class="col-4 ml-2">
        <h5>Nouveau client / Nouveau producteur</h5>
        <h6>Inscription</h6>
        <p>En vous créant un compte, vous allez pouvoir commander et régler directement.</p>
        <input type="button" class="btn btn-success disabled rounded-pill" onclick=window.location.href='views/formulaire.php'; value="Continuer" />
    </div>
    <span class="border-right border-dark"></span>
    <div id="connexionContainer" class="col-4 ml-4">
        <form method="POST" action="">
            <div>
                <h5>Identification</h5>
                <h6>Déjà chez nous</h6>
                <p>Adresse mail :
                    <input type="text"  /> </p>
                <p>Mot de passe :
                    <input type="text" /> </p>
                <button type="submit" name="submit" class="btn btn-success disabled rounded-pill mt-2">Se connecter</button>
            </div>
        </form>
    </div>
    <span class="border-right border-dark"></span>
    <div class="col-3">         
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
<?php require 'utilities/footer.html'; ?>
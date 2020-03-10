<!-- J'inclus tous les scripts nécessaires, ainsi que les liens et le html-->
<!DOCTYPE html>
<!-- Language fr, lecture de left to right-->
<html lang="fr" dir="ltr">
    <head>
        <!-- coder l’ensemble des caractères du « répertoire universel de caractères codés -->
        <meta charset="utf-8" />
        <!-- Définit les dimensions d'une page web-->
        <meta name= "viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Définit la relation entre le document courant et une ressource externe-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora&display=swap" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
        <link rel="shortcut icon" type="image/png" href="../assets/img/header/icone.png"/>
        <link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/css/style.css" />
        <title>La Belle Campagne</title>
    </head>
    <header>
        <div class="row" id="listHeader">
            <div class="col-md-3 mt-4 text-center">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">'Il faut cultiver notre jardin'</p>
                    <footer class="blockquote-footer">Voltaire <cite title="Source Title">Candide ou l'Optimisme</cite></footer>
                </blockquote>
            </div>
            <div class="col-md-4 text-center">
                <img src="../assets/img/header/logoHeader.png" class="img-fluid" alt="logoTree" id="logoHeader"/>
            </div>  
            <div class="col-md-4 mt-4">              
                <ul id="linkHeader">
                    <?php if (isProducer()) { ?><a href="../views/producerProfile.php?id=<?= htmlspecialchars($_SESSION['user_id']) ?>"><?= 'Bonjour et bienvenue'; ?></a> | 
                        <a href="../views/deconnexion.php">Déconnexion</a> |
                    <?php } elseif (isClient() || isAdmin()) { ?><a href="../views/clientProfile.php?id=<?= htmlspecialchars($_SESSION['user_id']) ?>"><?= 'Bonjour ' . htmlspecialchars($_SESSION['pseudo']); ?></a> | 
                        <a href="../views/deconnexion.php">Déconnexion</a> |
                    <?php } else { ?>                                                                                                   
                        <li><a href="../views/connexion.php">Inscription</a>|</li>
                        <li><a href="../views/connexion.php">Connexion</a>|</li>                         
                    <?php } ?>
                    <li>
                        <a href="../views/basket.php" >Panier</a>   
                        <img src="../assets/img/header/basket.png" class="img-fluid mb-2" alt="basketLogo" width="20"/>           
                    </li>
                </ul>
            </div>
        </div>            
    </div>  
</header>
<?php include 'navbar.php'; ?>
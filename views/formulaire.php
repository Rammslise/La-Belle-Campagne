<?php
// Démarrage de la session
session_start();

/* 
 * Require_once inclut et exécute le fichier, mais lorsqu'une erreur survient, il produit également une erreur fatale.
 * Il stoppera le script alors qu'Include n'émettra qu'une alerte et de continuer le script.
 * PHP vérifie si le fichier a déjà été inclus, et si oui, ne l'inclut pas une deuxième fois.
 */
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../init/database.php';
require_once '../controllers/formulaireCtrl';
require '';
?>


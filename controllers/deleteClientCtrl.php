<?php
$client = new Client();

// Condition qui permet de vérifier les parametres d'URL
if (isset($_GET['id']) && $_GET['id'] > 0){
    
    $client->id = htmlspecialchars($_GET['id']);

    $success = $client->deleteClient();

    if ($success) {

        // création du message de confirmation 
        $_SESSION['message'] = 'Votre compte a bien été supprimé';
        header('Location: ../index.php');
        exit();
    }
} else {
    // Le else permet de renvoyer l'utilisateur si il y a autre chose qu'un type int
    header('Location: ../index.php');
    exit();
}
?>

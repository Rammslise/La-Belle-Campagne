<?php

$client = new Client();

if (isset($_SESSION['message'])) {
    $message = htmlspecialchars($_SESSION['message']);
    unset($_SESSION['message']);
}

// Permet de ne pas permettre àl'utilisateur de changer l'id du profil Client.
if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION['user_id']) && isset ($_SESSION['user_role']) && isset($_SESSION['pseudo']) && $_GET['id'] == $_SESSION['user_id']) {

    $client->id = htmlspecialchars($_GET['id']);

    //récupération du profil Client
    $clientProfile = $client->ClientProfileById();

    if (!is_object($clientProfile)) {
        header('Location: ../views/clientProfile.php');
        exit();
    }
} else {
    header('Location: ../index.php');
    exit();
}
?>

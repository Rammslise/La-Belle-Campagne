<?php

$client = new Client();

if (isset($_SESSION['message'])) {
    $message = htmlspecialchars($_SESSION['message']);
    unset($_SESSION['message']);
}

if (isset($_GET['id']) && $_GET['id'] > 0) {

    $client->id = htmlspecialchars($_GET['id']);

    //récupération du profil Client
    $clientProfile = $client->ClientProfileById();

    if (!is_object($clientProfile)) {
        header('Location: clientList.php');
        exit();
    }
} else {
    header('Location: clientList.php');
    exit();
}
?>

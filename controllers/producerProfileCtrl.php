<?php

$producer = new Producer();

if (isset($_SESSION['message'])) {
    $message = htmlspecialchars($_SESSION['message']);
    unset($_SESSION['message']);
}

if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_SESSION['user_id']) && isset ($_SESSION['user_role']) && $_GET['id'] == $_SESSION['user_id']) {

    $producer->id = htmlspecialchars($_GET['id']);

    //récupération du profil Producteur
    $producerProfile = $producer->producerProfileById();

    if (!is_object($producerProfile)) {
        header('Location: ../views/producerProfile.php');
        exit();
    }
} else {
    header('Location: ../index.php');
    exit();
}
?>

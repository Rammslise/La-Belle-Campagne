<?php

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $_GET['id']) {
    $client = new Client();

    if (isset($_GET['id']) && $_GET['id'] > 0) {

        $client->id = htmlspecialchars($_GET['id']);
        $success = $client->deleteClient();

        if ($success) {
            $_SESSION['message'] = 'Le compte a bien été supprimé';
            if ($client->id == $_SESSION['user_id']) {
                session_destroy();
            }
            header('Location: ../index.php');
            exit();
        }
    } else {
        header('Location: ../index.php');
        exit();
    }
}
?>

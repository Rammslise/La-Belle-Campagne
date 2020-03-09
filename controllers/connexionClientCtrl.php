<?php

$client = new Client();

if (isset($_SESSION['message'])) {
    $message = htmlspecialchars($_SESSION['message']);
    unset($_SESSION['message']);
}

// Regex MAIL
define('MAIL_REGEX', '/^[^\W]?[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z]{2,4}$/');

if (isset($_POST['submit'])) {

    // Récupération des données du formulaire du Client
    $client->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $client->password = isset($_POST['password']) ? $_POST['password'] : '';

    // Vérfication du MAIL CLIENT
    if (empty($client->mail)) {
        $client->formErrors['mail'] = 'Veuillez entrer votre mail de connexion';
    } elseif (!preg_match(MAIL_REGEX, $client->mail)) {
        $client->formErrors['mail'] = 'Adresse mail invalide';
    }

    // Vérification du MOT DE PASSE CLIENT
    if (empty($client->password)) {
        $client->formErrors['password'] = 'Champs obligatoire';
    }

    if (empty($client->formErrors)) {
        $clientFound = $client->clientProfile();

        if (is_object($clientFound) && password_verify($client->password, $clientFound->password)) {

            // Mise en session des données qui seront utiles
            $_SESSION['user_id'] = $clientFound->id;
            $_SESSION['user_role'] = $clientFound->id_7ie1z_roles;
            $_SESSION['pseudo'] = $clientFound->pseudo;

            // Redirection de l'utilisateur vers la page d'accueil      
            header('Location: ../index.php');
            exit();
        } else {
            // Renvoi d'un message d'erreur
            $client->formErrors['mail'] = 'Identifiants de connexion erronés';
            $client->formErrors['password'] = 'Identifiants de connexion erronés';
        }
    }
}
?> 


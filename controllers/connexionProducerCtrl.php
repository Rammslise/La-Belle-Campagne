<?php

$producer = new Producer();

if (isset($_SESSION['message'])) {
    $message = htmlspecialchars($_SESSION['message']);
    unset($_SESSION['message']);
}

if (isset($_POST['submit'])) {

    // Récupération des données du formulaire du Client
    $producer->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $producer->password = isset($_POST['password']) ? $_POST['password'] : '';

    // Vérfication du MAIL CLIENT
    if (empty($producer->mail)) {
        $producer->formErrors['mail'] = 'Veuillez entrer votre mail de connexion';
    } elseif (!preg_match(MAIL_REGEX, $producer->mail)) {
        $producer->formErrors['mail'] = 'Adresse mail invalide';
    }

    // Vérification du MOT DE PASSE CLIENT
    if (empty($producer->password)) {
        $producer->formErrors['password'] = 'Champs obligatoire';
    }

    if (empty($producer->formErrors)) {
        $producerFound = $producer->producerProfile();

        if (is_object($producerFound) && password_verify($producer->password, $producerFound->password)) {

            // Mise en session des données qui seront utiles
            $_SESSION['user_id'] = $producerFound->id;
            $_SESSION['user_role'] = $producerFound->id_7ie1z_roles;

            // Redirection de l'utilisateur vers la page d'accueil      
            header('Location: ../index.php');
            exit();
        } else {
            // Renvoi d'un message d'erreur
            $producer->formErrors['mail'] = 'Identifiants de connexion erronés';
            $producer->formErrors['password'] = 'Identifiants de connexion erronés';
        }
    }
}
?> 


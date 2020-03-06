<?php

// Création des instances de classe Producer
$producer = new Producer();

// Regex MAIL
define('MAIL_REGEX', '/^[^\W]?[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z]{2,4}$/');
// Regex SOCIÉTÉ et DESCRIPTION
define('COMPANY_DESCRIPTION_REGEX', '/^[a-zA-Z0-9À-ÿ\' -]+$/');
// Regex  NOM - PRÉNOM - LIEU
define('NAME_REGEX', '/^[a-zA-ZÀ-ÿ\' -]+$/');
// Regex IMAGE
define('PICTURE_REGEX', '/([^\s]+(\.(?i)(jpg|png|jpeg))$/)');

// Condition pour la partie du formulaire pour le Producteur.
if (isset($_POST['submitProducer'])) {

    // Récupération des données du formulaire du Producteur
    $producer->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $producer->password = isset($_POST['password']) ? $_POST['password'] : '';
    $producer->confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';
    $producer->nameCompany = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $producer->address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    $producer->picture = isset($_POST['picture']) ? htmlspecialchars($_POST['picture']) : '';
    $producer->description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    $producer->id_7ie1z_roles = 3;

    // Validation du MAIL PRODUCTEUR
    if (empty($producer->mail)) {
        $producer->formErrors['mail'] = 'Champs obligatoire';
    } elseif (!preg_match(MAIL_REGEX, $producer->mail)) {
        $producer->formErrors['mail'] = 'Merci de rentrer une adresse mail valide';
    } elseif (!$producer->hasUniqueMail()) {
        // Vérifie si l'adresse mail existe déjà en base de données
        $producer->formErrors['mail'] = 'Mail existant, veuillez saisir une adresse mail différente';
    }

    // Validation du MOT DE PASSE PRODUCTEUR
    if (empty($producer->password)) {
        $producer->formErrors['password'] = 'Champs obligatoire';
    } elseif (strlen($producer->password) < 6) {
        $producer->formErrors['password'] = 'Le mot de passe est trop court';
    }

    // Confirmation du MOT DE PASSE PRODUCTEUR
    if (empty($producer->confirmPassword)) {
        $producer->formErrors['confirmPassword'] = 'Champs obligatoire';
    } elseif ($producer->password !== $producer->confirmPassword) {
        $producer->formErrors['confirmPassword'] = 'Mot de passe non-identique';
    }

    // Validation du NOM DE LA SOCIÉTÉ
    if (empty($producer->nameCompany)) {
        $producer->formErrors['nameCompany'] = 'Champs obligatoire';
    } elseif (!preg_match(COMPANY_DESCRIPTION_REGEX, $producer->mail)) {
        $producer->formErrors['nameCompany'] = 'Merci de rentrer un nom valide';
    }

    // Validation de ADRESSE
    if (empty($producer->address)) {
        $producer->formErrors['address'] = 'Champs obligatoire';
    } elseif (!preg_match(NAME_REGEX, $producer->address)) {
        $producer->formErrors['address'] = 'Merci de rentrer un nom valide';
    }

    // Validation LOGO
    if (empty($producer->picture)) {
        $producer->formErrors['picture'] = 'Champs obligatoire';
    } elseif (!preg_match(PICTURE_REGEX, $producer->picture)) {
        $producer->formErrors['picture'] = 'Format non accepté';
    }
    
    //Validation DESCRIPTION
    if (empty($producer->description)) {
        $producer->formErrors['description'] = 'Champs obligatoire';
    } elseif (!preg_match(COMPANY_DESCRIPTION_REGEX, $producer->description)){
        $producer->formErrors['description'] = 'Caractères spéciaux non acceptés';
    }

// Si toutes les conditions sont remplies et que le tableau d'erreurs est vide
    if (empty($producer->formErrors)) {

        // Hashage du MDP pour une sécurité supplémentaire +  //Password_default = password_bcrypt (b = blowfish)
        $producer->password = password_hash($producer->password, PASSWORD_DEFAULT);

        // Insertion du client en base de données
        $success = $producer->createProducer();

        // Message de succès ou non
        if ($success) {
            $_SESSION['message'] = 'Votre compte a bien été créé, veuillez vous connecter';
            header('Location: connexion.php');
            exit();
        } else {
            $message = 'Votre compte n\'a pas pu être créé';
        }
    }
}
?>


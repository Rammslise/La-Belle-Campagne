<?php

// Création des instances de classe Producer
$producer = new Producer();

// Regex SOCIÉTÉ et DESCRIPTION et VILLE
define('COMPANY_DESCRIPTION_REGEX', '/^[a-zA-Z0-9À-ÿ\' -]+$/');
// Regex  NOM - PRÉNOM - LIEU
define('NAME_REGEX', '/^[a-zA-ZÀ-ÿ\' -]+$/');

// Condition pour la partie du formulaire pour le Producteur.
if (isset($_POST['submitProducer'])) {

    // Récupération des données du formulaire du Producteur
    $producer->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $producer->password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    $producer->confirmPassword = isset($_POST['confirmPassword']) ? htmlspecialchars($_POST['confirmPassword']) : '';
    $producer->lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '';
    $producer->firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '';
    $producer->nameCompany = isset($_POST['companyName']) ? htmlspecialchars($_POST['companyName']) : '';
    $producer->city = isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '';
    $producer->fileUrl = isset($_POST['fileUrl']) ? htmlspecialchars($_POST['fileUrl']) : '';
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
    if (empty($producer->companyName)) {
        $producer->formErrors['companyName'] = 'Champs obligatoire';
    } elseif (!preg_match(COMPANY_DESCRIPTION_REGEX, $producer->companyName)) {
        $producer->formErrors['companyName'] = 'Merci de rentrer un nom valide';
    }

    // Validation du NOM DE FAMILLE
    if (empty($producer->lastname)) {
        $producer->formErrors['lastname'] = 'Champs obligatoire';
    } elseif (!preg_match(NAME_REGEX, $producer->lastname)) {
        $producer->formErrors['lastname'] = 'Merci de rentrer un nom valide';
    }

    // Validation du PRÉNOM
    if (empty($producer->firstname)) {
        $producer->formErrors['firstname'] = 'Champs obligatoire';
    } elseif (!preg_match(NAME_REGEX, $producer->firstname)) {
        $producer->formErrors['firstname'] = 'Merci de rentrer un prénom valide';
    }

    // Validation de VLLE
    if (empty($producer->city)) {
        $producer->formErrors['city'] = 'Champs obligatoire';
    } elseif (!preg_match(COMPANY_DESCRIPTION_REGEX, $producer->city)) {
        $producer->formErrors['city'] = 'Merci de rentrer un nom correct';
    } elseif (strlen($producer->city) > 100) {
        $producer->formErrors['city'] = 'Caractères maximums autorisés';
    }

    // Validation du FICHIER
    if (isset($_FILES['fileUrl'])) {
        $infoFile = pathinfo($_FILES['fileUrl']['name']);
//        $extensionUpload = $infoFile['extension'];
        $extensionSize = 4000000;

        if (empty($_FILE['fileUrl'])) {
            $producer->formErrors['fileUrl'] = 'Champs obligatoire';
        }
        if ($_FILES['fileUrl'] != $extensionSize) {
            'Format non accepté';
        }

        if ($extensionUpload == 'png' || 'jpg' || 'jpeg' || 'PNG' || 'JPG' || 'JPEG') {
            'Votre fichier a été correctement téléchargé';
        } else {
            'Merci de mettre votre fichier au bon format';
        }
        
        //Validation DESCRIPTION
        if (empty($producer->description)) {
            $producer->formErrors['description'] = 'Champs obligatoire';
        } elseif (!preg_match(COMPANY_DESCRIPTION_REGEX, $producer->description)) {
            $producer->formErrors['description'] = 'Caractères spéciaux non acceptés';
        }
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


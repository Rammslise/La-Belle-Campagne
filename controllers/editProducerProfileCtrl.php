<?php

$profile = new Producer();

// Regex SOCIÉTÉ et DESCRIPTION et VILLE
define('COMPANY_DESCRIPTION_REGEX', '/^[a-zA-Z0-9À-ÿ\' -]+$/');
// Regex  NOM - PRÉNOM - LIEU
define('NAME_REGEX', '/^[a-zA-ZÀ-ÿ\' -]+$/');

if (isset($_POST['submit'])) {

    $profile->id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
    $profile->nameCompany = isset($_POST['nameCompany']) ? htmlspecialchars($_POST['nameCompany']) : '';
    $profile->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $profile->password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    $profile->confirmPassword = isset($_POST['confirmPassword']) ? htmlspecialchars($_POST['confirmPassword']) : '';
    $profile->lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '';
    $profile->firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '';
    $profile->city = isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '';
    $profile->description = isset($_POST['descritpion']) ? htmlspecialchars($_POST['description']) : '';
    $imageArray = isset($_FILES['profilPicture']) ? $_FILES['profilPicture'] : array();

    // Changement du NOM DE LASOCIÉTÉ
    if (empty($profile->nameCompany)) {
        $profile->formErrors['nameCompany'] = 'Champs obligatoire';
    } elseif (!preg_match(COMPANY_DESCRIPTION_REGEX, $profile->nameCompany)) {
        $profile->formErrors['nameCompany'] = 'Caractères spéciaux non autorisés';
    }

    // Changement et validation du MAIL
    if (empty($profile->mail)) {
        $profile->formErrors['mail'] = 'Champs obligatoire';
    } elseif (!preg_match(MAIL_REGEX, $profile->mail)) {
        $profile->formErrors['mail'] = 'Merci de rentrer une adresse mail valide';
    }

    // Changement du MOT DE PASSE 
    if (empty($profile->password)) {
        $profile->formErrors['password'] = 'Champs obligatoire';
    } elseif (strlen($profile->password) < 6) {
        $profile->formErrors['password'] = 'Le mot de passe est trop court';
    }

    // Validation du MOT DE PASSE 
    if (empty($profile->confirmPassword)) {
        $profile->formErrors['confirmPassword'] = 'Champs obligatoire';
    } elseif ($profile->confirmPassword !== $profile->password) {
        $profile->formErrors['confirmPassword'] = 'Mot de passe différent';
    }

    // Changement du NOM
    if (empty($profile->lastname)) {
        $profile->formErrors['lastname'] = 'Merci de remplir ce champs';
    } elseif (!preg_match(NAME_REGEX, $profile->lastname)) {
        $profile->formErrors['lastname'] = 'Le format du nom renseigné n\'est pas valide';
    } elseif (strlen($profile->lastname) < 2 || strlen($profile->lastname) > 25) {
        $profile->formErrors['lastname'] = 'Le nom doit comporté entre 2 et 25 caractères';
    }

    // Changement du PRÉNOM
    if (empty($profile->firstname)) {
        $profile->formErrors['firstname'] = 'Merci de remplir ce champs';
    } elseif (!preg_match(NAME_REGEX, $profile->firstname)) {
        $profile->formErrors['firstname'] = 'Le format du prénom renseigné n\'est pas valide';
    } elseif (strlen($profile->firstname) < 2 || strlen($profile->firstname) > 25) {
        $profile->formErrors['firstname'] = 'Le prénom doit comporté entre 2 et 25 caractères';
    }

    // Changement de VLLE
    if (empty($producer->city)) {
        $producer->formErrors['city'] = 'Champs obligatoire';
    } elseif (!preg_match(COMPANY_DESCRIPTION_REGEX, $producer->city)) {
        $producer->formErrors['city'] = 'Merci de rentrer un nom correct';
    } elseif (strlen($producer->city) > 100) {
        $producer->formErrors['city'] = 'Caractères maximums autorisés';
    }

    // Changement de IMAGE
    if (empty($imageArray['name'])) {
        $producer->formErrors['profilPicture'] = 'Champs obligatoire';
    } else {
        // Analyse des données du fichier
        $fileName = strtolower(basename($imageArray['name']));
        $fileExtension = strrchr($fileName, '.');
        $fileSource = $imageArray['tmp_name'];
        $fileSize = filesize($fileSource);
    }
    if ($fileSize > 1000000) {
        $producer->formErrors['profilPicture'] = 'Le fichier ne doit pas dépasser 1Mo';
    } elseif ($fileExtension != '.png' && $fileExtension != '.jpg' && $fileExtension != '.jpeg' && $fileExtension != '.gif') {
        $producer->formErrors['profilPicture'] = 'Extension incorrecte';
    }

    //Validation DESCRIPTION
    if (empty($producer->description)) {
        $producer->formErrors['description'] = 'Champs obligatoire';
    } elseif (!preg_match(COMPANY_DESCRIPTION_REGEX, $producer->description)) {
        $producer->formErrors['description'] = 'Caractères spéciaux non acceptés';
    }


    // Mise à jour du profil Producteur en BDD 
    if (empty($profile->formErrors)) {

        //toujours password_hash avant de mettre à jour le profil Producteur
        $profile->password = password_hash($profile->password, PASSWORD_DEFAULT);
        $success = $profile->editProducerProfile();

        if ($success) {
            $_SESSION['message'] = 'Votre profil a bien été modifié';
            header('Location: ../index.php?id=' . $profile->id);
            exit();
        } else {
            $message = 'Impossible de modifier votre profil';
        }
    }
} elseif (isset($_GET['id']) && $_GET['id'] > 0) {

    $producer->id = htmlspecialchars($_GET['id']);

    //récupération du profil Producteur
    $profile = $producer->producerProfileById();

    if (!is_object($profile)) {
        header('Location: ../views/producerProfile.php');
        exit();
    }
}
?>

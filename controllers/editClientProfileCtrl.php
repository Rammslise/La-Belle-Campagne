<?php

$profile = new Client();

//regex MAIL
define('MAIL_REGEX', '/\A[A-Z0-9.%+-]+@[A-Z0-9.-]+.[A-Z]{2,}\Z/i');

if (isset($_POST['validateSubmit'])) {

    $profile->id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
    $profile->pseudo = isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : '';
    $profile->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $profile->password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

    // Validation du PSEUDO client
    if (empty($profile->pseudo)) {
        $profile->formErrors['pseudo'] = 'Champs obligatoire';
    } elseif (strlen($profile->pseudo) > 15) {
        $profile->formErrors['pseudo'] = 'Pseudo trop long';
    }

    // Changement et validation du MAIL
    if (empty($profile->mail)) {
        $profile->formErrors['mail'] = 'Champs obligatoire';
    } elseif (!preg_match(MAIL_REGEX, $profile->mail)) {
        $profile->formErrors['mail'] = 'Merci de rentrer une adresse mail valide';
    } elseif (!$profile->hasUniqueMail()) {
        $profile->formErrors['mail'] = 'Mail existant, veuillez saisir une adresse mail différente';
    }

    // Changement du MOT DE PASSE CLIENT
    if (empty($profile->password)) {
        $profile->formErrors['password'] = 'Champs obligatoire';
    } elseif (strlen($profile->password) < 6) {
        $profile->formErrors['password'] = 'Le mot de passe est trop court';
    }

    // Mise à jour du profil Client en BDD 
    if (empty($profile->formErrors)) {
        $success = $profile->editClientProfile();
        $profile->password = password_hash($profile->password, PASSWORD_DEFAULT);

        if ($success) {
            $_SESSION['message'] = 'Votre profil a bien été modifié)';
            header('Location: ../index.php?id=' . $profile->id);
            exit();
        } else {
            $message = 'Impossible de modifier le patient';
        }
    }
}
?>

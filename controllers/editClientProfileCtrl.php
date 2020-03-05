<?php
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $_GET['id'] ){
$profile = new Client();

//regex MAIL
define('MAIL_REGEX', '/\A[A-Z0-9.%+-]+@[A-Z0-9.-]+.[A-Z]{2,}\Z/i');

if (isset($_POST['submit'])) {

    $profile->id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
    $profile->id_7ie1z_roles = isset($_POST['roles']) ? htmlspecialchars($_POST['roles']) : '';
    $profile->pseudo = isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : '';
    $profile->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $profile->password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    $profile->confirmPassword = isset($_POST['confirmPassword']) ? htmlspecialchars($_POST['confirmPassword']) : '';

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
    }

    // Changement du MOT DE PASSE CLIENT
    if (empty($profile->password)) {
        $profile->formErrors['password'] = 'Champs obligatoire';
    } elseif (strlen($profile->password) < 6) {
        $profile->formErrors['password'] = 'Le mot de passe est trop court';
    }

    // Confirmation du MOT DE PASSE CLIENT
    if (empty($profile->confirmPassword)) {
        $profile->formErrors['confirmPassword'] = 'Champs obligatoire';
    } elseif ($profile->confirmPassword !== $profile->password) {
        $profile->formErrors['confirmPassword'] = 'Mot de passe différent';
    }
    
    // Mise à jour du profil Client en BDD 
    if (empty($profile->formErrors)) {
        
        //toujours password_hash avant de mettre à jour le profil Client
        $profile->password = password_hash($profile->password, PASSWORD_DEFAULT);
        $success = $profile->editClientProfile();


        if ($success) {
            $_SESSION['pseudo'] = $profile->pseudo;
            $_SESSION['message'] = 'Votre profil a bien été modifié';
            header('Location: ../index.php?id=' . $profile->id);
            exit();
        } else {
            $message = 'Impossible de modifier le patient';
        }
    }
} elseif (isset($_GET['id']) && $_GET['id'] > 0) {

    $client->id = htmlspecialchars($_GET['id']);

    //récupération du profil Patient
    $profile = $client->ClientProfileById();

    if (!is_object($profile)) {
        header('Location: ../views/clientProfile.php');
        exit();
    }
}
} else {
    header('Location: ../index.php');
    exit();
}
?>

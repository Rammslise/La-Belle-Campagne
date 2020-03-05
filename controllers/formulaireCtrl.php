<?php

// Création des instances de classe Client et Producer
$client = new Client();
//$producer = new Producer();

// Regex MAIL
define('MAIL_REGEX', '/^[^\W]?[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*\.[a-zA-Z]{2,4}$/');
// Regex NOM DE LA SOCIÉTÉ et VILLE
define('NAME_CITY_REGEX', '/^[a-zA-ZÀ-ÿ\' -]+$/');
// Regex ADRESSE
define('ADDRESS_REGEX', '/^[a-zA-ZÀ-ÿ\' -]{50}+$/');
// Regex CODE POSTAL
define('ZIP_CODE_REGEX', '/^[0-9]{5}$/');
// Regex LOGO
define('LOGO_REGEX', '');
// Regex DESCRIPTION
define('DESCRIPTION_REGEX', '/^[\da-zA-ZÀ-ÿ\' -]+$/');


// Condition pour la partie du formulaire pour le Client.
if (isset($_POST['submitClient'])) {

    // Récupération des données du formulaire du Client
    $client->pseudo = isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : '';
    $client->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $client->password = isset($_POST['password']) ? $_POST['password'] : '';
    $client->confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';
    $client->id_7ie1z_roles = 2;

    
    // Validation du PSEUDO client
      if (empty($client->pseudo)) {
        $client->formErrors['pseudo'] = 'Champs obligatoire';
    } elseif (strlen($client->pseudo) > 15) {
        $client->formErrors['pseudo'] = 'Pseudo trop long';
    }
    
    // Validation du MAIL CLIENT
    if (empty($client->mail)) {
        $client->formErrors['mail'] = 'Champs obligatoire';
    } elseif (!preg_match(MAIL_REGEX, $client->mail)) {
        $client->formErrors['mail'] = 'Merci de rentrer une adresse mail valide';
    } elseif (!$client->hasUniqueMail()) {
        // Vérifie si l'adresse mail existe déjà en base de données
        $client->formErrors['mail'] = 'Mail existant, veuillez saisir une adresse mail différente';
    }

    // Validation du MOT DE PASSE CLIENT
    if (empty($client->password)) {
        $client->formErrors['password'] = 'Champs obligatoire';
    } elseif (strlen($client->password) < 6) {
        $client->formErrors['password'] = 'Le mot de passe est trop court';
    }

    // Confirmation du MOT DE PASSE CLIENT
    if (empty($client->confirmPassword)) {
        $client->formErrors['confirmPassword'] = 'Champs obligatoire';
    } elseif ($client->password !== $client->confirmPassword) {
        $client->formErrors['confirmPassword'] = 'Mot de passe non-identique';
    }

    // Si toutes les conditions sont remplies et que le tableau d'erreurs est vide
    if (empty($client->formErrors)) {

        // Hashage du MDP pour une sécurité supplémentaire +  //Password_default = password_bcrypt (b = blowfish)
        $client->password = password_hash($client->password, PASSWORD_DEFAULT);
        
        // Insertion du client en base de données
        $success = $client->createClient();

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

//if(isset($_POST['submitProducer'])){
//    $producer->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
//    $producer->password = isset($_POST['password']) ? htmlspecialchars($_POST ['password']) : '';
//    $producer->confirmPassword = isset($_POST['confirmPassword']) ? htmlspecialchars($_POST['confirmPassword']) : '';
//    $producer->name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
//    $producer->address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
//}
?>


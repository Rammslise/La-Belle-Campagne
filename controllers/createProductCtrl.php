<?php

$producer = new Producer();
$product = new Product();

// Regex  NOM 
define('NAME_REGEX', '/^[a-zA-ZÀ-ÿ\' -]+$/');
// Regex DESCRIPTION
define('DESCRIPTION_REGEX', '/^[a-zA-Z0-9À-ÿ\' -]+$/');
// Regex poids et prix


if (isset($_POST['submit'])) {
  
    $product->name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $product->description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    $product->price = isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '';
    $product->weight = isset($_POST['weight']) ? htmlspecialchars($_POST['weight']) : '';
    $imageArray = isset($_FILES['profilPicture']['name']) ? $_FILES['profilPicture']['name'] : '';


// vérification que tous les champs sont prêts à etre envoyés 
    if (empty($appointment->formErrors) && empty($patient->formErrors)) {


// association d'un id grace au mail renseigné
        $appointment->idPatients = $patient->getPatientByMail()->id;

// insertion des données
        $success = $appointment->createAppointment();

        if ($success) {
            $_SESSION['message'] = 'Le rendez-vous a bien été créé';
            header('Location: ../views/exo6_listAppointment.php');
            exit();
        } else {
            $message = 'Le rendez-vous n\'a pas pu être créé';
        }
    }
}
?>


<?php

//fonction pour débuguer une variable.
function debug($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function debugSession() {
    if (isset($_SESSION['user_role'])){
        echo '<p>user_role :  '. $_SESSION['user_role'] .'</p>';
    }
     if (isset($_SESSION['user_id'])){
        echo '<p>user_id : '. $_SESSION['user_id'] .'</p>';
    }
     if (isset($_SESSION['pseudo'])){
        echo '<p>pseudo : '. $_SESSION['pseudo'] .'</p>';
    }
}

function isAdmin() {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {
        return true;
    } else {
        return false;
    }
}

function isClient() {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {
        return true;
    } else {
        return false;
    }
}

function isProducer() {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {
        return true;
    } else {
        return false;
    }
}
?>


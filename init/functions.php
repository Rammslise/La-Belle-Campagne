<?php

//fonction pour débuguer une variable.
function debug($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die;
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


<?php

require_once '../controllers/editClientProfileCtrl.php';

if (isProducer()) {
    header('Location : ../index.php');
    exit();
}
?>



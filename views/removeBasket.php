<?php

session_start();

require_once '../init/functions.php';
require_once '../controllers/removeBasketCtrl.php';

header('Location: ../views/basket.php');
?>



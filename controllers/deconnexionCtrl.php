<?php

echo 'Hello'; die;
session_destroy();
header('Location: ../index.php');
exit();
?>

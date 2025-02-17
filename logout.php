<?php
session_start();
session_destroy();

header('Location: ../Singer_D_FandomPokes/index.php');
exit;
?>
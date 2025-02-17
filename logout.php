<?php
session_start();
session_destroy();

header('Location: ../Singer_D_FandomPokes/index.html');
exit;
?>
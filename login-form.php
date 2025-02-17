<?php

session_start();
require_once('../Singer_D_FandomPokes/includes/connect.php');

$query = 'SELECT * FROM user_controllers WHERE username = ?';
$stmt = $connection->prepare($query);
$stmt->bindParam(1, $_POST['username'], PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() == 1) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['password'], $row['password'])) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];

        header('Location: ../Singer_D_FandomPokes/index.php');
    } else {
        header('Location: ../Singer_D_FandomPokes/login.html');
    }
} else {
    header('Location: ../Singer_D_FandomPokes/login.html');
}

$stmt = null;

?>

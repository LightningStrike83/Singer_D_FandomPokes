<?php

header("Content-Type: application/json; charset=UTF-8");
require_once('../includes/connect.php');

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$comments = trim($_POST['message'] ?? '');

$errors = [];

if (empty($name)) {
    $errors['preferred_name'] = 'Preferred Name has to be filled in, please.';
}

if (empty($email)) {
    $errors['email'] = 'Email has to be filled in, please.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'Please provide a valid email address. Check for typos.';
}

if (empty($subject)) {
    $errors['subject'] = 'Subject has to be filled in, please.';
}

if (empty($comments)) {
    $errors['message'] = 'Message has to be filled in, please.';
}

if (!empty($errors)) {
    echo json_encode(["errors" => $errors]);
    exit;
}

try {
    $query = "INSERT INTO contacts (preferred_name, email, subject, comments) VALUES (:name, :email, :subject, :message)";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $comments);

    if ($stmt->execute()) {
        $to = 'littlerootdreams@gmail.com';
        $sub = 'New Message Received';

        $emailBody = "You have received a new message on Fandom PokePartners! \n\n";
        $emailBody .= "Name: $name\n";
        $emailBody .= "Email: $email\n\n";
        $emailBody .= "Subject: $subject\n";
        $emailBody .= "Message: $comments\n\n";

        if (mail($to, $sub, $emailBody)) {
            echo json_encode(["message" => "Thank you for your message! We'll be in contact as soon as possible!"]);
        } else {
            echo json_encode(["errors" => ["mail" => "Failed to send email. Please try again later."]]);
        }
    } else {
        echo json_encode(["errors" => ["database" => "Failed to save the message. Please try again later."]]);
    }
} catch (Exception $e) {
    echo json_encode(["errors" => ["exception" => "An error occurred: " . $e->getMessage()]]);
}

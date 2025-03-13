<?php

header("Content-Type: application/json; charset=UTF-8");
require_once('../includes/connect.php');

$email = trim($_POST['email'] ?? '');

$errors = [];

if (empty($email)) {
    $errors['email'] = 'Email has to be filled in, please.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'Please provide a valid email address.';
}

if (!empty($errors)) {
    echo json_encode(["errors" => $errors]);
    exit;
}

try {
    $query = "SELECT token FROM `user_controllers` WHERE email = :email";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $to = $email;
            $sub = 'Fandom PokePartners- Password Reset Request';

            $emailBody = "<html><body>\n \n";
            $emailBody .= "<p>Hello there,</p>\n \n";
            $emailBody .= "<p>Fandom PokePartners has received a request that a user is trying to reset their password.</p>\n \n";
            $emailBody .= "<p>Please use this link and fill out the form to reset the password: <a target='_blank' href='password-reset.php?token=".$row['token']."'></a> </p>\n \n";
            $emailBody .= "<p>If this request was not from you, please disregard the email. Alternatively, you can contact the developer through the <a href='contact.php' target='_blank'>contact form</a> if you need any assistance or have any concerns.</p>\n \n";
            $emailBody .= "<p>Thank you, and have yourself a wonderful day trainer!</p>\n \n";
            $emailBody .= "<p>Sincerely,</p>\n \n";
            $emailBody .= "<p>Fandom PokePartners</p>\n \n";
            $emailBody .= "</body></html>";

            if (mail($to, $sub, $emailBody)) {
                echo json_encode(["message" => "Username retrieval email has been sent!"]);
            } else {
                echo json_encode(["errors" => ["mail" => "Failed to send email. Please try again later."]]);
            }
        } else {
            echo json_encode(["errors" => ["email_not_found" => "No account found with that email address."]]);
        }
    } else {
        echo json_encode(["errors" => ["database" => "Failed to query the database. Please try again later."]]);
    }
} catch (Exception $e) {
    echo json_encode(["errors" => ["exception" => "An error occurred: " . $e->getMessage()]]);
}
?>

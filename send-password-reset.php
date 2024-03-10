error_reporting(E_ALL);
ini_set('display_errors', 1);
<?php

include("connection.php");
session_start();

$email = $_POST["user_name"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/connection.php";

$sql = "UPDATE user
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE user_name = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if ($mysqli->affected_rows) {

    $mail = require __DIR__ . "/mailer.php";

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($user_name);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END

    Click <a href="http://sql6.freemysqlhosting.net/reset-password.php?token=$token">here</a> 
    to reset your password.

    END;

    try {

        $mail->send();

    } catch (Exception $e) {

        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";

    }

}

echo "Message sent, please check your inbox.";
echo "Reached point B";
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path if necessary

function sendResetEmail($to, $token) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                   // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                 // Enable SMTP authentication
        $mail->Username   = 'fawkthiis@gmail.com';             // SMTP username
        $mail->Password   = 'your_email_password';                // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption
        $mail->Port       = 587;                                  // TCP port to connect to

        // Recipients
        $mail->setFrom('your_email@example.com', 'Your Name');
        $mail->addAddress($to);                                   // Add a recipient

        // Content
        $mail->isHTML(true);                                      // Set email format to HTML
        $mail->Subject = 'Password Reset Request';
        $resetLink = "https://www.frameimpacts.com/reset-password.php?token=$token";
        $mail->Body    = "Click here to reset your password: <a href='$resetLink'>$resetLink</a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false; // Handle error appropriately
    }
}
?>
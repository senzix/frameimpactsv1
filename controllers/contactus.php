<?php
$header = "Contact Us";
$config = require 'config.php';
$db = new Database($config['database']);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['name'], $_POST['mail'], $_POST['message'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Simple validation
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Insert the message into the database
        $db->query("INSERT INTO contact_messages (name, email, message, created_at) VALUES (:name, :email, :message, NOW())", [
            'name' => $name,
            'email' => $email,
            'message' => $message
        ]);

        // Set a success message
        $successMessage = "Thank you for contacting us. We will get back to you soon.";
    } else {
        // Set an error message
        $errorMessage = "Please fill in all the fields correctly.";
    }
}

// Include the view
require "views/contactus.view.php";
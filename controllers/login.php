<?php
$config = require 'config.php';
$db = new Database($config['database']);

session_start();

$header = "Login";
if (isset($_SESSION['user_id'])) {
    header('Location: /');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database using email
    $query = "SELECT * FROM users WHERE email = :email";
    $user = $db->query($query, [':email' => $email])->fetch();

    // Verify password using bcrypt
    if ($user && password_verify($password, $user['password_hash'])) {
        // Set session
        $_SESSION['user_id'] = $user['user_id'];
        // Redirect to classroom
        header('Location: /classroom');
        exit();
    } else {
        $errorinvalid = "Invalid email or password";
    }
}

// Load the login view
require "views/login.view.php";
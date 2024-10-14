<?php
$config = require 'config.php';
$db = new Database($config['database']);
$header = "Register";

session_start();

$name = $username = $mail = $mobile = $address = $password = $confirmPassword = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate input
    if (empty($name) || empty($username) || empty($mail) || empty($mobile) || empty($address) || empty($password) || empty($confirmPassword)) {
        $error = "All fields are required";
        $password = $confirmPassword = ''; // Clear password fields
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match";
        $password = $confirmPassword = ''; // Clear password fields
    } else {
        // Check if the email or username already exists
        $query = "SELECT * FROM users WHERE email = :email OR username = :username";
        $existingUser = $db->query($query, [':email' => $mail, ':username' => $username])->fetch();

        if ($existingUser) {
            if ($existingUser['email'] === $mail) {
                $error = "Email is already registered";
            } elseif ($existingUser['username'] === $username) {
                $error = "Username is already taken";
            }
            $password = $confirmPassword = ''; // Clear password fields
        } else {
            // Hash the password using password_hash
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            // Insert the new user into the database
            $query = "INSERT INTO users (name, username, email, mobile, address, password_hash, created_at, updated_at) VALUES (:name, :username, :mail, :mobile, :address, :password_hash, NOW(), NOW())";
            $db->query($query, [
                ':name' => $name,
                ':username' => $username,
                ':mail' => $mail,
                ':mobile' => $mobile,
                ':address' => $address,
                ':password_hash' => $passwordHash
            ]);

            // Set success message
            $_SESSION['success'] = "Registration successful. You can now log in.";

            // Redirect to avoid form resubmission
            header("Location: /register");
            exit();
        }
    }
}

// Load the register view
require "views/register.view.php";

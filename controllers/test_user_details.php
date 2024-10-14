<?php
$config = require 'config.php';
$db = new Database($config['database']);
$header = "details";

session_start();

$name = $gmail = $phone = $location = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];

    // Validate input
    if (empty($name) || empty($gmail) || empty($phone) || empty($location)) {
        $error = "All fields are required";
    } else {
        // Check if the email or username already exists
        $query = "SELECT * FROM test_users WHERE gmail = :gmail";
        $existingUser = $db->query($query, [':gmail' => $gmail])->fetch();

        if ($existingUser) {
            // Fetch all records with the same email
            $query = "SELECT * FROM test_users WHERE gmail = :gmail ORDER BY created_at DESC";
            $allUserRecords = $db->query($query, [':gmail' => $gmail])->fetchAll();

            $locationExists = false;
            foreach ($allUserRecords as $record) {
                if ($record['location'] === $location) {
                    $locationExists = true;
                    $existingUser = $record;
                    break;
                }
            }

            if (!$locationExists) {
                // Insert a new record for the existing user with a new location
                $query = "INSERT INTO test_users (name, gmail, phone, location, created_at, updated_at) 
                          VALUES (:name, :gmail, :phone, :location, NOW(), NOW())";
                $result = $db->query($query, [
                    ':name' => $name,
                    ':gmail' => $gmail,
                    ':phone' => $phone,
                    ':location' => $location
                ]);

                if ($result) {
                    $test_user_id = $db->lastInsertId();
                } else {
                    $error = "An error occurred while creating a new record. Please try again.";
                }
            } else {
                // Update existing user's information if location already exists
                $query = "UPDATE test_users SET name = :name, phone = :phone, updated_at = NOW() WHERE test_user_id = :id";
                $result = $db->query($query, [
                    ':name' => $name,
                    ':phone' => $phone,
                    ':id' => $existingUser['test_user_id']
                ]);

                if ($result) {
                    $test_user_id = $existingUser['test_user_id'];
                } else {
                    $error = "An error occurred while updating your information. Please try again.";
                }
            }
        } else {
            // Insert the new user into the database
            $query = "INSERT INTO test_users (name, gmail, phone, location, created_at, updated_at) 
                      VALUES (:name, :gmail, :phone, :location, NOW(), NOW())";
            $result = $db->query($query, [
                ':name' => $name,
                ':gmail' => $gmail,
                ':phone' => $phone,
                ':location' => $location
            ]);

            if ($result) {
                $test_user_id = $db->lastInsertId();
            } else {
                $error = "An error occurred while registering. Please try again.";
            }
        }

        if (!isset($error)) {
            // Set the test_user_id in the session
            $_SESSION['test_user_id'] = $test_user_id;

            // Redirect to avoid form resubmission
            header("Location: /psychometric-test");
            exit();
        }
    }
}

// Load the register view
require "views/psychometric/user_login.view.php";

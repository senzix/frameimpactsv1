<?php
require 'config.php';
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];

    // Validate the token
    $query = "SELECT * FROM users WHERE reset_token = :token";
    $user = $db->query($query, [':token' => $token])->fetch();

    if ($user) {
        // Update the password
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $db->query("UPDATE users SET password_hash = :password, reset_token = NULL WHERE reset_token = :token", [
            ':password' => $hashedPassword,
            ':token' => $token
        ]);

        $_SESSION['success'] = "Password has been reset successfully.";
        header('Location: /login');
        exit();
    } else {
        $error = "Invalid token.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>">
        <div class="form-group">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required class="form-control">
        </div>
        <button type="submit" class="btn-custom">Reset Password</button>
    </form>
</body>
</html>
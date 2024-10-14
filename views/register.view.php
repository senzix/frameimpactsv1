<?php require "views/partials/header.php" ?>
<?php require "partials/banner.php" ?>

<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="auth-form">
                    <h2>Register</h2>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['success'] ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="/register">
                        <div class="form-group">
                            <label for="reg-name">Name:</label>
                            <input type="text" id="reg-name" name="name" value="<?= htmlspecialchars($name) ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reg-username">Username:</label>
                            <input type="text" id="reg-username" name="username" value="<?= htmlspecialchars($username) ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reg-email">Email:</label>
                            <input type="email" id="reg-email" name="mail" value="<?= htmlspecialchars($mail) ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reg-mobile">Mobile:</label>
                            <input type="tel" id="reg-mobile" name="mobile" value="<?= htmlspecialchars($mobile) ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reg-address">Address:</label>
                            <textarea class="form-control" id="reg-address" name="address" rows="5" required style="resize: none;"><?= htmlspecialchars($address) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="reg-password">Password:</label>
                            <input type="password" id="reg-password" name="password" required class="form-control">
                        </div>
                        <div class="form-group position-relative">
                            <label for="reg-confirm-password">Confirm Password:</label>
                            <input type="password" id="reg-confirm-password" name="confirm_password" required class="form-control">
                            <i class="fa fa-eye" id="toggleConfirmPassword"
                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"
                                onclick="togglePasswordVisibility('reg-confirm-password', 'toggleConfirmPassword')"></i>
                        </div>
                        <button type="submit" class="btn-custom">Register</button>
                    </form>
                    <p class="mt-3">Already have an account? <a href="/login">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "partials/banner2.php" ?>
<?php require "views/partials/footer.php" ?>
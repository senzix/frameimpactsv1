<?php require "views/partials/header.php" ?>
<?php require "views/partials/banner.php" ?>
<?php
// Initialize variables with empty strings
$name = "";
$gmail = "";
$phone = "";
$location = "";

// ... rest of your PHP code ...

?>
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="auth-form">
                    <h2>User Details</h2>
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
                    <form method="POST" action="/test_user_details">
                        <div class="form-group">
                            <label for="reg-name">Name:</label>
                            <input type="text" id="reg-name" name="name" value="<?= htmlspecialchars($name) ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reg-email">Email:</label>
                            <input type="email" id="reg-email" name="gmail" value="<?= htmlspecialchars($gmail) ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reg-mobile">Mobile:</label>
                            <input type="tel" id="reg-mobile" name="phone" value="<?= htmlspecialchars($phone) ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reg-location">Location:</label>
                            <select id="reg-location" name="location" required class="form-control border-0">
                                <option value="">Select a location</option>
                                <option value="Lamka" <?= $location === 'Lamka' ? 'selected' : '' ?>>Lamka</option>
                                <option value="Shillong" <?= $location === 'Shillong' ? 'selected' : '' ?>>Shillong</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-custom">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "views/partials/banner2.php" ?>
<?php require "views/partials/footer.php" ?>
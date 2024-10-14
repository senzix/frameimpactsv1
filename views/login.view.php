<?php require "views/partials/header.php" ?>
<?php require "partials/banner.php" ?>

<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="auth-form">
                    <h2>Login</h2>
                    <?php if (isset($errorinvalid)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $errorinvalid ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="/login">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required class="form-control">
                        </div>
                        <div class="form-group position-relative">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required class="form-control">
                            <i class="fa fa-eye" id="togglePassword"
                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                        </div>
                        <button type="submit" class="btn-custom">Login</button>
                    </form>
                    <p class="mt-3">Don't have an account? <a href="/register">Register here</a></p>
                </div>
                <ul class="feature-list">
                    <li>Access Psychometric test</li>
                    <li>Access video Recordings of Classes</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php require "partials/banner2.php" ?>
<?php require "views/partials/footer.php" ?>
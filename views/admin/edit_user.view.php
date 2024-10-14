<h2 class="mb-4">Edit User</h2>
<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>
<form action="?action=edit_user&user_id=<?= $user['user_id'] ?>" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="mobile" class="form-label">Mobile</label>
        <input type="tel" class="form-control" id="mobile" name="mobile" value="<?= htmlspecialchars($user['mobile']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3" required><?= htmlspecialchars($user['address']) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">New Password (leave blank to keep current password)</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Update User</button>
</form>
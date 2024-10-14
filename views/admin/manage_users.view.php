<h2 class="mb-4">Manage Users</h2>
<a href="?action=add_user" class="btn btn-primary mb-3">Add New User</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td>
                    <a href="?action=edit_user&user_id=<?= $user['user_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?action=delete_user&user_id=<?= $user['user_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
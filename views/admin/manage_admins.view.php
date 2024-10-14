<h2 class="mb-4">Manage Admins</h2>
<a href="?action=add_admin" class="btn btn-primary mb-3">Add New Admin</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?= htmlspecialchars($admin['username']) ?></td>
                <td><?= htmlspecialchars($admin['email']) ?></td>
                <td><?= $admin['created_at'] ?></td>
                <td>
                    <a href="?action=delete_admin&admin_id=<?= $admin['admin_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this admin?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
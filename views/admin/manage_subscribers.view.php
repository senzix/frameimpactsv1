<h2 class="mb-4">Manage Subscribers</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Email</th>
            <th>Subscribed At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($subscribers as $subscriber): ?>
            <tr>
                <td><?= htmlspecialchars($subscriber['email']) ?></td>
                <td><?= $subscriber['created_at'] ?></td>
                <td>
                    <a href="?action=delete_subscriber&subscriber_id=<?= $subscriber['subscriber_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this subscriber?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
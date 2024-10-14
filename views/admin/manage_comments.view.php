<h2 class="mb-4">Manage Comments</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Post</th>
            <th>User</th>
            <th>Comment</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?= htmlspecialchars($comment['post_title']) ?></td>
                <td><?= htmlspecialchars($comment['username']) ?></td>
                <td><?= htmlspecialchars(substr($comment['content'], 0, 50)) ?>...</td>
                <td><?= $comment['created_at'] ?></td>
                <td>
                    <a href="?action=delete_comment&comment_id=<?= $comment['comment_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
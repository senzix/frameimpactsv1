<h2 class="mb-4">Manage Posts</h2>
<a href="?action=add_post" class="btn btn-primary mb-3">Add New Post</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= htmlspecialchars($post['title']) ?></td>
                <td><?= $post['created_at'] ?></td>
                <td>
                    <a href="?action=edit_post&post_id=<?= $post['post_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?action=delete_post&post_id=<?= $post['post_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
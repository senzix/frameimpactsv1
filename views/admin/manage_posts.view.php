<h2 class="mb-4">Manage Posts</h2>
<a href="?action=add_post" class="btn btn-primary mb-3">Add New Post</a>

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Views</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <?php if ($post['image_path']): ?>
                                <div class="post-thumbnail-container me-2">
                                    <img src="<?=$post['image_path'] ?>" 
                                         class="post-thumbnail" 
                                         alt="<?= htmlspecialchars($post['title']) ?>">
                                </div>
                            <?php endif; ?>
                            <div>
                                <div class="fw-bold"><?= htmlspecialchars($post['title']) ?></div>
                                <?php if ($post['excerpt']): ?>
                                    <small class="text-muted"><?= substr(htmlspecialchars($post['excerpt']), 0, 60) ?>...</small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <form action="?action=toggle_post_status" method="POST" class="d-inline">
                            <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                            <button type="submit" class="btn btn-sm <?= $post['is_draft'] ? 'btn-secondary' : 'btn-success' ?>">
                                <?= $post['is_draft'] ? 'Draft' : 'Published' ?>
                            </button>
                        </form>
                    </td>
                    <td>
                        <div><?= (new DateTime($post['created_at']))->format('M d, Y') ?></div>
                        <small class="text-muted"><?= (new DateTime($post['created_at']))->format('h:i A') ?></small>
                    </td>
                    <td>
                        <span class="badge bg-info"><?= $post['views'] ?? 0 ?></span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="post?p_id=<?= $post['post_id'] ?>" 
                               class="btn btn-sm btn-outline-primary" 
                               target="_blank">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="?action=edit_post&post_id=<?= $post['post_id'] ?>" 
                               class="btn btn-sm btn-outline-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="?action=delete_post&post_id=<?= $post['post_id'] ?>" 
                               class="btn btn-sm btn-outline-danger" 
                               onclick="return confirm('Are you sure you want to delete this post?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
/* Add these styles for the thumbnails in manage posts */
.post-thumbnail-container {
    width: 80px;
    height: 60px;
    overflow: hidden;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.post-thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

/* Optional: Add hover effect */
.post-thumbnail:hover {
    transform: scale(1.05);
    transition: transform 0.2s ease;
}
</style>
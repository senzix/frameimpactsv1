<h2 class="mb-4">Edit Post</h2>
<form action="?action=edit_post&post_id=<?= $post['post_id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" name="content" rows="5" required><?= htmlspecialchars($post['content']) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
        <?php if ($post['image_path']): ?>
            <img src="img/upload/<?= $post['image_path'] ?>" alt="Current post image" class="mt-2" style="max-width: 200px;">
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
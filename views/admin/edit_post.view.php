<h2 class="mb-4">Edit Post</h2>
<form action="?action=edit_post&post_id=<?= $post['post_id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea id="editor" name="content"><?= htmlspecialchars($post['content']) ?></textarea>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="image" class="form-label">Featured Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <small class="text-muted">Leave empty to keep current image</small>
        </div>
        <div class="col-md-6">
            <?php if ($post['image_path']): ?>
                <label class="form-label">Current Image</label>
                <div>
                    <img src="<?= htmlspecialchars($post['image_path']) ?>" 
                         alt="Current featured image" 
                         class="img-thumbnail" 
                         style="max-height: 100px;">
                    <form action="?action=edit_post&post_id=<?= $post['post_id'] ?>" method="POST" class="d-inline">
                        <input type="hidden" name="delete_image" value="1">
                        <button type="submit" class="btn btn-danger btn-sm ms-2" 
                                onclick="return confirm('Are you sure you want to delete this image?')">
                            Delete Image
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="excerpt" class="form-label">Excerpt</label>
        <textarea class="form-control" id="excerpt" name="excerpt" rows="3"><?= htmlspecialchars($post['excerpt'] ?? '') ?></textarea>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_draft" name="draft" value="1" <?= $post['is_draft'] ? 'checked' : '' ?>>
            <label class="form-check-label" for="is_draft">
                Save as Draft
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Post</button>
    <a href="?action=manage_posts" class="btn btn-secondary">Cancel</a>
</form>

<!-- Include CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<style>
.ck-editor__editable {
    min-height: 400px;
    max-height: 600px;
}
.ck-editor__editable:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
.ck.ck-editor {
    width: 100%;
}
</style>

<script>
ClassicEditor
    .create(document.querySelector('#editor'), {
        toolbar: [
            'heading',
            '|',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'outdent',
            'indent',
            '|',
            'blockQuote',
            'insertTable',
            'undo',
            'redo',
            '|',
            'alignment',
            'fontColor',
            'fontBackgroundColor'
        ]
    })
    .catch(error => {
        console.error(error);
    });
</script>
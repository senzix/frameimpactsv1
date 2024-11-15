<h2 class="mb-4">Add New Post</h2>
<form action="?action=add_post" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea id="editor" name="content"></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Featured Image</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
        <small class="text-muted">Recommended size: 1200x630 pixels</small>
    </div>
    <div class="mb-3">
        <label for="excerpt" class="form-label">Excerpt</label>
        <textarea class="form-control" id="excerpt" name="excerpt" rows="3" 
            placeholder="Brief summary of the post (optional)"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Publish Post</button>
    <button type="submit" name="draft" value="1" class="btn btn-secondary">Save as Draft</button>
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
/* Ensure the editor container takes full width */
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
        ],
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        }
    })
    .then(editor => {
        editor.model.document.on('change:data', () => {
            document.getElementById('content').value = editor.getData();
        });
    })
    .catch(error => {
        console.error('CKEditor error:', error);
    });
</script>
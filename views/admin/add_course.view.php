<h2 class="mb-4">Add New Course</h2>
<form action="?action=add_course" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="mb-3">
        <label for="video_url" class="form-label">Video URL</label>
        <input type="url" class="form-control" id="video_url" name="video_url" required>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-control" id="category_id" name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['category_id'] ?>"><?= htmlspecialchars($category['category_name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
    <label class="form-label">Assign Users</label>
    <div class="user-list">
        <?php foreach ($users as $user): ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="assigned_users[]"
                    value="<?= $user['user_id'] ?>" id="user_<?= $user['user_id'] ?>">
                <label class="form-check-label" for="user_<?= $user['user_id'] ?>">
                    <?= htmlspecialchars($user['username']) ?>
                </label>
            </div>
        <?php endforeach; ?>
    </div>
</div>

    <button type="submit" class="btn btn-primary">Add Course</button>
</form>
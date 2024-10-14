<h1>Edit Course</h1>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($course['title']) ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($course['description']) ?></textarea>
    </div>

    <div class="form-group">
        <label for="video_url">Video URL:</label>
        <input type="url" class="form-control" id="video_url" name="video_url" value="<?= htmlspecialchars($course['video_url']) ?>">
    </div>

    <div class="form-group">
        <label for="category_id">Category:</label>
        <select class="form-control" id="category_id" name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['category_id'] ?>" <?= $category['category_id'] == $course['category_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['category_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Assign Users:</label>
        <div class="user-list">
            <?php foreach ($users as $user): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="assigned_users[]"
                        value="<?= $user['user_id'] ?>" id="user_<?= $user['user_id'] ?>"
                        <?= in_array($user['user_id'], $assigned_users) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="user_<?= $user['user_id'] ?>">
                        <?= htmlspecialchars($user['username']) ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-group">
        <label for="image">Course Image:</label>
        <?php if ($course['image_path']): ?>
            <img src="<?= $course['image_path'] ?>" alt="Current course image" class="img-thumbnail mb-2" style="max-width: 200px;">
        <?php endif; ?>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Update Course</button>
</form>
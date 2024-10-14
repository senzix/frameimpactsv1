<h2>Edit Comment</h2>

<form action="admin?action=edit_course_comment&comment_id=<?= $comment['id'] ?>" method="POST">
    <div class="form-group">
        <label>Course: <?= htmlspecialchars($comment['course_title']) ?></label>
    </div>
    <div class="form-group">
        <label>User: <?= htmlspecialchars($comment['username']) ?></label>
    </div>
    <div class="form-group">
        <label for="content">Comment Content:</label>
        <textarea name="content" id="content" class="form-control" rows="4" required><?= htmlspecialchars($comment['content']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Comment</button>
</form>
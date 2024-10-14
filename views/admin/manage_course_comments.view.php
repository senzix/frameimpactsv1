<h2 class="mb-4"><?= isset($course) ? "Comments for Course: " . htmlspecialchars($course['title']) : "All Course Comments" ?></h2>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <?php if (!isset($course)): ?>
                    <th>Course</th>
                <?php endif; ?>
                <th>User</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td data-label="ID"><?= htmlspecialchars($comment['id']) ?></td>
                    <?php if (!isset($course)): ?>
                        <td data-label="Course"><?= htmlspecialchars($comment['course_title']) ?></td>
                    <?php endif; ?>
                    <td data-label="User"><?= htmlspecialchars($comment['username']) ?></td>
                    <td data-label="Content"><?= htmlspecialchars($comment['content']) ?></td>
                    <td data-label="Created At"><?= htmlspecialchars($comment['created_at']) ?></td>
                    <td data-label="Actions">
                        <div class="btn-group" role="group">
                            <a href="admin?action=edit_course_comment&comment_id=<?= $comment['id'] ?>" class="btn btn-sm btn-primary mb-1">Edit</a>
                            <a href="admin?action=delete_course_comment&comment_id=<?= $comment['id'] ?>" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
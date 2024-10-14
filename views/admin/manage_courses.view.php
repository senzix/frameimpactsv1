<h2 class="mb-4">Manage Courses</h2>
<a href="?action=add_course" class="btn btn-primary mb-3">Add New Course</a>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Image</th>
                <th>Video URL</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td data-label="Title"><?= htmlspecialchars($course['title']) ?></td>
                    <td data-label="Category"><?= htmlspecialchars($course['category_name']) ?></td>
                    <td data-label="Description"><?= htmlspecialchars(substr($course['description'], 0, 100)) ?>...</td>
                    <td data-label="Image">
                        <?php if ($course['image_path']): ?>
                            <img src="<?= htmlspecialchars($course['image_path']) ?>" alt="Course Image" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                        <?php else: ?>
                            No image
                        <?php endif; ?>
                    </td>
                    <td data-label="Video URL"><?= htmlspecialchars($course['video_url']) ?></td>
                    <td data-label="Created By"><?= htmlspecialchars($course['created_by']) ?></td>
                    <td data-label="Created At"><?= htmlspecialchars($course['created_at']) ?></td>
                    <td data-label="Updated At"><?= htmlspecialchars($course['updated_at']) ?></td>
                    <td data-label="Actions">
                        <div class="btn-group" role="group">
                            <a href="?action=edit_course&course_id=<?= $course['course_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="?action=delete_course&course_id=<?= $course['course_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<h2 class="mb-4">Manage Categories</h2>
<a href="?action=add_category" class="btn btn-primary mb-3">Add New Category</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Category Name</th>
            <th>Course Count</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= htmlspecialchars($category['category_name']) ?></td>
                <td><?= $category['course_count'] ?></td>
                <td><?= htmlspecialchars($category['created_at']) ?></td>
                <td><?= htmlspecialchars($category['updated_at']) ?></td>
                <td>
                    <a href="?action=edit_category&category_id=<?= $category['category_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?action=delete_category&category_id=<?= $category['category_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
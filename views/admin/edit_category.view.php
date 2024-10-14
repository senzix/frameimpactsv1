<h2 class="mb-4">Edit Category</h2>
<form action="?action=edit_category&category_id=<?= $category['category_id'] ?>" method="POST">
    <div class="mb-3">
        <label for="category_name" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="category_name" name="category_name" value="<?= htmlspecialchars($category['category_name']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Category</button>
</form>
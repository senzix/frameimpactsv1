<h2 class="mb-4">Add New Question</h2>
<form action="?action=add_question" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="question" class="form-label">Question</label>
        <textarea class="form-control" id="question" name="question" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="option_a" class="form-label">Option A</label>
        <input type="text" class="form-control" id="option_a" name="option_a" required>
    </div>
    <div class="mb-3">
        <label for="option_b" class="form-label">Option B</label>
        <input type="text" class="form-control" id="option_b" name="option_b" required>
    </div>
    <div class="mb-3">
        <label for="option_c" class="form-label">Option C</label>
        <input type="text" class="form-control" id="option_c" name="option_c" required>
    </div>
    <div class="mb-3">
        <label for="option_d" class="form-label">Option D</label>
        <input type="text" class="form-control" id="option_d" name="option_d" required>
    </div>
    <div class="mb-3">
        <label for="correct_answer" class="form-label">Correct Answer</label>
        <select class="form-control" id="correct_answer" name="correct_answer" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image (optional)</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Add Question</button>
</form>
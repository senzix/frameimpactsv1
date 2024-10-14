<h2 class="mb-4">Edit Question</h2>
<form action="?action=edit_question&id=<?= $question['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="question" class="form-label">Question</label>
        <textarea class="form-control" id="question" name="question" rows="3" required><?= htmlspecialchars($question['question']) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="option_a" class="form-label">Option A</label>
        <input type="text" class="form-control" id="option_a" name="option_a" value="<?= htmlspecialchars($question['option_a']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="option_b" class="form-label">Option B</label>
        <input type="text" class="form-control" id="option_b" name="option_b" value="<?= htmlspecialchars($question['option_b']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="option_c" class="form-label">Option C</label>
        <input type="text" class="form-control" id="option_c" name="option_c" value="<?= htmlspecialchars($question['option_c']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="option_d" class="form-label">Option D</label>
        <input type="text" class="form-control" id="option_d" name="option_d" value="<?= htmlspecialchars($question['option_d']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="correct_answer" class="form-label">Correct Answer</label>
        <select class="form-control" id="correct_answer" name="correct_answer" required>
            <option value="A" <?= $question['correct_answer'] == 'A' ? 'selected' : '' ?>>A</option>
            <option value="B" <?= $question['correct_answer'] == 'B' ? 'selected' : '' ?>>B</option>
            <option value="C" <?= $question['correct_answer'] == 'C' ? 'selected' : '' ?>>C</option>
            <option value="D" <?= $question['correct_answer'] == 'D' ? 'selected' : '' ?>>D</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image (optional)</label>
        <input type="file" class="form-control" id="image" name="image">
        <?php if ($question['image']): ?>
            <img src="img/test/numerical/<?= $question['image'] ?>" alt="Current question image" class="mt-2" style="max-width: 200px;">
            <input type="hidden" name="current_image" value="<?= $question['image'] ?>">
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Update Question</button>
</form>
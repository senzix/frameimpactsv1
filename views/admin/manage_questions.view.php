<h2 class="mb-4">Manage Questions</h2>
<a href="?action=add_question" class="btn btn-primary mb-3">Add New Question</a>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Question</th>
                <th>Correct Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
                <tr>
                    <td data-label="Question"><?= htmlspecialchars(substr($question['question'], 0, 100)) ?>...</td>
                    <td data-label="Correct Answer"><?= htmlspecialchars($question['correct_answer']) ?></td>
                    <td data-label="Actions">
                        <div class="btn-group" role="group">
                            <a href="?action=edit_question&id=<?= $question['id'] ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
                            <a href="?action=delete_question&id=<?= $question['id'] ?>" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Are you sure you want to delete this question?')">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
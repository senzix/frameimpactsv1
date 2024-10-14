<h2 class="mb-4">Test Results for <?= htmlspecialchars($test_user['name']) ?></h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Test Date</th>
                <th>Test Type</th>
                <th>Correct Answers</th>
                <th>Total Questions</th>
                <th>Percentage</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td data-label="Test Date"><?= date('F j, Y, g:i a', strtotime($result['created_at'])) ?></td>
                    <td data-label="Test Type"><?= ucfirst($result['test_type']) ?></td>
                    <td data-label="Correct Answers"><?= $result['correct_count'] ?></td>
                    <td data-label="Total Questions"><?= $result['total_questions'] ?></td>
                    <td data-label="Percentage"><?= number_format($result['percentage'], 2) ?>%</td>
                    <td data-label="Actions">
                        <div class="btn-group" role="group" aria-label="Result actions">
                            <a href="?action=view_detailed_result&id=<?= $result['id'] ?>" class="btn btn-sm btn-primary">View</a>
                            <a href="?action=edit_result&id=<?= $result['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="?action=download_result_pdf&id=<?= $result['id'] ?>" class="btn btn-sm btn-success">Download PDF</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="mt-3">
    <a href="?action=view_results" class="btn btn-primary">Back to Users List</a>
</div>
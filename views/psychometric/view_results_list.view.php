<?php require "views/partials/header.php"; ?>

<div class="test-container mt-5 mb-5">
    <h1>Your Test Results</h1>
    <?php if (empty($results)): ?>
        <p>You haven't taken any tests yet.</p>
    <?php else: ?>
        <table class="results-table mt-5 mb-5">
            <thead>
                <tr>
                    <th>Date & Time</th>
                    <th>Test Type</th>
                    <th>Score</th>
                    <th>View</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr>
                        <td><?php echo date('F j, Y, g:i a', strtotime($result['created_at'])); ?></td>
                        <td><?php echo htmlspecialchars(ucfirst($result['test_type'])); ?></td>
                        <td><?php echo number_format($result['percentage'], 2); ?>%</td>
                        <td><a href="?test=view_results&id=<?php echo $result['id']; ?>">View Details</a></td>
                        <td><a href="?test=view_results&id=<?php echo $result['id']; ?>&download=pdf">Download PDF</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<style>
    .results-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .results-table th, .results-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .results-table th {
        background-color: #f2f2f2;
    }
    .results-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .results-table tr:hover {
        background-color: #f5f5f5;
    }
</style>

<?php require "views/partials/footer.php"; ?>
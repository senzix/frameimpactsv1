<h2 class="mb-4">Users with Test Results</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Location</th>
                <th>Last Test Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($test_users_with_tests as $user): ?>
                <tr>
                    <td data-label="Name"><?= htmlspecialchars($user['name']) ?></td>
                    <td data-label="Email"><?= htmlspecialchars($user['gmail']) ?></td>
                    <td data-label="Phone"><?= htmlspecialchars($user['phone']) ?></td>
                    <td data-label="Location"><?= htmlspecialchars($user['location']) ?></td>
                    <td data-label="Last Test Date"><?= date('F j, Y, g:i a', strtotime($user['last_test_date'])) ?></td>
                    <td data-label="Actions">
                        <a href="?action=user_results&test_user_id=<?= $user['test_user_id'] ?>" class="btn btn-sm btn-primary">View Results</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
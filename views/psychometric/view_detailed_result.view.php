<?php require "views/partials/header.php"; ?>

<div class="test-container">
    <h1>Detailed Test Result</h1>
    <p>Test taken on: <?php echo date('F j, Y, g:i a', strtotime($result['created_at'])); ?></p>
    <p>Test type: <?php echo htmlspecialchars(ucfirst($result['test_type'])); ?></p>
    <p>You answered <?php echo $result['correct_count']; ?> out of <?php echo $result['total_questions']; ?> questions correctly.</p>
    <p>Your score: <?php echo number_format($result['percentage'], 2); ?>%</p>
    <div class="results-container">
        <?php foreach ($detailed_results as $index => $question): ?>
            <div class="result-item">
                <h3>Question <?php echo $index + 1; ?></h3>
                <p><?php echo htmlspecialchars($question['question']); ?></p>
                <div class="options-container">
                    <?php foreach (['A', 'B', 'C', 'D'] as $option): ?>
                        <div class="option 
                            <?php echo $question['userAnswer'] === $option ? 'user-selected' : ''; ?> 
                            <?php echo $question['correctAnswer'] === $option ? 'correct-answer' : ''; ?>">
                            <span class="option-letter"><?php echo $option; ?></span>
                            <span class="option-text"><?php echo htmlspecialchars($question['options'][$option]); ?></span>
                            <?php if ($question['userAnswer'] === $option): ?>
                                <span class="user-mark">✓</span>
                            <?php endif; ?>
                            <?php if ($question['correctAnswer'] === $option): ?>
                                <span class="correct-mark">✅</span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="?test=view_results" class="back-link">Back to Results List</a>
</div>

<style>
    .results-container {
        margin-top: 20px;
    }
    .result-item {
        margin-bottom: 20px;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 5px;
    }
    .options-container {
        display: flex;
        flex-direction: column;
    }
    .option {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .option-letter {
        margin-right: 10px;
        font-weight: bold;
    }
    .option-text {
        flex: 1;
    }
    .user-selected {
        background-color: #f8d7da;
    }
    .correct-answer {
        background-color: #d4edda;
    }
    .user-mark, .correct-mark {
        margin-left: 10px;
    }
    .back-link {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
    .back-link:hover {
        background-color: #0056b3;
    }
</style>

<?php require "views/partials/footer.php"; ?>
<h2 class="mb-4">Detailed Test Result for <?= htmlspecialchars($result['name']) ?></h2>
<div class="row">
    <div class="col-md-6">
        <p>Email: <?= htmlspecialchars($result['gmail']) ?></p>
        <p>Phone: <?= htmlspecialchars($result['phone']) ?></p>
        <p>Location: <?= htmlspecialchars($result['location']) ?></p>
    </div>
    <div class="col-md-6">
        <p>Test taken on: <?= date('F j, Y, g:i a', strtotime($result['created_at'])) ?></p>
        <p>Test type: <?= htmlspecialchars(ucfirst($result['test_type'])) ?></p>
        <p>Correct answers: <?= $result['correct_count'] ?> out of <?= $result['total_questions'] ?></p>
        <p>Score: <?= number_format($result['percentage'], 2) ?>%</p>
    </div>
</div>

<div class="results-container">
    <?php foreach ($detailed_results as $index => $question): ?>
        <div class="result-item">
            <h3>Question <?= $index + 1 ?></h3>
            <p><?= htmlspecialchars($question['question']) ?></p>
            <div class="options-container">
                <?php foreach (['A', 'B', 'C', 'D'] as $option): ?>
                    <div class="option 
                        <?= $question['userAnswer'] === $option ? 'user-selected' : '' ?> 
                        <?= $question['correctAnswer'] === $option ? 'correct-answer' : '' ?>">
                        <span class="option-letter"><?= $option ?></span>
                        <span class="option-text"><?= htmlspecialchars($question['options'][$option]) ?></span>
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

<div class="row mt-3">
    <div class="col-sm-6 mb-2">
        <a href="?action=user_results&test_user_id=<?= $result['user_id'] ?>" class="btn btn-primary btn-block">Back to User Results</a>
    </div>
    <div class="col-sm-6 mb-2">
        <a href="?action=download_result_pdf&id=<?= $result['id'] ?>" class="btn btn-secondary btn-block">Download PDF</a>
    </div>
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
        word-break: break-word;
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
    @media (max-width: 576px) {
        .option {
            flex-direction: column;
            align-items: flex-start;
        }
        .option-letter {
            margin-bottom: 5px;
        }
        .user-mark, .correct-mark {
            margin-left: 0;
            margin-top: 5px;
        }
    }
</style>
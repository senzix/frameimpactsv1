<?php require "views/partials/header.php";
      $header ="Numerical Reasoning Test";
?>

<div class="test-container">
    <h1><?php echo $header; ?></h1>
    <div class="progress-bar">
        <div class="progress" style="width: 0%;"></div>
    </div>
    <div class="timer-container">
        <span id="timer">15:00</span>
    </div>
    
    <div id="start-container" style="text-align: center;">
        <h2>Welcome to the Numerical Reasoning Test</h2>
        <p>You will have 15 minutes to complete <?php echo count($questions); ?> questions.</p>
        <p>Click the button below when you're ready to begin.</p>
        <button id="start-test" class="start-button">Start Test</button>
    </div>

    <div id="question-container" class="question-container" style="display: none;">
        <div class="question-content">
            <?php foreach ($questions as $index => $question): ?>
                <div class="question" id="question-<?php echo $index; ?>" style="display: <?php echo $index === 0 ? 'flex' : 'none'; ?>;">
                    <div class="question-image">
                        <?php if (!empty($question['image'])): ?>
                            <img src="<?php echo 'img/test/numerical/' . $question['image']; ?>" alt="Question Image" />
                        <?php endif; ?>
                        <p class="question-text"><?php echo $questions[0]['question']; ?></p>
                    </div>
                    <div class="question-options">
                        <?php
                        $options = ['A', 'B', 'C', 'D'];
                        foreach ($options as $option):
                        ?>
                            <button class="option-button" onclick="selectAnswer(<?php echo $index; ?>, '<?php echo $option; ?>')">
                                <span class="option-letter"><?php echo $option; ?></span>
                                <span class="option-text"><?php echo $question['option_' . strtolower($option)]; ?></span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="question-footer">
            <span class="question-number">Question <?php echo $index + 1; ?>/<?php echo count($questions); ?></span>
            <button id="next-question" class="next-button">Next Question</button>
        </div>
    </div>
</div>

<script>
    let currentQuestionIndex = 0;
    const totalQuestions = <?php echo count($questions); ?>;
    const correctAnswers = <?php echo json_encode(array_column($questions, 'correct_answer')); ?>;
    const questions = <?php echo json_encode($questions); ?>;
    let userAnswers = [];

    function selectAnswer(questionIndex, selectedOption) {
        const buttons = document.querySelectorAll(`#question-${questionIndex} .option-button`);
        buttons.forEach(button => {
            button.disabled = true;
            if (button.querySelector('.option-letter').textContent === selectedOption) {
                button.style.backgroundColor = selectedOption === correctAnswers[questionIndex] ? '#d4edda' : '#f8d7da';
            }
        });
        
        userAnswers[questionIndex] = selectedOption;
        console.log('User answer stored:', { questionIndex, selectedOption, userAnswers });
        
        document.getElementById('next-question').style.display = 'block';
    }

    document.getElementById('next-question').addEventListener('click', () => {
        currentQuestionIndex++;
        if (currentQuestionIndex < totalQuestions) {
            document.getElementById(`question-${currentQuestionIndex - 1}`).style.display = 'none';
            document.getElementById(`question-${currentQuestionIndex}`).style.display = 'flex';
            document.querySelector('.question-number').textContent = `Question ${currentQuestionIndex + 1}/${totalQuestions}`;
            
            // Update the question text
            const currentQuestion = document.querySelector(`#question-${currentQuestionIndex} .question-text`);
            currentQuestion.textContent = questions[currentQuestionIndex].question;
            
            // Update the image if present
            const imageContainer = document.querySelector(`#question-${currentQuestionIndex} .question-image img`);
            if (imageContainer) {
                imageContainer.src = `img/test/numerical/${questions[currentQuestionIndex].image}`;
            }
            
            // Reset option buttons
            const optionButtons = document.querySelectorAll(`#question-${currentQuestionIndex} .option-button`);
            optionButtons.forEach(button => {
                button.disabled = false;
                button.style.backgroundColor = '';
            });
            
            document.querySelector('.progress').style.width = `${(currentQuestionIndex / totalQuestions) * 100}%`;
            document.getElementById('next-question').style.display = 'none';
        } else {
            showResults();
        }
    });

    function showResults() {
        const correctCount = userAnswers.filter((answer, index) => answer === correctAnswers[index]).length;
        const percentage = (correctCount / totalQuestions) * 100;
        
        let resultHtml = `
            <h2>Test Results</h2>
            <p>You answered ${correctCount} out of ${totalQuestions} questions correctly.</p>
            <p>Your score: ${percentage.toFixed(2)}%</p>
            <div class="results-container">
        `;

        const detailedResults = questions.map((question, index) => {
            const userAnswer = userAnswers[index];
            const correctAnswer = correctAnswers[index];
            
            resultHtml += `
                <div class="result-item">
                    <h3>Question ${index + 1}</h3>
                    <p>${question.question}</p>
                    <div class="options-container">
                        ${['a', 'b', 'c', 'd'].map(option => `
                            <div class="option ${userAnswer === option.toUpperCase() ? 'user-selected' : ''} ${correctAnswer === option.toUpperCase() ? 'correct-answer' : ''}">
                                <span class="option-letter">${option.toUpperCase()}</span>
                                <span class="option-text">${question['option_' + option]}</span>
                                ${userAnswer === option.toUpperCase() ? '<span class="user-mark">✓</span>' : ''}
                                ${correctAnswer === option.toUpperCase() ? '<span class="correct-mark">✅</span>' : ''}
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;

            return {
                question: question.question,
                options: {
                    A: question.option_a,
                    B: question.option_b,
                    C: question.option_c,
                    D: question.option_d
                },
                userAnswer: userAnswer,
                correctAnswer: correctAnswer
            };
        });

        resultHtml += '</div>';
        
        // Add download button
        resultHtml += `
            <div class="download-container">
                <button id="download-pdf" class="download-button">Download Results as PDF</button>
            </div>
        `;
        
        document.querySelector('.question-container').innerHTML = resultHtml;
        document.querySelector('.progress').style.width = '100%';

        const style = document.createElement('style');
        style.textContent = `
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
            .download-container {
                margin-top: 20px;
                text-align: center;
            }
            .download-button {
                padding: 10px 20px;
                font-size: 16px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            .download-button:hover {
                background-color: #45a049;
            }
        `;
        document.head.appendChild(style);

        fetch('?test=store_results', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                correctCount: correctCount,
                totalQuestions: totalQuestions,
                percentage: percentage,
                detailedResults: detailedResults
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Results stored successfully');
                // Add the result ID to the download button
                document.getElementById('download-pdf').setAttribute('data-result-id', data.result_id);
            } else {
                console.error('Failed to store results:', data.message);
            }
        })
        .catch(error => {
            console.error('Error storing results:', error);
        });

        // Add event listener for download button
        document.getElementById('download-pdf').addEventListener('click', (e) => {
            e.preventDefault();
            const resultId = e.target.getAttribute('data-result-id');
            if (resultId) {
                window.location.href = `?test=view_results&id=${resultId}&download=pdf`;
            } else {
                console.error('No result ID available for download');
            }
        });
    }

    document.getElementById('next-question').style.display = 'none';

    document.getElementById('start-test').addEventListener('click', () => {
        document.getElementById('start-container').style.display = 'none';
        document.getElementById('question-container').style.display = 'block';
        startTimer();
    });

    function startTimer() {
        let timeLeft = 15 * 60;
        const timerElement = document.getElementById('timer');
        const timerInterval = setInterval(() => {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            if (timeLeft > 0) {
                timeLeft--;
            } else {
                clearInterval(timerInterval);
                showResults();
            }
        }, 1000);
    }

    // Remove the automatic timer start
    // const timerInterval = setInterval(() => { ... });

    // Rest of the existing JavaScript code

    // Add event listener for download button
    document.getElementById('download-pdf').addEventListener('click', (e) => {
        e.preventDefault();
        const resultId = e.target.getAttribute('data-result-id');
        window.location.href = `?test=view_results&id=${resultId}&download=pdf`;
    });
</script>

<style>
    .start-button {
        padding: 10px 20px;
        font-size: 18px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .start-button:hover {
        background-color: #45a049;
    }
</style>

<?php require "views/partials/footer.php" ?>
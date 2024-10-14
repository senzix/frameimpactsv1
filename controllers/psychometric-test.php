<?php
$config = require 'config.php';
$db = new Database($config['database']);

$header = 'Psychometric Test';

session_start();
// Ensure the user is logged in
if (!isset($_SESSION['test_user_id'])) {
    header('Location: /test_user_details');
    exit();
}

$user_id = $_SESSION['test_user_id'];
// Handle test requests
$testType = $_GET['test'] ?? null;

switch ($testType) {


        // numerical test
    case 'numerical':
        // Fetch questions from the database
        $questions = $db->query("SELECT * FROM numerical_questions ORDER BY RAND() LIMIT 10")->fetchAll();

        if ($questions) {
            // Pass the questions data to the view
            require 'views/psychometric/numerical.view.php';
        } else {
            echo "<p>No questions available.</p>";
        }
        break;
    case 'store_results':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);

            // Ensure user is logged in
            if (!isset($_SESSION['test_user_id'])) {
                echo json_encode(['success' => false, 'message' => 'User not logged in']);
                exit;
            }

            $user_id = $_SESSION['test_user_id'];
            $correct_count = $data['correctCount'];
            $total_questions = $data['totalQuestions'];
            $percentage = $data['percentage'];
            $detailed_results = json_encode($data['detailedResults']);

            // Store results in database
            $query = "INSERT INTO test_results (user_id, test_type, correct_count, total_questions, percentage, detailed_results, created_at) 
                              VALUES (:user_id, 'numerical', :correct_count, :total_questions, :percentage, :detailed_results, NOW())";

            try {
                $result = $db->query($query, [
                    ':user_id' => $user_id,
                    ':correct_count' => $correct_count,
                    ':total_questions' => $total_questions,
                    ':percentage' => $percentage,
                    ':detailed_results' => $detailed_results
                ]);

                if ($result) {
                    $last_insert_id = $db->lastInsertId();
                    echo json_encode(['success' => true, 'result_id' => $last_insert_id]);
                } else {
                    throw new Exception('Failed to insert record');
                }
            } catch (Exception $e) {
                error_log('Error storing test results: ' . $e->getMessage());
                echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method']);
        }
        break;

    case 'view_results':
        if (!isset($_SESSION['test_user_id'])) {
            header('Location: /login');
            exit();
        }

        $user_id = $_SESSION['test_user_id']; // Change this line

        if (isset($_GET['id'])) {
            // Fetch and display a specific result
            $result_id = intval($_GET['id']);
            $query = "SELECT tr.*, tu.name, tu.gmail, tu.phone, tu.location 
                      FROM test_results tr 
                      JOIN test_users tu ON tr.user_id = tu.test_user_id 
                      WHERE tr.id = :id AND tr.user_id = :user_id";
            $params = [':id' => $result_id, ':user_id' => $user_id];

            try {
                $result = $db->query($query, $params)->fetch();

                if (!$result) {
                    $error = "No test result found.";
                    require "views/error.view.php";
                    return;
                }

                $detailed_results = json_decode($result['detailed_results'], true);

                // Check if the user wants to download the PDF
                if (isset($_GET['download']) && $_GET['download'] === 'pdf') {
                    require_once 'vendor/autoload.php'; // Make sure you have TCPDF installed via Composer

                    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                    $pdf->SetCreator(PDF_CREATOR);
                    $pdf->SetAuthor('Your Company Name');
                    $pdf->SetTitle('Test Result for ' . $result['name']);
                    $pdf->SetSubject('Test Result');
                    $pdf->SetKeywords('Test, Result, PDF');

                    $pdf->AddPage();

                    $html = '<h1>Test Result for ' . htmlspecialchars($result['name']) . '</h1>';
                    $html .= '<p>Email: ' . htmlspecialchars($result['gmail']) . '</p>';
                    $html .= '<p>Phone: ' . htmlspecialchars($result['phone']) . '</p>';
                    $html .= '<p>Location: ' . htmlspecialchars($result['location']) . '</p>';
                    $html .= '<p>Test taken on: ' . date('F j, Y, g:i a', strtotime($result['created_at'])) . '</p>';
                    $html .= '<p>Test type: ' . htmlspecialchars(ucfirst($result['test_type'])) . '</p>';
                    $html .= '<p>Correct answers: ' . $result['correct_count'] . ' out of ' . $result['total_questions'] . '</p>';
                    $html .= '<p>Score: ' . number_format($result['percentage'], 2) . '%</p>';

                    foreach ($detailed_results as $index => $question) {
                        $html .= '<h3>Question ' . ($index + 1) . '</h3>';
                        $html .= '<p>' . htmlspecialchars($question['question']) . '</p>';
                        foreach (['A', 'B', 'C', 'D'] as $option) {
                            $html .= '<p>';
                            $html .= $option . ': ' . htmlspecialchars($question['options'][$option]);
                            if ($question['userAnswer'] === $option) {
                                $html .= ' (Your answer)';
                            }
                            if ($question['correctAnswer'] === $option) {
                                $html .= ' (Correct answer)';
                            }
                            $html .= '</p>';
                        }
                    }

                    $pdf->writeHTML($html, true, false, true, false, '');
                    $pdf->Output('test_result_' . $result['id'] . '.pdf', 'D');

                    // Unset the test_user_id session after downloading
                    unset($_SESSION['test_user_id']);
                    session_destroy();

                    exit;
                }

                require "views/psychometric/view_detailed_result.view.php";
            } catch (Exception $e) {
                error_log('Error fetching test result: ' . $e->getMessage());
                $error = "An error occurred while fetching the test result.";
            }
        } else {
            // Fetch and display a list of all results
            $query = "SELECT id, test_type, percentage, created_at FROM test_results WHERE user_id = :user_id ORDER BY created_at DESC";
            $params = [':user_id' => $user_id];

            try {
                $results = $db->query($query, $params)->fetchAll();
                require "views/psychometric/view_results_list.view.php";
            } catch (Exception $e) {
                error_log('Error fetching test results: ' . $e->getMessage());
                $error = "An error occurred while fetching the test results.";
            }
        }
        break;
        // ... existing code ...
    case 'career':
        // Insert a record in the test_results table
        $query = "INSERT INTO test_results (user_id, test_type, created_at) 
                      VALUES (:user_id, 'career', NOW())";

        try {
            $result = $db->query($query, [
                ':user_id' => $user_id
            ]);

            if ($result) {
                // Redirect to external career assessment tool
                header('Location: https://careerassessment.frameimpacts.com');
                exit;
            } else {
                throw new Exception('Failed to insert record');
            }
        } catch (Exception $e) {
            error_log('Error inserting career test record: ' . $e->getMessage());
            $error = "An error occurred while processing your request.";
        }
        break;
    case 'logical':
        // Logic for logical reasoning test
        break;
    case 'mechanical':
        // Logic for mechanical reasoning test
        break;
    case 'spatial':
        // Logic for spatial reasoning test
        break;
    case 'situational':
        // Logic for situational judgement test
        break;
    case 'excel':
        // Logic for excel test
        break;
    case 'critical':
        // Logic for critical thinking test
        break;
    default:
        require 'views/psychometric/psychometric.view.php';
        break;
}

function calculateCareerSuggestions($answers)
{
    $careerScores = [
        'Technology' => 0,
        'Business' => 0,
        'Creative' => 0,
        'Healthcare' => 0,
        'Education' => 0
    ];

    foreach ($answers as $questionId => $answer) {
        switch ($questionId) {
            case 'q1':
                if ($answer === 'A') $careerScores['Technology'] += 2;
                if ($answer === 'B') $careerScores['Creative'] += 2;
                if ($answer === 'C') $careerScores['Business'] += 2;
                if ($answer === 'D') $careerScores['Healthcare'] += 2;
                break;
            case 'q2':
                if ($answer === 'A') $careerScores['Business'] += 2;
                if ($answer === 'B') $careerScores['Education'] += 2;
                if ($answer === 'C') $careerScores['Creative'] += 2;
                if ($answer === 'D') $careerScores['Healthcare'] += 2;
                break;
            case 'q3':
                if ($answer === 'A') $careerScores['Technology'] += 2;
                if ($answer === 'B') $careerScores['Creative'] += 2;
                if ($answer === 'C') $careerScores['Education'] += 2;
                if ($answer === 'D') $careerScores['Technology'] += 2;
                break;
                // Add more cases for other questions
        }
    }

    arsort($careerScores);
    $topCareers = array_slice(array_keys($careerScores), 0, 3);

    $careerSuggestions = [];
    foreach ($topCareers as $career) {
        switch ($career) {
            case 'Technology':
                $careerSuggestions[] = 'Software Developer';
                $careerSuggestions[] = 'Data Analyst';
                break;
            case 'Business':
                $careerSuggestions[] = 'Business Analyst';
                $careerSuggestions[] = 'Marketing Manager';
                break;
            case 'Creative':
                $careerSuggestions[] = 'Graphic Designer';
                $careerSuggestions[] = 'UX Designer';
                break;
            case 'Healthcare':
                $careerSuggestions[] = 'Nurse';
                $careerSuggestions[] = 'Medical Technician';
                break;
            case 'Education':
                $careerSuggestions[] = 'Teacher';
                $careerSuggestions[] = 'Educational Counselor';
                break;
        }
    }

    return array_unique($careerSuggestions);
}

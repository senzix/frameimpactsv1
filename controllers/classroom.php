<?php
$config = require 'config.php';
$db = new Database($config['database']);

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

$userId = $_SESSION['user_id'];

// Check if a specific course is requested
if (isset($_GET['id'])) {
    $courseId = $_GET['id'];
    
    // Fetch the specific course
    $query = "
        SELECT c.course_id, c.title, c.description, c.image_path, c.video_url, 
               cc.category_id, cc.category_name
        FROM courses c
        JOIN course_categories_association cca ON c.course_id = cca.course_id
        JOIN course_categories cc ON cca.category_id = cc.category_id
        WHERE c.course_id = :course_id AND c.course_id IN (
            SELECT course_id FROM user_courses WHERE user_id = :user_id
        )
    ";
    $course = $db->query($query, [':course_id' => $courseId, ':user_id' => $userId])->fetch();

    if ($course) {
        $header = $course['title'];

        // Fetch comments for the course
        $commentsQuery = "
            SELECT cc.id, cc.content, cc.created_at, u.username
            FROM course_comments cc
            JOIN users u ON cc.user_id = u.user_id
            WHERE cc.course_id = :course_id
            ORDER BY cc.created_at DESC
        ";
        $comments = $db->query($commentsQuery, [':course_id' => $courseId])->fetchAll();

        // Handle comment submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
            $commentContent = trim($_POST['comment']);
            if (!empty($commentContent)) {
                $insertCommentQuery = "
                    INSERT INTO course_comments (course_id, user_id, content, created_at)
                    VALUES (:course_id, :user_id, :content, NOW())
                ";
                $db->query($insertCommentQuery, [
                    ':course_id' => $courseId,
                    ':user_id' => $userId,
                    ':content' => $commentContent
                ]);

                // Redirect to prevent form resubmission
                header("Location: /classroom?id=$courseId");
                exit();
            }
        }

        require "views/course.view.php";   
    } else {
        // Course not found or user doesn't have access
        header("HTTP/1.0 404 Not Found");
        require "views/404.view.php";
    }
} else {
    // Original classroom code
    $header = "Classroom";

    // Fetch user's assigned courses with categories
    $query = "
        SELECT c.course_id, c.title, c.description, c.image_path, c.video_url, 
               cc.category_id, cc.category_name
        FROM user_courses uc
        JOIN courses c ON uc.course_id = c.course_id
        JOIN course_categories_association cca ON c.course_id = cca.course_id
        JOIN course_categories cc ON cca.category_id = cc.category_id
        WHERE uc.user_id = :user_id
        ORDER BY cc.category_name, c.created_at
    ";
    $courses = $db->query($query, [':user_id' => $userId])->fetchAll();

    // Group courses by category
    $categorizedCourses = [];
    foreach ($courses as $course) {
        $categoryId = $course['category_id'];
        $categoryName = $course['category_name'];
        
        if (!isset($categorizedCourses[$categoryId])) {
            $categorizedCourses[$categoryId] = [
                'name' => $categoryName,
                'courses' => []
            ];
        }
        
        $categorizedCourses[$categoryId]['courses'][] = $course;
    }

    // Pass the categorized courses data to the view
    require "views/classroom.view.php";
}
<?php
$config = require 'config.php';
$db = new Database($config['database']);

session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: adminlogin");
    exit;
}

// Admin actions
$action = $_GET['action'] ?? 'dashboard';

// Fetch data for dashboard
$totalPosts = $db->query("SELECT COUNT(*) as count FROM blogs")->fetch()['count'];
$totalUsers = $db->query("SELECT COUNT(*) as count FROM users")->fetch()['count'];
$totalCourses = $db->query("SELECT COUNT(*) as count FROM courses")->fetch()['count'];
$totalQuestions = $db->query("SELECT COUNT(*) as count FROM numerical_questions")->fetch()['count'];

$recentPosts = $db->query("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 5")->fetchAll();
$recentUsers = $db->query("SELECT * FROM users ORDER BY created_at DESC LIMIT 5")->fetchAll();

switch ($action) {
    case 'dashboard':
        ob_start();
        require 'views/admin/dashboard.php';
        $content = ob_get_clean();
        break;
    case 'manage_comments':
        $comments = $db->query("SELECT c.comment_id, c.post_id, c.user_id, c.comment_author, c.comment_content, c.created_at, c.updated_at, b.title as post_title, u.username FROM comments c JOIN blogs b ON c.post_id = b.post_id JOIN users u ON c.user_id = u.user_id ORDER BY c.created_at DESC")->fetchAll();
        ob_start();
        require 'views/admin/manage_comments.view.php';
        $content = ob_get_clean();
        break;

    case 'delete_comment':
        $comment_id = $_GET['comment_id'];
        $db->query("DELETE FROM comments WHERE comment_id = :comment_id", [':comment_id' => $comment_id]);
        header("Location: admin?action=manage_comments");
        exit;

    case 'manage_subscribers':
        $subscribers = $db->query("SELECT * FROM newsletter_subscribers ORDER BY created_at DESC")->fetchAll();
        ob_start();
        require 'views/admin/manage_subscribers.view.php';
        $content = ob_get_clean();
        break;
    case 'delete_subscriber':
        $subscriber_id = $_GET['subscriber_id'];
        $db->query("DELETE FROM newsletter_subscribers WHERE subscriber_id = :subscriber_id", [':subscriber_id' => $subscriber_id]);
        header("Location: admin?action=manage_subscribers");
        exit;

    case 'manage_admins':
        $admins = $db->query("SELECT * FROM admins ORDER BY created_at DESC")->fetchAll();
        ob_start();
        require 'views/admin/manage_admins.view.php';
        $content = ob_get_clean();
        break;
    case 'add_admin':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "INSERT INTO admins (username, email, password, created_at) VALUES (:username, :email, :password, NOW())";
            $db->query($query, [':username' => $username, ':email' => $email, ':password' => $password]);
            header("Location: admin?action=manage_admins");
            exit;
        }
        ob_start();
        require 'views/admin/add_admin.view.php';
        $content = ob_get_clean();
        break;

    case 'delete_admin':
        $admin_id = $_GET['admin_id'];
        $db->query("DELETE FROM admins WHERE admin_id = :admin_id", [':admin_id' => $admin_id]);
        header("Location: admin?action=manage_admins");
        exit;

    case 'manage_posts':
        $posts = $db->query("SELECT * FROM blogs ORDER BY created_at DESC")->fetchAll();
        ob_start();
        require 'views/admin/manage_posts.view.php';
        $content = ob_get_clean();
        break;

    case 'add_post':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image_path = $_FILES['image']['name'] ? $_FILES['image']['name'] : null;
            if ($image_path) {
                move_uploaded_file($_FILES['image']['tmp_name'], "img/upload/" . $image_path);
            }
            $query = "INSERT INTO blogs (title, content, image_path, created_at) VALUES (:title, :content, :image_path, NOW())";
            $db->query($query, [':title' => $title, ':content' => $content, ':image_path' => $image_path]);
            header("Location: admin?action=manage_posts");
            exit;
        }
        ob_start();
        require 'views/admin/add_post.view.php';
        $content = ob_get_clean();
        break;

    case 'edit_post':
        $post_id = $_GET['post_id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image_path = $_FILES['image']['name'] ? $_FILES['image']['name'] : null;
            if ($image_path) {
                move_uploaded_file($_FILES['image']['tmp_name'], "img/upload/" . $image_path);
            }
            $query = "UPDATE blogs SET title = :title, content = :content, image_path = :image_path, updated_at = NOW() WHERE post_id = :post_id";
            $db->query($query, [':title' => $title, ':content' => $content, ':image_path' => $image_path, ':post_id' => $post_id]);
            header("Location: admin?action=manage_posts");
            exit;
        }
        $post = $db->query("SELECT * FROM blogs WHERE post_id = :post_id", [':post_id' => $post_id])->fetch();
        ob_start();
        require 'views/admin/edit_post.view.php';
        $content = ob_get_clean();
        break;

    case 'delete_post':
        $post_id = $_GET['post_id'];
        $db->query("DELETE FROM blogs WHERE post_id = :post_id", [':post_id' => $post_id]);
        header("Location: admin?action=manage_posts");
        exit;

    case 'manage_users':
        $users = $db->query("SELECT * FROM users ORDER BY created_at DESC")->fetchAll();
        ob_start();
        require 'views/admin/manage_users.view.php';
        $content = ob_get_clean();
        break;

    case 'add_user':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $query = "INSERT INTO users (name, username, email, mobile, address, password_hash, created_at) VALUES (:name, :username, :email, :mobile, :address, :password_hash, NOW())";
            $db->query($query, [':name' => $name, ':username' => $username, ':email' => $email, ':mobile' => $mobile, ':address' => $address, ':password_hash' => $password]);
            header("Location: admin?action=manage_users");
            exit;
        }
        ob_start();
        require 'views/admin/add_user.view.php';
        $content = ob_get_clean();
        break;

    case 'edit_user':
        $user_id = $_GET['user_id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];

            $existing_username = $db->query("SELECT user_id FROM users WHERE username = :username AND user_id != :user_id", [':username' => $username, ':user_id' => $user_id])->fetch();
            if ($existing_username) {
                $error = "Username already exists. Please choose a different username.";
                $user = $db->query("SELECT * FROM users WHERE user_id = :user_id", [':user_id' => $user_id])->fetch();
                ob_start();
                require 'views/admin/edit_user.view.php';
                $content = ob_get_clean();
                break;
            }

            $existing_email = $db->query("SELECT user_id FROM users WHERE email = :email AND user_id != :user_id", [':email' => $email, ':user_id' => $user_id])->fetch();
            if ($existing_email) {
                $error = "Email already exists. Please use a different email address.";
                $user = $db->query("SELECT * FROM users WHERE user_id = :user_id", [':user_id' => $user_id])->fetch();
                ob_start();
                require 'views/admin/edit_user.view.php';
                $content = ob_get_clean();
                break;
            }

            $query = "UPDATE users SET name = :name, username = :username, email = :email, mobile = :mobile, address = :address WHERE user_id = :user_id";
            $db->query($query, [':name' => $name, ':username' => $username, ':email' => $email, ':mobile' => $mobile, ':address' => $address, ':user_id' => $user_id]);

            if (!empty($_POST['password'])) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $db->query("UPDATE users SET password_hash = :password WHERE user_id = :user_id", [':password' => $password, ':user_id' => $user_id]);
            }

            header("Location: admin?action=manage_users");
            exit;
        }
        $user = $db->query("SELECT * FROM users WHERE user_id = :user_id", [':user_id' => $user_id])->fetch();
        ob_start();
        require 'views/admin/edit_user.view.php';
        $content = ob_get_clean();
        break;

    case 'delete_user':
        $user_id = $_GET['user_id'];
        $db->query("DELETE FROM users WHERE user_id = :user_id", [':user_id' => $user_id]);
        header("Location: admin?action=manage_users");
        exit;
    case 'manage_courses':
        $courses = $db->query("
                SELECT c.*, cc.category_name, 
                GROUP_CONCAT(u.username SEPARATOR ', ') as assigned_users
                FROM courses c 
                LEFT JOIN course_categories_association cca ON c.course_id = cca.course_id
                LEFT JOIN course_categories cc ON cca.category_id = cc.category_id
                LEFT JOIN user_courses uc ON c.course_id = uc.course_id
                LEFT JOIN users u ON uc.user_id = u.user_id 
                GROUP BY c.course_id
                ORDER BY c.created_at DESC
            ")->fetchAll();

        ob_start();
        require 'views/admin/manage_courses.view.php';
        $content = ob_get_clean();
        break;
    case 'add_course':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image_path = $_FILES['image']['name'] ? 'img/upload/courses/' . $_FILES['image']['name'] : null;
            $video_url = $_POST['video_url'];
            $category_id = $_POST['category_id'];
            $assigned_users = isset($_POST['assigned_users']) ? $_POST['assigned_users'] : [];
            $created_by = $_SESSION['admin_id']; // Assuming the admin's ID is stored in session

            if ($image_path) {
                move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
            }

            $query = "INSERT INTO courses (title, description, image_path, video_url, created_by, created_at, updated_at) 
                          VALUES (:title, :description, :image_path, :video_url, :created_by, NOW(), NOW())";
            $db->query($query, [
                ':title' => $title,
                ':description' => $description,
                ':image_path' => $image_path,
                ':video_url' => $video_url,
                ':created_by' => $created_by
            ]);

            $course_id = $db->lastInsertId();

            // Add course category association
            $db->query(
                "INSERT INTO course_categories_association (course_id, category_id) 
                     VALUES (:course_id, :category_id)",
                [':course_id' => $course_id, ':category_id' => $category_id]
            );

            // Assign users to the course
            foreach ($assigned_users as $user_id) {
                $db->query(
                    "INSERT INTO user_courses (user_id, course_id) VALUES (:user_id, :course_id)",
                    [':user_id' => $user_id, ':course_id' => $course_id]
                );
            }

            header("Location: admin?action=manage_courses");
            exit;
        }
        $users = $db->query("SELECT user_id, username FROM users")->fetchAll();
        $categories = $db->query("SELECT category_id, category_name FROM course_categories")->fetchAll();
        ob_start();
        require 'views/admin/add_course.view.php';
        $content = ob_get_clean();
        break;

    case 'edit_course':
        $course_id = $_GET['course_id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $video_url = $_POST['video_url'];
            $category_id = $_POST['category_id'];
            $assigned_users = isset($_POST['assigned_users']) ? $_POST['assigned_users'] : [];

            $image_path = $_FILES['image']['name']
                ? 'uploads/courses/' . $_FILES['image']['name']
                : $db->query("SELECT image_path FROM courses WHERE course_id = :course_id", [':course_id' => $course_id])->fetchColumn();

            if ($_FILES['image']['name']) {
                move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
            }

            $query = "UPDATE courses 
                          SET title = :title, description = :description, image_path = :image_path, 
                              video_url = :video_url, updated_at = NOW() 
                          WHERE course_id = :course_id";
            $db->query($query, [
                ':title' => $title,
                ':description' => $description,
                ':image_path' => $image_path,
                ':video_url' => $video_url,
                ':course_id' => $course_id
            ]);

            // Update course category association
            $db->query("DELETE FROM course_categories_association WHERE course_id = :course_id", [':course_id' => $course_id]);
            $db->query(
                "INSERT INTO course_categories_association (course_id, category_id) 
                         VALUES (:course_id, :category_id)",
                [':course_id' => $course_id, ':category_id' => $category_id]
            );

            // Update assigned users
            $db->query("DELETE FROM user_courses WHERE course_id = :course_id", [':course_id' => $course_id]);
            foreach ($assigned_users as $user_id) {
                $db->query(
                    "INSERT INTO user_courses (user_id, course_id) VALUES (:user_id, :course_id)",
                    [':user_id' => $user_id, ':course_id' => $course_id]
                );
            }

            header("Location: admin?action=manage_courses");
            exit;
        }

        $course = $db->query("SELECT c.*, cca.category_id 
                                  FROM courses c 
                                  LEFT JOIN course_categories_association cca ON c.course_id = cca.course_id 
                                  WHERE c.course_id = :course_id", [':course_id' => $course_id])->fetch();
        $users = $db->query("SELECT user_id, username FROM users")->fetchAll();
        $categories = $db->query("SELECT category_id, category_name FROM course_categories")->fetchAll();
        $assigned_users = $db->query("SELECT user_id FROM user_courses WHERE course_id = :course_id", [':course_id' => $course_id])->fetchAll(PDO::FETCH_COLUMN);

        ob_start();
        require 'views/admin/edit_course.view.php';
        $content = ob_get_clean();
        break;
    case 'delete_course':
        $course_id = $_GET['course_id'];
        // First, delete the course-category associations
        $db->query("DELETE FROM course_categories_association WHERE course_id = :course_id", [':course_id' => $course_id]);
        // Then, delete the course
        $db->query("DELETE FROM courses WHERE course_id = :course_id", [':course_id' => $course_id]);
        header("Location: admin?action=manage_courses");
        exit;
    case 'manage_course_comments':
        $course_id = isset($_GET['course_id']) ? $_GET['course_id'] : null;

        if ($course_id) {
            $course = $db->query("SELECT title FROM courses WHERE course_id = :course_id", [':course_id' => $course_id])->fetch();
            $comments = $db->query(
                "SELECT cc.*, u.username 
                                        FROM course_comments cc 
                                        JOIN users u ON cc.user_id = u.user_id 
                                        WHERE cc.course_id = :course_id 
                                        ORDER BY cc.created_at DESC",
                [':course_id' => $course_id]
            )->fetchAll();
        } else {
            $comments = $db->query("SELECT cc.*, c.title as course_title, u.username 
                                        FROM course_comments cc 
                                        JOIN courses c ON cc.course_id = c.course_id 
                                        JOIN users u ON cc.user_id = u.user_id 
                                        ORDER BY cc.created_at DESC")->fetchAll();
        }

        ob_start();
        require 'views/admin/manage_course_comments.view.php';
        $content = ob_get_clean();
        break;

    case 'edit_course_comment':
        $comment_id = $_GET['comment_id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['content'];
            $db->query(
                "UPDATE course_comments SET content = :content, updated_at = NOW() WHERE id = :comment_id",
                [':content' => $content, ':comment_id' => $comment_id]
            );
            header("Location: admin?action=manage_course_comments");
            exit;
        }
        $comment = $db->query(
            "SELECT cc.*, c.title as course_title, u.username 
                                   FROM course_comments cc 
                                   JOIN courses c ON cc.course_id = c.course_id 
                                   JOIN users u ON cc.user_id = u.user_id 
                                   WHERE cc.id = :comment_id",
            [':comment_id' => $comment_id]
        )->fetch();
        ob_start();
        require 'views/admin/edit_course_comment.view.php';
        $content = ob_get_clean();
        break;

    case 'delete_course_comment':
        $comment_id = $_GET['comment_id'];
        $db->query("DELETE FROM course_comments WHERE id = :comment_id", [':comment_id' => $comment_id]);
        header("Location: admin?action=manage_course_comments");
        exit;

    case 'manage_categories':
        $categories = $db->query("SELECT cc.*, COUNT(cca.course_id) as course_count 
                                  FROM course_categories cc 
                                  LEFT JOIN course_categories_association cca ON cc.category_id = cca.category_id 
                                  GROUP BY cc.category_id 
                                  ORDER BY cc.category_name")->fetchAll();
        ob_start();
        require 'views/admin/manage_categories.view.php';
        $content = ob_get_clean();
        break;

    case 'add_category':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category_name = $_POST['category_name'];
            $db->query(
                "INSERT INTO course_categories (category_name, created_at, updated_at) 
                        VALUES (:category_name, NOW(), NOW())",
                [':category_name' => $category_name]
            );
            header("Location: admin?action=manage_categories");
            exit;
        }
        ob_start();
        require 'views/admin/add_category.view.php';
        $content = ob_get_clean();
        break;

    case 'edit_category':
        $category_id = $_GET['category_id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category_name = $_POST['category_name'];
            $db->query(
                "UPDATE course_categories SET category_name = :category_name, updated_at = NOW() 
                        WHERE category_id = :category_id",
                [':category_name' => $category_name, ':category_id' => $category_id]
            );
            header("Location: admin?action=manage_categories");
            exit;
        }
        $category = $db->query(
            "SELECT * FROM course_categories WHERE category_id = :category_id",
            [':category_id' => $category_id]
        )->fetch();
        ob_start();
        require 'views/admin/edit_category.view.php';
        $content = ob_get_clean();
        break;

    case 'delete_category':
        $category_id = $_GET['category_id'];
        // Check if there are any courses associated with this category
        $courses_count = $db->query(
            "SELECT COUNT(*) FROM course_categories_association WHERE category_id = :category_id",
            [':category_id' => $category_id]
        )->fetchColumn();
        if ($courses_count == 0) {
            $db->query("DELETE FROM course_categories WHERE category_id = :category_id", [':category_id' => $category_id]);
            header("Location: admin?action=manage_categories");
        } else {
            $_SESSION['error'] = "Cannot delete category. There are courses associated with it.";
            header("Location: admin?action=manage_categories");
        }
        exit;

    case 'manage_questions':
        $questions = $db->query("SELECT * FROM numerical_questions ORDER BY id DESC")->fetchAll();
        ob_start();
        require 'views/admin/manage_questions.view.php';
        $content = ob_get_clean();
        break;

    case 'add_question':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $question = $_POST['question'];
            $option_a = $_POST['option_a'];
            $option_b = $_POST['option_b'];
            $option_c = $_POST['option_c'];
            $option_d = $_POST['option_d'];
            $correct_answer = $_POST['correct_answer'];
            $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : null;

            if ($image) {
                move_uploaded_file($_FILES['image']['tmp_name'], "img/test/numerical/" . $image);
            }

            $query = "INSERT INTO numerical_questions (question, option_a, option_b, option_c, option_d, correct_answer, image) VALUES (:question, :option_a, :option_b, :option_c, :option_d, :correct_answer, :image)";
            $db->query($query, [
                ':question' => $question,
                ':option_a' => $option_a,
                ':option_b' => $option_b,
                ':option_c' => $option_c,
                ':option_d' => $option_d,
                ':correct_answer' => $correct_answer,
                ':image' => $image
            ]);

            header("Location: admin?action=manage_questions");
            exit;
        }
        ob_start();
        require 'views/admin/add_question.view.php';
        $content = ob_get_clean();
        break;

    case 'edit_question':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $question = $_POST['question'];
            $option_a = $_POST['option_a'];
            $option_b = $_POST['option_b'];
            $option_c = $_POST['option_c'];
            $option_d = $_POST['option_d'];
            $correct_answer = $_POST['correct_answer'];
            $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : $_POST['current_image'];

            if ($_FILES['image']['name']) {
                move_uploaded_file($_FILES['image']['tmp_name'], "img/test/numerical/" . $image);
            }

            $query = "UPDATE numerical_questions SET question = :question, option_a = :option_a, option_b = :option_b, option_c = :option_c, option_d = :option_d, correct_answer = :correct_answer, image = :image WHERE id = :id";
            $db->query($query, [
                ':question' => $question,
                ':option_a' => $option_a,
                ':option_b' => $option_b,
                ':option_c' => $option_c,
                ':option_d' => $option_d,
                ':correct_answer' => $correct_answer,
                ':image' => $image,
                ':id' => $id
            ]);

            header("Location: admin?action=manage_questions");
            exit;
        }
        $question = $db->query("SELECT * FROM numerical_questions WHERE id = :id", [':id' => $id])->fetch();
        ob_start();
        require 'views/admin/edit_question.view.php';
        $content = ob_get_clean();
        break;

    case 'delete_question':
        $id = $_GET['id'];
        $db->query("DELETE FROM numerical_questions WHERE id = :id", [':id' => $id]);
        header("Location: admin?action=manage_questions");
        exit;

    case 'view_results':
        $test_users_with_tests = $db->query("SELECT DISTINCT tu.test_user_id, tu.name, tu.gmail, tu.phone, tu.location, MAX(tr.created_at) as last_test_date 
                                            FROM test_users tu 
                                            JOIN test_results tr ON tu.test_user_id = tr.user_id 
                                            GROUP BY tu.test_user_id 
                                            ORDER BY last_test_date DESC")->fetchAll();
        ob_start();
        require 'views/admin/view_results.view.php';
        $content = ob_get_clean();
        break;

    case 'user_results':
        $test_user_id = $_GET['test_user_id'];
        $test_user = $db->query("SELECT * FROM test_users WHERE test_user_id = :test_user_id", [':test_user_id' => $test_user_id])->fetch();
        $results = $db->query("SELECT * FROM test_results WHERE user_id = :user_id ORDER BY created_at DESC", ['user_id' => $test_user_id])->fetchAll();
        ob_start();
        require 'views/admin/user_results.view.php';
        $content = ob_get_clean();
        break;

    case 'view_detailed_result':
        $id = $_GET['id'];
        $result = $db->query("SELECT tr.*, tu.name, tu.gmail, tu.phone, tu.location FROM test_results tr JOIN test_users tu ON tr.user_id = tu.test_user_id WHERE tr.id = :id", [':id' => $id])->fetch();
        $detailed_results = json_decode($result['detailed_results'], true);
        ob_start();
        require 'views/admin/view_detailed_result.view.php';
        $content = ob_get_clean();
        break;

    case 'download_result_pdf':
        $id = $_GET['id'];
        $result = $db->query("SELECT tr.*, tu.name, tu.gmail, tu.phone, tu.location FROM test_results tr JOIN test_users tu ON tr.user_id = tu.test_user_id WHERE tr.id = :id", [':id' => $id])->fetch();
        $detailed_results = json_decode($result['detailed_results'], true);

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
                    $html .= ' (User\'s answer)';
                }
                if ($question['correctAnswer'] === $option) {
                    $html .= ' (Correct answer)';
                }
                $html .= '</p>';
            }
        }

        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('test_result_' . $result['id'] . '.pdf', 'D');
        exit;

    case 'edit_result':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correct_count = $_POST['correct_count'];
            $total_questions = $_POST['total_questions'];
            $percentage = ($correct_count / $total_questions) * 100;
            $query = "UPDATE test_results SET correct_count = :correct_count, total_questions = :total_questions, percentage = :percentage WHERE id = :id";
            $db->query($query, [':correct_count' => $correct_count, ':total_questions' => $total_questions, ':percentage' => $percentage, ':id' => $id]);
            header("Location: admin?action=user_results&test_user_id=" . $_POST['test_user_id']);
            exit;
        }
        $result = $db->query("SELECT tr.*, tu.name, tu.gmail, tu.phone, tu.location FROM test_results tr JOIN test_users tu ON tr.user_id = tu.test_user_id WHERE tr.id = :id", [':id' => $id])->fetch();
        ob_start();
        require 'views/admin/edit_result.view.php';
        $content = ob_get_clean();
        break;

    case 'logout':
        session_destroy();
        header("Location: /");
        exit;

    default:
        ob_start();
        require 'views/admin/dashboard.php';
        $content = ob_get_clean();
        break;
}

// Load the main admin panel view
require 'views/admin/admin_panel.view.php';

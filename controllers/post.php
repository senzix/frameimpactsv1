<?php
$config = require 'config.php';
$db = new Database($config['database']);

if (isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
    $post = $db->query('SELECT * FROM blogs WHERE post_id = :post_id', [
        ':post_id' => $post_id
    ])->fetch();

    if (!$post) {
        header("Location: blog");
        exit;
    }

    // Fetch comments for this post
    $comments = $db->query('SELECT * FROM comments WHERE post_id = :post_id ORDER BY created_at DESC', [
        ':post_id' => $post_id
    ])->fetchAll();

    $header = $post['title'];
} else {
    header("Location: blog");
    exit;
}

// Handle comment submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    $comment_author = $_POST['comment_author'] ?? null;
    $comment_content = $_POST['comment_content'] ?? null;

    if ($comment_author && $comment_content) {
        $query = "INSERT INTO comments (post_id, comment_author, comment_content) VALUES (:post_id, :comment_author, :comment_content)";
        $params = [
            ':post_id' => $post_id,
            ':comment_author' => $comment_author,
            ':comment_content' => $comment_content
        ];

        try {
            $db->query($query, $params);
            // Redirect to refresh the page and show the new comment
            header("Location: post?p_id=$post_id#comments");
            exit;
        } catch (PDOException $e) {
            $error = "An error occurred while posting your comment. Please try again.";
        }
    } else {
        $error = "Please fill in all required fields.";
    }
}

// Fetch 6 most recent posts
$recent_posts = $db->query('SELECT * FROM blogs ORDER BY created_at DESC LIMIT 6')->fetchAll();

// Split the posts into two arrays: first 3 posts and last 3 posts
$first_half = array_slice($recent_posts, 0, 3);
$second_half = array_slice($recent_posts, 3, 3);

require "views/post.view.php";
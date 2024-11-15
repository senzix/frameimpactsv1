<?php
$config = require 'config.php';
$db = new Database($config['database']);

$header = "Articles";

// Pagination settings
$posts_per_page = 6;  // Show 6 posts per page
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $posts_per_page;

// Get total published posts
$total_posts = $db->query('
    SELECT COUNT(*) as total 
    FROM blogs 
    WHERE is_draft = 0
')->fetch()['total'];

$total_pages = ceil($total_posts / $posts_per_page);

// Fetch published posts with author information
$notes = $db->query('
    SELECT 
        b.*,
        a.username as author_name,
        COALESCE(b.views, 0) as views
    FROM blogs b 
    LEFT JOIN admins a ON b.created_by = a.admin_id 
    WHERE b.is_draft = 0 
    ORDER BY b.created_at DESC 
    LIMIT ' . $posts_per_page . ' 
    OFFSET ' . $offset
)->fetchAll();

// Recent posts for sidebar (only published)
$recent_posts = $db->query('
    SELECT 
        post_id,
        title,
        created_at,
        image_path,
        views
    FROM blogs 
    WHERE is_draft = 0 
    ORDER BY created_at DESC 
    LIMIT 6
')->fetchAll();

// Split recent posts for sidebar
$first_half = array_slice($recent_posts, 0, 3);
$second_half = array_slice($recent_posts, 3, 3);

// Ensure page number is valid
if ($page > $total_pages && $total_pages > 0) {
    header("Location: articles?page=" . $total_pages);
    exit;
}

require "views/articles.view.php";
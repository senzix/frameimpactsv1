<?php
$config = require 'config.php';
$db = new Database($config['database']);

$header = "Articles";

// Determine the current page
$posts_per_page = 4;  // Number of posts to show per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $posts_per_page;

// Fetch the total number of blog posts
$total_posts = $db->query('SELECT COUNT(*) as total FROM blogs')->fetch()['total'];
$total_pages = ceil($total_posts / $posts_per_page);

// Fetch the blog posts for the current page
$query = 'SELECT * FROM blogs ORDER BY post_id DESC LIMIT ' . (int)$posts_per_page . ' OFFSET ' . (int)$offset;
$notes = $db->query($query)->fetchAll();

//recent post
$recent_posts = $db->query('SELECT * FROM blogs ORDER BY created_at DESC LIMIT 6')->fetchAll();

// Split the posts into two arrays: first 3 posts and last 3 posts
$first_half = array_slice($recent_posts, 0, 3);
$second_half = array_slice($recent_posts, 3, 3);

require "views/articles.view.php";
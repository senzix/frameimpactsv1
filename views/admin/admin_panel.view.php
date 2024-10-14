<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Frame Impacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="views/admin/admin_style.css?v=1.1" rel="stylesheet">
</head>
<body>
<div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Frame Impacts</h3>
            </div>
            <ul class="list-unstyled components">
                <li class="<?= $action === 'dashboard' ? 'active' : '' ?>">
                    <a href="?action=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="<?= $action === 'manage_admins' ? 'active' : '' ?>">
                    <a href="?action=manage_admins"><i class="fas fa-user-shield"></i> Manage Admins</a>
                </li>
                <li class="<?= $action === 'manage_posts' ? 'active' : '' ?>">
                    <a href="?action=manage_posts"><i class="fas fa-newspaper"></i> Manage Posts</a>
                </li>
                <li class="<?= $action === 'manage_users' ? 'active' : '' ?>">
                    <a href="?action=manage_users"><i class="fas fa-users"></i> Manage Users</a>
                </li>
                <li class="<?= $action === 'manage_categories' ? 'active' : '' ?>">
                    <a href="?action=manage_categories"><i class="fas fa-tags"></i> Manage Categories</a>
                </li>
                <li class="<?= $action === 'manage_courses' ? 'active' : '' ?>">
                    <a href="?action=manage_courses"><i class="fas fa-graduation-cap"></i> Manage Courses</a>
                </li>
                <li class="<?= $action === 'manage_course_comments' ? 'active' : '' ?>">
                    <a href="?action=manage_course_comments"><i class="fas fa-comments"></i> Manage Course Comments</a>
                </li>
                <li class="<?= $action === 'manage_questions' ? 'active' : '' ?>">
                    <a href="?action=manage_questions"><i class="fas fa-question-circle"></i> Manage Questions</a>
                </li>
                <li class="<?= $action === 'view_results' ? 'active' : '' ?>">
                    <a href="?action=view_results"><i class="fas fa-chart-bar"></i> View Test Results</a>
                </li>
                <li class="<?= $action === 'manage_comments' ? 'active' : '' ?>">
                    <a href="?action=manage_comments"><i class="fas fa-comments"></i> Manage Comments</a>
                </li>
                <li class="<?= $action === 'manage_subscribers' ? 'active' : '' ?>">
                    <a href="?action=manage_subscribers"><i class="fas fa-envelope"></i> Manage Subscribers</a>
                </li>
                <li>
                    <a href="?action=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Header -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <span class="navbar-text">
                        Welcome, Admin
                    </span>
                </div>
            </nav>


            <!-- Main Content -->
            <div class="container-fluid mt-4">
                <?php
                if (isset($content)) {
                    echo $content;
                } else {
                    require 'views/admin/dashboard.php';
                }
                ?>
            </div>

            <!-- Footer -->
            <footer class="footer mt-auto py-3 bg-light">
                <div class="container text-center">
                    <span class="text-muted">© 2023 Frame Impacts. All rights reserved.</span>
                </div>
            </footer>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="views/admin/admin_script.js"></script>
</body>
</html>
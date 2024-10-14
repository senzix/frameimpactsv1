<?php require "partials/header.php" ?>
<?php require "partials/banner.php" ?>

<div class="clr-container">
    <aside class="clr-sidebar">
        <h2 class="clr-sidebar-title">Course Categories</h2>
        <nav>
            <ul class="clr-category-list">
                <?php foreach ($categorizedCourses as $categoryId => $category): ?>
                    <li class="clr-category-item">
                        <a href="#category-<?= $categoryId ?>" class="clr-category-link"><?= htmlspecialchars($category['name']) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <a href="/logout" class="clr-btn-logout">Logout</a>
    </aside>
    <main class="clr-main-content">
        <?php if (empty($categorizedCourses)): ?>
            <p class="clr-no-courses">You are not assigned to any courses yet.</p>
        <?php else: ?>
            <?php foreach ($categorizedCourses as $categoryId => $category): ?>
                <section id="category-<?= $categoryId ?>" class="clr-category-section">
                    <h2 class="clr-category-title"><?= htmlspecialchars($category['name']) ?></h2>
                    <div class="clr-course-grid">
                        <?php foreach ($category['courses'] as $course): ?>
                            <article class="clr-course-card">
                                <div class="clr-course-media">
                                    <?php if ($course['image_path']):?>
                                        <img src="<?= $course['image_path'] ?>" alt="<?= htmlspecialchars($course['title']) ?>" class="clr-course-image">
                                       
                                    <?php elseif ($course['video_url']): ?>
                                        <video controls class="clr-course-video">
                                            <source src="<?= $course['video_url'] ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    <?php else: ?>
                                        <div class="clr-placeholder-image">No media available</div>
                                    <?php endif; ?>
                                </div>
                                <div class="clr-course-info">
                                    <h3 class="clr-course-title"><?= htmlspecialchars($course['title']) ?></h3>
                                    <p class="clr-course-description"><?= htmlspecialchars($course['description']) ?></p>
                                    <a href="/classroom?id=<?= $course['course_id'] ?>" class="clr-btn-course">Go to Course</a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
</div>

<?php require "partials/banner2.php" ?>
<?php require "partials/footer.php" ?>
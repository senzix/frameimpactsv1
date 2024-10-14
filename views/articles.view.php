<?php require "partials/header.php"; ?>
<?php require "partials/banner.php"; ?>

<div class="container news-page">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php if (!empty($notes)): ?>
                <div class="news-posts">
                    <?php foreach ($notes as $note): ?>
                        <!-- Display Blog Post -->
                        <article class="news-post">
                            <img class="news-img" src="<?= 'img/upload/' . $note['image_path'] ?>" alt="Blog Post" />
                            <h2 class="news-post-title">
                                <a href="post?p_id=<?php echo $note['post_id']; ?>">
                                    <?php echo htmlspecialchars($note['title']); ?>
                                </a>
                            </h2>
                            <p class="news-meta"><i class="fas fa-clock"></i> Posted on
                                <?= (new DateTime($note['created_at']))->format('F j, Y g:i A') ?>
                            </p>
                            <p class="news-content"><?php echo substr(htmlspecialchars($note['content']), 0, 200); ?>...</p>
                            <a class="btn btn-read-more" href="post?p_id=<?php echo $note['post_id']; ?>">Continue Reading <i
                                    class="fas fa-chevron-right"></i></a>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="news-post-error">
                <div class="alert alert-info">
                    <strong>No blog posts available!</strong>
                </div>
                </div>
            <?php endif; ?>

            <!-- Pagination Links -->
            <nav aria-label="Page navigation">
                <ul class="pagination mb-4">
                    <!-- Previous Button -->
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- Page Numbers -->
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next Button -->
                    <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-lg-4">
            <?php require "partials/sidebar.php"; ?>
        </div>
    </div>
</div>
<?php require "partials/banner2.php"?>
<?php require "partials/footer.php"?>
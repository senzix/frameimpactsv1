<?php require "partials/header.php"; ?>
<?php require "partials/banner.php"; ?>

<div class="container-fluid article-container my-5">
    <div class="row justify-content-center">
        <!-- Blog Entries Column -->
        <div class="col-xl-8 col-lg-9">
            <?php if (!empty($notes)): ?>
                <div class="news-posts">
                    <?php foreach ($notes as $note): ?>
                        <article class="elegant-article">
                            <div class="row g-0">
                            <?php if ($note['image_path']): ?>
                                <div class="col-md-4">
                                    <div class="elegant-article__image-container">
                                            <img class="elegant-article__image" 
                                                 src="<?= htmlspecialchars($note['image_path']) ?>" 
                                                 alt="<?= htmlspecialchars($note['title']) ?>" />  
                                    </div>
                                </div>
                                <?php else: ?>
                                <?php endif; ?>
                                <div class="col-md-8">
                                    <div class="elegant-article__content">
                                        <h2 class="elegant-article__title">
                                            <a href="post?p_id=<?= $note['post_id'] ?>">
                                                <?= htmlspecialchars($note['title']) ?>
                                            </a>
                                        </h2>
                                        
                                        <div class="elegant-article__meta">
                                            <span><i class="fas fa-calendar-alt"></i> <?= (new DateTime($note['created_at']))->format('F j, Y') ?></span>
                                            <?php if (isset($note['author_name'])): ?>
                                                <span class="mx-2">•</span>
                                                <span><i class="fas fa-user"></i> <?= htmlspecialchars($note['author_name']) ?></span>
                                            <?php endif; ?>
                                            <?php if (isset($note['views']) && is_numeric($note['views'])): ?>
                                                <span class="mx-2">•</span>
                                                <span><i class="fas fa-eye"></i> <?= number_format((int)$note['views']) ?> views</span>
                                            <?php endif; ?>
                                        </div>

                                        <?php if ($note['excerpt']): ?>
                                            <p class="elegant-article__excerpt">
                                                <?= htmlspecialchars($note['excerpt']) ?>
                                            </p>
                                        <?php else: ?>
                                            <p class="elegant-article__excerpt">
                                                <?= substr(strip_tags($note['content']), 0, 200) ?>...
                                            </p>
                                        <?php endif; ?>

                                        <a class="elegant-article__button" href="post?p_id=<?= $note['post_id'] ?>">
                                            Continue reading <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info text-center p-5">
                    <i class="fas fa-info-circle fa-2x mb-3"></i>
                    <h4>No Articles Found</h4>
                    <p>Check back later for new content!</p>
                </div>
            <?php endif; ?>

            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <nav aria-label="Page navigation" class="my-4">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $page - 1 ?>">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $page + 1 ?>">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <div class="col-xl-3 col-lg-3">
            <?php require "partials/sidebar.php"; ?>
        </div>
    </div>
</div>

<style>
.article-container {
    max-width: 1400px;
    margin: 0 auto;
}

.elegant-article {
    background: white;
    border-radius: 12px;
    margin-bottom: 2rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.elegant-article__image-container {
    width: 100%;
    height: 100%;
    min-height: 250px;
    overflow: hidden;
}

.elegant-article__image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.elegant-article__content {
    padding: 1.8rem;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.elegant-article__title {
    font-size: 1.6rem;
    margin-bottom: 1rem;
    line-height: 1.3;
}

.elegant-article__title a {
    color: #2c3e50;
    text-decoration: none;
}

.elegant-article__meta {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 1rem;
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.elegant-article__meta i {
    color: #3498db;
    width: 16px;
    text-align: center;
}

.elegant-article__excerpt {
    color: #666;
    line-height: 1.7;
    margin-bottom: 1.5rem;
    flex-grow: 1;
}

.elegant-article__button {
    display: inline-flex;
    align-items: center;
    color: #3498db;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
    padding-bottom: 2px;
    border-bottom: 2px solid transparent;
    transition: border-color 0.2s ease;
}

.elegant-article__button:hover {
    color: #2980b9;
    border-bottom-color: #2980b9;
    text-decoration: none;
}

.elegant-article__button i {
    font-size: 0.8rem;
}

/* Pagination Styling */
.pagination {
    gap: 0.5rem;
}

.pagination .page-link {
    border-radius: 6px;
    border: 1px solid #dee2e6;
    color: #3498db;
    padding: 0.7rem 1.2rem;
    font-weight: 500;
}

.pagination .page-item.active .page-link {
    background-color: #3498db;
    border-color: #3498db;
    color: white;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .elegant-article__image-container {
        min-height: 200px;
    }

    .elegant-article__title {
        font-size: 1.4rem;
    }

    .elegant-article__content {
        padding: 1.5rem;
    }
}
</style>

<?php require "partials/banner2.php"?>
<?php require "partials/footer.php"?>
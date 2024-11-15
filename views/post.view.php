<?php require "partials/header.php"; ?>
<?php require "partials/banner.php"; ?>

<div class="post-container post-page">
    <div class="row">
        <!-- Main Content Column -->
        <div class="col-lg-8">
            <?php if (isset($post)): ?>
                <article class="elegant-post">
                    <header class="elegant-post__header">
                        <h1 class="elegant-post__title"><?= htmlspecialchars($post['title']); ?></h1>
                        <div class="elegant-post__meta">
                            <span><i class="fas fa-user"></i> <?= htmlspecialchars($post['author_name'] ?? 'Admin') ?></span>
                            <span class="mx-2">•</span>
                            <span><i class="fas fa-calendar-alt"></i> <?= (new DateTime($post['created_at']))->format('F j, Y') ?></span>
                            <?php if ($post['updated_at']): ?>
                                <span class="mx-2">•</span>
                                <span><i class="fas fa-edit"></i> Updated: <?= (new DateTime($post['updated_at']))->format('F j, Y') ?></span>
                            <?php endif; ?>
                            <span class="mx-2">•</span>
                            <span><i class="fas fa-eye"></i> <?= number_format($post['views'] ?? 0) ?> views</span>
                        </div>
                    </header>

                    <?php if ($post['image_path']): ?>
                        <div class="elegant-post__image-container">
                            <img src="<?= htmlspecialchars($post['image_path']) ?>" 
                                 class="elegant-post__image" 
                                 alt="<?= htmlspecialchars($post['title']) ?>">
                        </div>
                    <?php endif; ?>

                    <?php if ($post['excerpt']): ?>
                        <div class="elegant-post__excerpt">
                            <p class="lead"><?= htmlspecialchars($post['excerpt']) ?></p>
                            <hr class="my-4">
                        </div>
                    <?php endif; ?>

                    <div class="elegant-post__content ck-content">
                        <?= $post['content'] // CKEditor content is already sanitized ?>
                    </div>
                </article>

                <!-- Comments Section -->
                <section class="elegant-comments" id="comments">
                    <h3 class="elegant-comments__title">
                        Comments <?php if ($comments): ?><span class="badge bg-secondary"><?= count($comments) ?></span><?php endif; ?>
                    </h3>

                    <!-- Display existing comments -->
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="elegant-comment">
                                <div class="elegant-comment__meta">
                                    <strong><?= htmlspecialchars($comment['comment_author']); ?></strong>
                                    <span class="mx-2">•</span>
                                    <span><?= $comment['formatted_date'] ?></span>
                                </div>
                                <div class="elegant-comment__content">
                                    <?= nl2br(htmlspecialchars($comment['comment_content'])); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="elegant-comments__none">No comments yet. Be the first to comment!</p>
                    <?php endif; ?>

                    <!-- Comment Form -->
                    <form action="post?p_id=<?= $post['post_id']; ?>#comments" method="POST" class="elegant-comment-form">
                        <input type="hidden" name="submit_comment" value="1">
                        <div class="form-group mb-3">
                            <label for="comment_author" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="comment_author" name="comment_author" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="comment_content" class="form-label">Comment:</label>
                            <textarea class="form-control" id="comment_content" name="comment_content" rows="4"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn-custom2">Post Comment</button>
                    </form>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger mt-3">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>
                </section>
            <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <?php require "partials/sidebar.php"; ?>
        </div>
    </div>
</div>

<?php require "partials/footer.php"; ?>
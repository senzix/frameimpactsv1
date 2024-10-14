<?php require "partials/header.php"; ?>
<?php require "partials/banner.php"; ?>

<div class="container post-page">
    <div class="row">
        <!-- Main Content Column -->
        <div class="col-lg-8">
            <?php if (isset($post)): ?>
                <article class="elegant-post">
                    <header class="elegant-post__header">
                        <h1 class="elegant-post__title"><?= htmlspecialchars($post['title']); ?></h1>
                        <p class="elegant-post__meta">
                            <i class="fas fa-feather-alt"></i> Posted on
                            <?= (new DateTime($post['created_at']))->format('F j, Y') ?>
                        </p>
                    </header>
                    <div class="elegant-post__image-container">
                        <img class="elegant-post__image" src="<?= 'img/upload/' . $post['image_path'] ?>" alt="Post Image">
                    </div>
                    <div class="elegant-post__content">
                        <p><?= nl2br(htmlspecialchars($post['content'])); ?></p>
                    </div>
                </article>

                <!-- Comments Section -->
                <section class="elegant-comments">
                    <h3 class="elegant-comments__title">Comments</h3>

                    <!-- Display existing comments -->
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="elegant-comment">
                                <p class="elegant-comment__meta">
                                    <strong><?= htmlspecialchars($comment['comment_author']); ?></strong> on
                                    <?= (new DateTime($comment['created_at']))->format('F j, Y') ?></p>
                                <p class="elegant-comment__content"><?= nl2br(htmlspecialchars($comment['comment_content'])); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="elegant-comments__none">No comments yet. Be the first to comment!</p>
                    <?php endif; ?>

                    <!-- Comment submission form -->
                    <form action="post?p_id=<?= $post['post_id']; ?>" method="POST" class="elegant-comment-form">
                        <input type="hidden" name="submit_comment" value="1">
                        <div class="form-group">
                            <label for="comment_author">Name:</label>
                            <input type="text" class="form-control" id="comment_author" name="comment_author" required>
                        </div>
                        <div class="form-group">
                            <label for="comment_content">Comment:</label>
                            <textarea class="form-control" id="comment_content" name="comment_content" rows="3"
                                required style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                    <?php if (isset($error)): ?>
                        <p class="text-danger"><?= $error ?></p>
                    <?php endif; ?>
                </section>

                <!-- ... rest of the code ... -->
            <?php else: ?>
                <div class="alert alert-danger">
                    <strong>Error:</strong> Post not found.
                </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-lg-4">
            <?php require "partials/sidebar.php"; ?>
        </div>
    </div>
</div>


<?php require "partials/footer.php"; ?>
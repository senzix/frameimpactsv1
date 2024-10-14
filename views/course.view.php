<?php require "views/partials/header.php" ?>

<div class="course-container">
    <h1><?= htmlspecialchars($course['title']) ?></h1>
    <p class="course-description"><?= htmlspecialchars($course['description']) ?></p>

    <?php if ($course['video_url']): ?>
        <div class="video-container">
            <video controls>
                <source src="<?= htmlspecialchars($course['video_url']) ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    <?php elseif ($course['image_path']): ?>
        <div class="image-container">
            <img src="<?= htmlspecialchars($course['image_path']) ?>" alt="Course Image">
        </div>
    <?php endif; ?>

    <div class="course-content">
        <!-- Add more course content here -->
    </div>
    <div class="comments-section">
        <h2>Comments</h2>
        <?php if (isset($_SESSION['user_id'])): ?>
            <form class="comment-form" action="/classroom?id=<?= $course['course_id'] ?>" method="POST">
                <textarea name="comment" placeholder="Add your comment..." required></textarea>
                <button type="submit">Post Comment</button>
            </form>
        <?php else: ?>
            <p>Please <a href="/login">log in</a> to leave a comment.</p>
        <?php endif; ?>

        <div class="comments-list">
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <div class="comment-header">
                        <span class="comment-author"><?= htmlspecialchars($comment['username']) ?></span>
                        <span class="comment-date"><?= date('M d, Y', strtotime($comment['created_at'])) ?></span>
                    </div>
                    <p class="comment-content"><?= htmlspecialchars($comment['content']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
</div>

<style>
    .course-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #2c3e50;
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .course-description {
        font-size: 1.1rem;
        color: #34495e;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .video-container,
    .image-container {
        margin-bottom: 2rem;
    }

    video,
    img {
        width: 100%;
        border-radius: 4px;
    }

    .course-content {
        margin-bottom: 2rem;
    }

    .comments-section {
        background-color: #ffffff;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .comments-section h2 {
        color: #2c3e50;
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .comment-form textarea {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        resize: vertical;
        min-height: 100px;
    }

    .comment-form button {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 0.5rem;
        transition: background-color 0.3s ease;
    }

    .comment-form button:hover {
        background-color: #2980b9;
    }

    .comments-list {
        margin-top: 2rem;
    }

    .comment {
        background-color: #f1f3f5;
        padding: 1rem;
        border-radius: 4px;
        margin-bottom: 1rem;
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
    }

    .comment-author {
        font-weight: bold;
        color: #2c3e50;
    }

    .comment-date {
        color: #7f8c8d;
        font-size: 0.9rem;
    }

    .comment-content {
        color: #34495e;
        line-height: 1.4;
    }
</style>

<?php require "views/partials/footer.php" ?>
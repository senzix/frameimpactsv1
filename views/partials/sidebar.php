
<div class="news-sidebar">
    <div class="search-widget">
        <form action="search.php" method="get">
            <input type="text" name="query" placeholder="Search ..." class="search-input">
            <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="tags-widget">
        <h3>Recent Posts</h3>
        <div class="tags-list">
        <?php foreach ($recent_posts as $recent_post): ?>
            
            <a href="post?p_id=<?= $recent_post['post_id'] ?>" class="tag">
                <?= htmlspecialchars($recent_post['title']) ?>
            </a>
        
    <?php endforeach; ?>
        </div>
    </div>
</div>
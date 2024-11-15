<div class="news-sidebar">
    <div class="search-widget">
        <?php
        // Search logic
        $search_query = isset($_GET['query']) ? trim($_GET['query']) : '';
        if ($search_query) {
            $search_results = $db->query('
                SELECT post_id, title 
                FROM blogs 
                WHERE is_draft = 0 
                AND (title LIKE ? OR content LIKE ? OR excerpt LIKE ?)
                ORDER BY created_at DESC 
                LIMIT 5', 
                ['%' . $search_query . '%', '%' . $search_query . '%', '%' . $search_query . '%']
            )->fetchAll();
        }
        ?>

        <form action="" method="get">
            <input type="text" 
                   name="query" 
                   placeholder="Search ..." 
                   class="search-input"
                   value="<?= htmlspecialchars($search_query) ?>">
            <button type="submit" class="search-button">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <?php if (isset($search_results) && !empty($search_results)): ?>
            <div class="search-results mt-3">
                <h4>Search Results</h4>
                <div class="tags-list">
                    <?php foreach ($search_results as $result): ?>
                        <a href="post?p_id=<?= $result['post_id'] ?>" class="tag">
                            <?= htmlspecialchars($result['title']) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
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

<style>
.search-results {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 8px;
    margin-top: 1rem;
}

.search-results h4 {
    font-size: 1rem;
    color: #333;
    margin-bottom: 0.8rem;
}

.search-results .tags-list {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.search-results .tag {
    background: white;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}
</style>
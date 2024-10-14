<?php


$industries = getIndustryData();

require "partials/header.php"
    ?>
<div class="industries-page">
    <?php require "partials/banner.php" ?>
    <div class="industry-container">
        <p class="page-subtitle mt-3">We draw on deep industry knowledge to help organizations navigate their unique
            challenges and achieve sustained growth. With a forward-thinking approach and a robust IT backbone, our
            consultants deliver innovative, actionable strategies tailored to your business needs.</p>


        <div class="industries-grid">
            <div class="industries-list">
                <?php foreach ($industries as $key => $industry): ?>
                    <div class="industry-item" data-industry="<?= $key ?>">
                        <?= $industry['name'] ?>
                        <span class="arrow">›</span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php foreach ($industries as $key => $industry): ?>
        <div class="industry-detail" id="<?= $key ?>">
            <div class="industry-container">
                <h2><?= $industry['name'] ?></h2>
                <p><?= $industry['description'] ?></p>
                <a href="/industry?p_id=<?= $key ?>" class="visit-page">VISIT PAGE</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php require "partials/banner2.php"; ?>
<?php require "partials/footer.php"; ?>
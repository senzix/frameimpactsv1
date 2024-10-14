<?php require "partials/header.php"?>
<?php require "partials/banner.php"?>
<section class="team-section py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="mb-3">Our Professional Team</h2>
            <p class="text-muted">Meet the dedicated individuals behind our success</p>
        </div>
        <div class="team-grid">
            <?php foreach ($team_members as $member) : ?>
                <div class="team-member">
                    <div class="member-photo">
                        <img src="img/<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>">
                    </div>
                    <div class="member-info">
                        <h3><?php echo $member['name']; ?></h3>
                        <p class="position"><?php echo $member['position']; ?></p>
                        <p class="description"><?php echo $member['description']; ?></p>
                        <div class="social-links">
                            <?php foreach ($member['social'] as $social) : ?>
                                <a href="#" class="social-icon"><i class="fab fa-<?php echo $social; ?>"></i></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require "partials/banner2.php"?>
<?php require "partials/footer.php"?>
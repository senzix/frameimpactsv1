<?php require "partials/header.php" ?>
<?php require "partials/banner.php" ?>
<div class="container-fluid bg-light py-5">

    <div class="container">
        <!-- Header -->
        <h1 class="text-center mb-5 fw-bold">Get in Touch</h1>

        <div class="row g-5">
            <!-- Contact Information -->
            <div class="col-lg-4 col-md-6">
                <div class="bg-white rounded shadow-sm p-4 h-100">
                    <h3 class="mb-4">Contact Information</h3>
                    <ul class="list-unstyled">
                        <h5>Locations:</h5>
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                            Frame Impacts
                            Ground Floor, Glory Abode, Nongrah, Near Asha Bhava
                            Shillong, Meghalaya - 793006 INDIA

                        </li>
                        <li class="mb-3">

                            <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                            Frame Impacts
                            2nd Floor, Frame Impacts Office
                            Jamsuan Road, Elim Veng, New Lamka
                            Churachandpur, Manipur - 795128 INDIA

                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone me-2 text-primary"></i>
                            +91 7005223226
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-envelope me-2 text-primary"></i>
                            info@frameimpacts.com
                        </li>
                    </ul>
                    <div class="contactsocials mt-4">
                        <ul>
                            <li>
                                <a class="instagram"
                                    href="https://www.instagram.com/frame_impacts?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                                    target="_blank">
                                    <i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=61563545922308&mibextid=ZbWKwL"
                                    target="_blank" class="social-facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/frameimpacts" target="_blank" class="linkedin-in">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-8 col-md-6">
                <div class="bg-white rounded shadow-sm p-4">
                    <h3 class="mb-4">Send Us a Message</h3>

                    <!-- Display success or error message -->
                    <?php if (!empty($successMessage)): ?>
                        <div class="alert alert-success">
                            <?= $successMessage ?>
                        </div>
                    <?php elseif (!empty($errorMessage)): ?>
                        <div class="alert alert-danger">
                            <?= $errorMessage ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" class="form-control" id="email" name="mail" required>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required
                                    style="resize: none;"></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn-custom" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Map -->
        <div class="mt-5">
            <h3 class="text-center mb-4">Our Location</h3>
            <div class="ratio ratio-21x9">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227.2111845620916!2d93.69610476745913!3d24.33328880000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x374eb253a3707877%3A0x172372be25c32d0!2s8MMW%2B8GC%2C%20Jamsuan%20Rd%2C%20Elim%20Veng%2C%20New%20Lamka%2C%20Churachandpur%2C%20Manipur%20795128!5e0!3m2!1sen!2sin!4v1724498140145!5m2!1sen!2sin"
                    class="rounded" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
<?php require "partials/banner2.php" ?>
<?php require "partials/footer.php" ?>
<?php require "partials/header.php" ?>

<div class="slider-section">
  <!-- revolution slider -->
  <section class="no-top no-bottom" aria-label="section-slider">
    <!-- home -->
    <div class="fullwidthbanner-container">
      <div id="revolution-slider-half">
        <ul>
          <?php foreach ($sliderItems as $item): ?>
            <li data-transition="fade" data-slotamount="10" data-masterspeed="1200" data-delay="5000">
              <!-- Added background image with overlay -->
              <div class="slider-overlay"></div>
              <img src="<?= $item['image'] ?>" alt="<?= $item['heading'] ?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
              <div class="tp-caption slide-big-heading sft" data-x="center" data-y="160" data-speed="800" data-start="400"
                data-easing="easeInOutExpo" data-endspeed="450"><span style="color:#ffffff">
                  <?= $item['heading'] ?></span>
              </div>

              <div class="tp-caption btn-slider sfb" data-x="center" data-y="300" data-speed="400" data-start="800"
                data-easing="easeInOutExpo">
                <span class="shine"></span><a href="<?= $item['buttonLink'] ?>"><?= $item['buttonText'] ?></a>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
        <div class="tp-bannertimer hide"></div>
      </div>
    </div>
    <!-- home end -->
  </section>
  <!-- revolution slider end -->
</div>

<section class="service what-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="about-info sec-padd text-center mb-5">
          <div class="section-title">
            <h2>Comprehensive Services</h2>
          </div>
        </div>
      </div>
      <?php foreach ($services as $service): ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="we-do-item">
            <div class="we-icon">
              <i class="<?= $service['icon'] ?>"></i>
            </div>
            <div class="we-desc">
              <h4 class="we-title"><?= $service['title'] ?></h4>
              <p><?= $service['description'] ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="about-faq sec-padd py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-12 col-xs-12 mt-4">
        <div class="about-info">
          <h2>About Us
          </h2>
          <br>
          <div class="text">
            <p>At Frame Impacts Pvt. Ltd., we partner with our clients to tackle their most pressing strategic
              challenges. Drawing on our extensive industry knowledge and analytical expertise, we help organizations
              make informed decisions swiftly and effectively address their most critical business issues.<BR><BR>

              Founded in 2023 by a team of experienced professionals, we are committed to empowering organizations
              across Northeast India and beyond. Our diverse team combines local insights with global best practices to
              provide tailored consulting services that drive sustainable growth and meaningful impact.</p>

          </div>

          <div class="link_btn">
            <a href="/aboutus" class="thm-btn">know more <i class="vc_btn3-icon fas fa-chevron-right"></i></a>
            <!--<div class="sign"><img src="images/resource/sign.jpg" alt=""></div>-->
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12 mt-4">
      <h2>FAQs
          </h2>
        <div id="main">
          <div class="accordion" id="faq">
            <div class="card">
              <div class="card-header" id="faqhead1">
                <a href="#" class="btn-header-link text-wrap collapsed" data-toggle="collapse" data-target="#faq1"
                  aria-expanded="true" aria-controls="faq1">What services does Frame Impacts offer?</a>
              </div>

              <div id="faq1" class="collapse" aria-labelledby="faqhead1" data-parent="#faq">
                <div class="card-body">
                  We provide a diverse range of consulting services designed to empower organizations across various sectors. Our expertise encompasses Business Management Consulting, Health Management Consulting, and Social Impact Management Consulting. Our focus is on optimizing operations, enhancing organizational impact, and driving sustainable growth for our clients.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="faqhead2">
                <a href="#" class=" btn-header-link text-wrap collapsed" data-toggle="collapse" data-target="#faq2"
                  aria-expanded="true" aria-controls="faq2">Who can benefit from our consulting services?</a>
              </div>

              <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                <div class="card-body">
                  Our consulting services are tailored for a wide array of organizations, including startups, established businesses, healthcare providers, and non-profits. Regardless of your industry, whether you're seeking to scale operations, improve service delivery, or develop effective strategies for social impact, we are equipped to support your journey.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="faqhead3">
                <a href="#" class=" btn-header-link text-wrap collapsed" data-toggle="collapse" data-target="#faq3"
                  aria-expanded="true" aria-controls="faq3">How does Frame Impacts ensure the effectiveness of its consulting services?</a>
              </div>

              <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                <div class="card-body">
                  We utilize a holistic and integrated approach to consulting that emphasizes collaboration, transparency, and accountability. By aligning our strategies with your organization's unique needs and goals, we ensure that our initiatives are impactful and yield tangible results.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="faqhead4">
                <a href="#" class=" btn-header-link text-wrap collapsed" data-toggle="collapse" data-target="#faq4"
                  aria-expanded="true" aria-controls="faq4">Can you customize your services to meet our specific needs?</a>
              </div>

              <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">
                <div class="card-body">
                  Absolutely! We understand that each organization faces unique challenges and objectives. Our collaborative approach allows us to customize our consulting services to create practical and relevant solutions that address your specific requirements and promote organizational growth.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="faqhead5">
                <a href="#" class=" btn-header-link text-wrap collapsed" data-toggle="collapse" data-target="#faq5"
                  aria-expanded="true" aria-controls="faq5">How can we easily get in touch with Frame Impacts for a consultation?</a>
              </div>

              <div id="faq5" class="collapse" aria-labelledby="faqhead5" data-parent="#faq">
                <div class="card-body">
                  We welcome inquiries and discussions about how we can assist you. You can contact us via email at info@frameimpacts.com or call us at +91 7005223226. Our team is ready to explore your needs and provide insights on how we can help you achieve your goals.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="faqhead6">
                <a href="#" class=" btn-header-link text-wrap collapsed" data-toggle="collapse" data-target="#faq6"
                  aria-expanded="true" aria-controls="faq6">Where is Frame Impacts located?</a>
              </div>

              <div id="faq6" class="collapse" aria-labelledby="faqhead6" data-parent="#faq">
                <div class="card-body">
                  Frame Impacts operates from offices in Shillong and Lamka, enabling us to effectively serve clients throughout Northeast India. Our local presence allows us to connect deeply with the communities we work with and understand the regional landscape.
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<?php if (!empty($recentPosts)): ?>
  <section class="blog">
    <div class="container-fluid">
      <div class="row p-3-vh">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="about-info sec-padd text-center mb-5">
            <div class="section-title">
              <h2>Recent Articles</h2>
            </div>
          </div>
        </div>
        <?php foreach ($recentPosts as $post): ?>
          <div class="col-md-3 wow-outer">
            <div class="blogcolumn wow slideInRight" data-wow-delay=".<?= ($index + 1) * 2 ?>s">
              <div class="imgtop">
                <a href="/post?p_id=<?= $post['post_id'] ?>"><img
                    src="<?= 'img/upload/' . htmlspecialchars($post['image_path']) ?>" alt=""
                    class="w-gallery-image img-fluid"></a>
                <span class="tag">
                  <?= (new DateTime($post['created_at']))->format('F j, Y g:i A') ?>
                </span>
              </div>
              <div class="blogcont">
                <div class="headingblog">
                  <h4><a href="/post?p_id=<?= $post['post_id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h4>
                </div>
                <div class="content-preview">
                  <p><a
                      href="/post?p_id=<?= $post['post_id'] ?>"><?= htmlspecialchars(substr($post['content'], 0, 100)) . '...' ?></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
  </div>
</section>
<?php require "partials/banner2.php" ?>
<?php require "partials/footer.php" ?>

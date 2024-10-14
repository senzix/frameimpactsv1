<footer id="footer" class="footer">
  <div class="parallax-bg">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 col-md-7">
          <h2 class="footer-heading">Discover Frame Impacts' most compelling thought leadership on the issues shaping the future of business and society.</h2>
        </div>
        <div class="col-lg-4 col-md-5">
          <form class="footer-subscribe-form" id="newsletterForm">
            <input type="email" name="newsletter_email" placeholder="Enter Email" required>&nbsp;&nbsp;
            <button type="submit" class="btn-subscribe">SUBSCRIBE</button>
          </form>
          <div id="newsletterMessage" class="mt-2" style="display: none;"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-md-auto">
          <div class="footer-social">
            <span style="color:#e49928">FOLLOW US</span>
            <a href="https://www.linkedin.com/in/frameimpacts" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.facebook.com/profile.php?id=61563545922308&mibextid=ZbWKwL" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/frame_impacts?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="#" target="_blank"><i class="fab fa-tiktok"></i></a>
          </div>
        </div>
        <div class="col-md-auto">
          <div class="footer-language">
            <span style="color:#e49928">Global | EN</span>
            <i class="fas fa-chevron-down"></i>
          </div>
        </div>
      </div>
      <div class="footer-links">
        <p>&copy; 2024 Frame Impacts Private Limited | All rights reserved. |
          <a href="#">Careers</a> |
          <a href="contact">Contact</a> |
          <a href="our-team">Our Teams</a> |
          <a href="articles">Articles</a> |
          <a href="aboutus">About Us</a> |
          <a href="#">Offices</a> |
          <a href="#">Privacy Policy</a> |
          <a href="#">Terms of Use</a> |
          <a href="#">Sitemap</a> |
          <a href="#">Responsible Disclosure</a>
        </p>
      </div>
      <div class="footer-copyright">
        <p>Frameimpacts is a leading consultancy firm driving innovation and growth across industries. We provide
          strategic insights and tailored solutions to help organizations overcome challenges and achieve success. With
          our client-centric approach, we deliver measurable results for startups and established enterprises alike,
          serving as your trusted partner in realizing your full potential.</p>
      </div>
    </div>
  </div>

  <!-- Cookie Consent Banner -->
  <?php if (!isset($_COOKIE['cookie_consent'])): ?>
  <div id="cookie-consent-banner" style="position: fixed; bottom: 0; width: 100%; background-color: #f1f1f1; padding: 10px; text-align: center; z-index: 1000;">
    <p>This website uses cookies to enhance your experience. By continuing to use this site, you agree to our use of cookies.</p>
    <button onclick="acceptCookies()">Accept</button>
    <button onclick="declineCookies()">Decline</button>
  </div>
  <?php endif; ?>

  <script>
  function acceptCookies() {
    // Set cookie with a longer expiration (e.g., 30 days)
    document.cookie = "cookie_consent=accepted; max-age=" + (30 * 24 * 60 * 60) + "; path=/; SameSite=Lax";
    document.getElementById('cookie-consent-banner').style.display = 'none';
  }

  function declineCookies() {
    // Set a "declined" cookie with a shorter expiration (e.g., 1 day)
    document.cookie = "cookie_consent=declined; max-age=" + (24 * 60 * 60) + "; path=/; SameSite=Lax";
    document.getElementById('cookie-consent-banner').style.display = 'none';
  }

  // Check and show the banner on page load if no decision has been made
  window.onload = function() {
    if (document.cookie.indexOf('cookie_consent=') === -1) {
      document.getElementById('cookie-consent-banner').style.display = 'block';
    } else {
      document.getElementById('cookie-consent-banner').style.display = 'none';
    }
  }

  // Function to check if a cookie exists
  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
  }

  // Check for cookie consent on every page load
  if (getCookie('cookie_consent') === 'accepted' || getCookie('cookie_consent') === 'declined') {
    document.getElementById('cookie-consent-banner').style.display = 'none';
  }
  </script>
</footer>
<!-- Structured Data for SEO -->
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "Frame Impacts",
  "url": "https://www.frameimpacts.com",
  "logo": "https://www.frameimpacts.com/img/logo.png",
  "sameAs": [
    "https://www.linkedin.com/in/frameimpacts",
    "https://www.facebook.com/profile.php?id=61563545922308",
    "https://www.instagram.com/frame_impacts"
  ],
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+91-7005223226",
    "contactType": "customer service"
  },
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Jamsuan Rd, Elim Veng, New Lamka",
    "addressLocality": "Churachandpur",
    "addressRegion": "Manipur",
    "postalCode": "795128",
    "addressCountry": "India"
  },
  "description": "Frame Impacts is a leading consultancy firm driving innovation and growth across industries in Northeast India. We provide strategic insights and tailored solutions to help organizations overcome challenges and achieve success."
}
</script>

<!-- Lazy Loading Script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
  var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

  if ("IntersectionObserver" in window) {
    let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          let lazyImage = entry.target;
          lazyImage.src = lazyImage.dataset.src;
          lazyImage.classList.remove("lazy");
          lazyImageObserver.unobserve(lazyImage);
        }
      });
    });

    lazyImages.forEach(function(lazyImage) {
      lazyImageObserver.observe(lazyImage);
    });
  }
});
</script><a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: block;">
  <i class="fas fa-long-arrow-alt-up"></i></a>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/wow.min.js"></script>



<script type="text/javascript" src="js/rev-slider/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/rev-slider/jquery.themepunch.tools.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>

<script type="text/javascript" src="js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>

<!-- toggle password -->
<script>
  document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
  });
  // confrim password

  function togglePasswordVisibility(passwordFieldId, toggleIconId) {
    const passwordField = document.getElementById(passwordFieldId);
    const toggleIcon = document.getElementById(toggleIconId);
    if (passwordField.type === "password") {
      passwordField.type = "text";
      toggleIcon.classList.remove("fa-eye");
      toggleIcon.classList.add("fa-eye-slash");
    } else {
      passwordField.type = "password";
      toggleIcon.classList.remove("fa-eye-slash");
      toggleIcon.classList.add("fa-eye");
    }
  }

</script>
<!-- newsletter subscription -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('newsletterForm');
    const messageDiv = document.getElementById('newsletterMessage');

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      fetch('/newsletter-subscribe', {
        method: 'POST',
        body: new FormData(this),
      })
        .then(response => response.json())
        .then(data => {
          messageDiv.textContent = data.message;
          messageDiv.className = `alert ${data.messageClass}`;
          messageDiv.style.display = 'block';

          if (data.messageClass === 'alert-success') {
            form.reset();
          }
        })
        .catch(error => {
          console.error('Error:', error);
          messageDiv.textContent = 'An error occurred. Please try again later.';
          messageDiv.className = 'alert alert-danger';
          messageDiv.style.display = 'block';
        });
    });
  });
</script>

<!-- for industry  -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const industryItems = document.querySelectorAll('.industry-item');
    const industryDetails = document.querySelectorAll('.industry-detail');
    const scrollOffset = 200; // Adjust this value as needed

    function scrollToElement(element) {
      setTimeout(() => {
        const rect = element.getBoundingClientRect();
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const targetPosition = rect.top + scrollTop - scrollOffset;

        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }, 100); // Small delay to ensure content is rendered
    }

    industryItems.forEach(item => {
      item.addEventListener('click', function () {
        const industryId = this.getAttribute('data-industry');

        industryItems.forEach(i => i.classList.remove('active'));
        this.classList.add('active');

        industryDetails.forEach(detail => {
          if (detail.id === industryId) {
            detail.style.display = 'block';
            scrollToElement(detail);
          } else {
            detail.style.display = 'none';
          }
        });
      });
    });

    // Hide all industry details by default
    industryDetails.forEach(detail => {
      detail.style.display = 'none';
    });
  });
</script>

<script>
  $(document).ready(function ($) {
    var $element = $('.counter');
    if ($element.length > 0) {
      $element.counterUp({
        delay: 10,
        time: 1000
      });
    }
  });
</script>

<script>
  $('.testimonial-slider').slick({
    slidesToShow: 3,
    dots: false,
    arrows: true,
    autoplay: false,
    autoplaySpeed: 3000,
    prevArrow: '<i class="fas fa-chevron-left prev"></i>',
    nextArrow: '<i class="fas fa-chevron-right next"></i>',
    swipe: true,
    swipeToSlide: true,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        // centerMode: true,
      }
    }, {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: false,
        infinite: true,

      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
      }
    }]


  });

</script>

<script>
  $('.client-slider').slick({
    slidesToShow: 6,
    dots: false,
    arrows: true,
    autoplay: false,
    autoplaySpeed: 3000,
    prevArrow: '<i class="fas fa-chevron-left prev"></i>',
    nextArrow: '<i class="fas fa-chevron-right next"></i>',
    swipe: true,
    swipeToSlide: true,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        // centerMode: true,
      }
    }, {
      breakpoint: 800,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2,
        dots: false,
        infinite: true,

      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
      }
    }]


  });

</script>

<script>
  $('.project-slider').slick({
    slidesToShow: 4,
    dots: false,
    arrows: true,
    autoplay: false,
    autoplaySpeed: 3000,
    prevArrow: '<i class="fas fa-chevron-left prev"></i>',
    nextArrow: '<i class="fas fa-chevron-right next"></i>',
    swipe: true,
    swipeToSlide: true,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        // centerMode: true,
      }
    }, {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: false,
        infinite: true,

      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
      }
    }]


  });

</script>




<script src="js/wow.min.js"></script>
<script>
  new WOW().init();
</script>



<script>
  $('.blog-slider').slick({
    speed: 500,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        // centerMode: true,
      }
    }, {
      breakpoint: 800,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 2,
        dots: false,
        infinite: true,

      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
      }
    }]
  });
</script>





<script>
  $(document).ready(function () {
    $(window).scroll(function () {//scroll--top---indicator---arrow-jquery----//
      if ($(window).scrollTop() > 600) {//---position---600----px scroll-----//
        $("#scrollUp").fadeIn();
      }
      else {
        $("#scrollUp").css("display", "none");
      }
    });
  });

</script>




<script>
  $(document).ready(function () {
    $(window).scroll(function () {
      if ($(window).scrollTop() < 90) { //-navbar-----scrolltop---fixed---jquery--/
        $('#navigation').removeClass('navbar-scroll');
      }
      else {
        $('#navigation').addClass('navbar-scroll');
      }
    });

  });

</script>






<script type="text/javascript">
  jQuery(document).ready(function () {
    // revolution slider
    var revapi;
    revapi = jQuery('#revolution-slider-half')
      .revolution({
        delay: 9000,
        startwidth: 1170,
        startheight: 570,
        onHoverStop: "on",
        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 3,
        touchenabled: "on",
        stopAtSlide: -1,
        stopAfterLoops: -1,
        touchenabled: "on",
        navigationType: "none",
        navigationArrows: "solo",
        navigationStyle: "preview1",
        touchenabled: "on",
        onHoverStop: "on",
        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,
        keyboardNavigation: "on",
        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 0,
        navigationVOffset: 20,
        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,
        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,
        dottedOverlay: "",
        fullWidth: "on",
        stopAfterLoops: 0,
        stopAtSlide: 1,
        shadow: 0
      });

    revapi = jQuery('#revolution-slider-full')
      .revolution({
        delay: 9000,
        startwidth: 960,
        startheight: 630,
        onHoverStop: "on",
        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 3,
        touchenabled: "on",
        stopAtSlide: -1,
        stopAfterLoops: -1,
        touchenabled: "on",
        navigationType: "none",
        navigationArrows: "solo",
        navigationStyle: "preview1",
        touchenabled: "on",
        onHoverStop: "on",
        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,
        keyboardNavigation: "on",
        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 0,
        navigationVOffset: 20,
        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,
        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,
        dottedOverlay: "",
        fullWidth: "on",
        fullScreen: "on",
        stopAfterLoops: 0,
        stopAtSlide: 1,
        shadow: 0
      });

    // revolution slider ver 2
    var revext = jQuery;
    var revapi;
    revext(document).ready(function () {
      if (revext("#rev-commerce").revolution == undefined) {
        revslider_showDoubleJqueryError("#rev-commerce");
      } else {
        revapi = revext("#rev-commerce").show().revolution({
          sliderType: "standard",
          jsFileLocation: "revolution/js/",
          sliderLayout: "auto",
          dottedOverlay: "none",
          delay: 9000,
          navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            mouseScrollReverse: "default",
            onHoverStop: "on",
            touch: {
              touchenabled: "on",
              swipe_threshold: 75,
              swipe_min_touches: 50,
              swipe_direction: "horizontal",
              drag_block_vertical: false
            }
            ,
            arrows: {
              style: "gyges",
              enable: true,
              hide_onmobile: false,
              hide_onleave: false,
              tmp: '',
              left: {
                h_align: "right",
                v_align: "bottom",
                h_offset: 160,
                v_offset: 0
              },
              right: {
                h_align: "right",
                v_align: "bottom",
                h_offset: 80,
                v_offset: 0
              }
            }
          },
          responsiveLevels: [1240, 1024, 778, 480],
          visibilityLevels: [1240, 1024, 778, 480],
          gridwidth: [1200, 1024, 778, 480],
          gridheight: [600, 600, 600, 600],
          lazyType: "single",
          parallax: {
            type: "scroll",
            origo: "slidercenter",
            speed: 400,
            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
            type: "scroll",
          },
          shadow: 0,
          spinner: "off",
          stopLoop: "off",
          stopAfterLoops: -1,
          stopAtSlide: -1,
          shuffle: "off",
          autoHeight: "off",
          disableProgressBar: "on",
          hideThumbsOnMobile: "off",
          hideSliderAtLimit: 0,
          hideCaptionAtLimit: 0,
          hideAllCaptionAtLilmit: 0,
          debugMode: false,
          fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false,
          }
        });
      }
    });

  });
</script>
</body>

</html>
</html>
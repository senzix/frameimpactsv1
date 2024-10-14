<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="img/logo.ico" type="image/ico" rel="icon">
    
    <title>Frameimpacts - Expert Consultancy Services in Northeast India</title>
    <meta name="description" content="Frameimpacts offers expert consultancy services across the Northeast region of India, specializing in capacity building, business solutions, and strategic development.">
    <meta name="keywords" content="consultancy, Northeast India, capacity building, business solutions, strategic development">
    
    <meta property="og:title" content="Frameimpacts - Expert Consultancy Services">
    <meta property="og:description" content="Offering professional consultancy services in capacity building and business solutions across Northeast India.">
    <meta property="og:url" content="https://www.frameimpacts.com">
    <meta property="og:image" content="https://www.frameimpacts.com/img/logo.png">
    <meta property="og:type" content="website">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Frameimpacts - Expert Consultancy Services">
    <meta name="twitter:description" content="Offering professional consultancy services in capacity building and business solutions across Northeast India.">
    <meta name="twitter:image" content="https://www.frameimpacts.com/img/logo.png">
    
    <link rel="canonical" href="https://www.frameimpacts.com">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!----css3---->
	<link rel="stylesheet" href="css/custom.css">

	<link rel="stylesheet" href="font/flaticon.css">
	<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&family=Chivo:wght@300;400;700&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Fira+Sans:wght@300;400;500;600;700&family=Merriweather:wght@300;400;700&family=Montserrat:wght@300;400;500;600;700&family=Open+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Raleway:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<!--fontawesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="css/animate.min.css">
</head>

<body>
	<div class="header" id="header">
		<div class="navigation" id="navigation">
			<div class="header-inner" id="header-inner">
				<nav class="navbar navbar-expand-lg my-navbar p-0">
					<a class="navbar-brand ml-2" href="/"><img src="img/logo.svg" alt="Logo" /></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>

					<div class="collapse navbar-collapse mobile-nav" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto mx-auto ">
							<li class="nav-item active">
								<a class="nav-link mr-3" href="/">Home</a>
							</li>
							<li class="nav-item mr-2">
								<a class="nav-link" href="/aboutus">About Us</a>
							</li>
							<li class="nav-item dropdown mr-3">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Services</a>
								<ul class="dropdown-menu small-menu">
									<a href="/industry">Industry</a>
									<a href="/proneurship">Proneurship Program</a>
									<a href="/psychometric-test">Psychometric</a>
									<a href="/classroom">Classroom</a>

								</ul>
							</li>
							<li class="nav-item mr-2">
								<a class="nav-link" href="/articles">Articles</a>
							</li>
							<li class="nav-item mr-2">
								<a class="nav-link" href="/articles">Our Work</a>
							</li>
							<li class="nav-item mr-2">
								<a class="nav-link" href="/contact">Contact Us</a>
							</li>
							<li class="nav-item mr-2 d-lg-none">
								<?php if (isset($_SESSION['user_id'])) : ?>
									<a href="/logout" class="nav-link">Log out</a>
								<?php else : ?>
									<a href="/login" class="nav-link">Log in</a>
								<?php endif; ?>
							</li>
						</ul>
					</div>

                 <div class="login-button ml-3 d-none d-lg-block">
							<?php if (isset($_SESSION['user_id'])) : ?>
								<a href="/logout" class="header-log-btn">Log out</a>
							<?php else : ?>
								<a href="/login" class="header-log-btn">Login</a>
							<?php endif; ?>
						</div>
					<form class="form-inline my-2 my-lg-0 d-lg-block d-md-none d-none ml-5">
						<div class="header-social-icon xs-display-none d-lg-flex">
							<div class="widget widget_pofo_social_widget" id="pofo_social_widget-5">
								<div class="widget-title"></div>
								<div class="social-icon-style-8">
									<ul class="extra-small-icon d-flex">
										<li>
											<a class="instagram"
												href="https://www.instagram.com/frame_impacts?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
												target="_blank">
												<i class="fab fa-instagram"></i></a>
										</li>
										<li><a class="facebook-f"
												href="https://www.facebook.com/profile.php?id=61563545922308&mibextid=ZbWKwL"
												target="_blank">
												<i class="fab fa-facebook-f"></i></a></li>
										<li><a class="linkedin-in"
												href="https://www.linkedin.com/in/frameimpacts"
												target="_blank">
												<i class="fab fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</form>


			</div>
		</div>

	</div>
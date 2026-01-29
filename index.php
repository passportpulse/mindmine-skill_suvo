<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />



<?php include "include/head.php" ?>

<body>
	<!--Preloader-->
	<?php include('include/preloader.php'); ?>

	<!-- Offcanvas Area Start -->
	<div class="fix-area d-md-none">

		<div class="offcanvas__info">
			<div class="offcanvas__wrapper">
				<div class="offcanvas__content">
					<div class="offcanvas__top d-flex justify-content-between align-items-center">
						<div class="offcanvas__logo">
							<a href="index.html">
								<img src="assets/img/logo.svg" alt="Edplus">
							</a>
						</div>
						<div class="offcanvas__close">
							<button>
								<i class="fas fa-times"></i>
							</button>
						</div>
					</div>
					<div class="mobile-menu fix mb-3"> </div>
				</div>
			</div>
		</div>
	</div>
	<style>
		/* Overlay styles */
		.offcanvas__overlay {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			z-index: 99998;
			opacity: 0;
			visibility: hidden;
			transition: all 0.3s ease;
		}

		.offcanvas__overlay.overlay-open {
			opacity: 1;
			visibility: visible;
		}

		/* Offcanvas main styles */
		.offcanvas__info {
			background: var(--white) none repeat scroll 0 0;
			border-left: 2px solid var(--p2-clr);
			position: fixed;
			right: 0;
			top: 0;
			width: 400px;
			height: 100%;
			transform: translateX(100%);
			transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
			z-index: 99999;
			overflow-y: auto;
		}

		.offcanvas__info.info-open {
			transform: translateX(0);
			box-shadow: -5px 0 30px rgba(0, 0, 0, 0.1);
		}

		/* Close button styles */
		.offcanvas__close button {
			background: none;
			border: none;
			font-size: 24px;
			color: #333;
			cursor: pointer;
			padding: 5px;
			transition: color 0.3s ease;
			width: 44px;
			height: 44px;
			display: flex;
			align-items: center;
			justify-content: center;
			border-radius: 4px;
		}

		.offcanvas__close button:hover {
			color: var(--p2-clr);
			background: rgba(0, 0, 0, 0.05);
		}

		/* Mobile Menu Styling */
		.mobile-menu {
			width: 100%;
		}

		.mobile-menu__list {
			list-style: none;
			padding: 0;
			margin: 0;
		}

		.mobile-menu__item {
			position: relative;
			border-bottom: 1px solid rgba(0, 0, 0, 0.1);
		}

		.mobile-menu__item:last-child {
			border-bottom: none;
		}

		.mobile-menu__link {
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 14px 0;
			color: #333;
			text-decoration: none;
			font-size: 16px;
			font-weight: 500;
			transition: all 0.3s ease;
		}

		.mobile-menu__link:hover,
		.mobile-menu__link.active {
			color: var(--p2-clr);
			padding-left: 5px;
		}

		.mobile-menu__toggle {
			width: 30px;
			height: 30px;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			transition: transform 0.3s ease;
			color: #666;
		}

		.mobile-menu__item--open .mobile-menu__toggle {
			color: var(--p2-clr);
		}

		.mobile-menu__item--open .mobile-menu__toggle i {
			transform: rotate(180deg);
		}

		/* Submenu Styling */
		.mobile-menu__submenu {
			list-style: none;
			padding: 0;
			margin: 0;
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
			background: #f8f9fa;
			margin-left: 10px;
			border-radius: 0 0 6px 6px;
		}

		.mobile-menu__item--open .mobile-menu__submenu {
			max-height: 500px;
			padding: 10px 0;
		}

		.mobile-menu__submenu li {
			padding: 0;
			border-bottom: 1px solid rgba(0, 0, 0, 0.05);
		}

		.mobile-menu__submenu li:last-child {
			border-bottom: none;
		}

		.mobile-menu__submenu a {
			display: block;
			padding: 10px 20px;
			color: #666;
			text-decoration: none;
			font-size: 14px;
			transition: all 0.3s ease;
			border-left: 3px solid transparent;
		}

		.mobile-menu__submenu a:hover {
			color: var(--p2-clr);
			border-left-color: var(--p2-clr);
			background: rgba(var(--p2-clr-rgb, 0, 0, 0), 0.05);
			padding-left: 25px;
		}

		/* Offcanvas Top Section */
		.offcanvas__top {
			padding-bottom: 20px;
			border-bottom: 1px solid rgba(0, 0, 0, 0.1);
			margin-bottom: 25px;
		}

		.offcanvas__logo img {
			max-height: 40px;
			width: auto;
		}

		/* Fix the offcanvas layout */
		.offcanvas__content {
			padding: 30px;
			height: 100%;
			display: flex;
			flex-direction: column;
		}

		.offcanvas__wrapper {
			height: 100%;
			overflow-y: auto;
		}

		/* Fix the overall layout */
		.fix-area {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			pointer-events: none;
			z-index: 99997;
		}

		.offcanvas__info {
			pointer-events: auto;
		}

		/* Ensure proper vertical spacing */
		.offcanvas__content>* {
			margin-bottom: 25px;
		}

		.offcanvas__content>*:last-child {
			margin-bottom: 0;
		}

		/* Make sure content doesn't overflow */
		.offcanvas__wrapper {
			max-height: 100vh;
		}

		/* Body lock when sidebar is open */
		body.offcanvas-open {
			overflow: hidden;
		}

		/* Mobile Responsive Adjustments */
		@media (max-width: 768px) {
			.offcanvas__info {
				width: 320px;
				max-width: 85%;
			}

			.mobile-menu__link {
				padding: 16px 0;
				font-size: 17px;
			}

			.mobile-menu__submenu a {
				padding: 12px 20px;
				font-size: 15px;
			}

			.offcanvas__content {
				padding: 25px 20px;
			}
		}

		/* Adjust for very small screens */
		@media (max-width: 480px) {
			.offcanvas__info {
				width: 100%;
				max-width: 100%;
				border-left: none;
			}

			.offcanvas__content {
				padding: 20px 15px;
			}

			.mobile-menu__link {
				padding: 18px 0;
				font-size: 18px;
			}

			.mobile-menu__submenu a {
				padding: 14px 20px;
				font-size: 16px;
			}
		}

		/* Scrollbar styling */
		.offcanvas__wrapper::-webkit-scrollbar {
			width: 6px;
		}

		.offcanvas__wrapper::-webkit-scrollbar-track {
			background: #f1f1f1;
		}

		.offcanvas__wrapper::-webkit-scrollbar-thumb {
			background: #ccc;
			border-radius: 3px;
		}

		.offcanvas__wrapper::-webkit-scrollbar-thumb:hover {
			background: #aaa;
		}
	</style>
	<script>
		$(document).ready(function() {
			// Initialize mobile menu submenu toggle
			$('.mobile-menu__toggle').on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();

				const $parent = $(this).closest('.mobile-menu__item--has-children');
				const $submenu = $parent.find('.mobile-menu__submenu');
				const $icon = $(this).find('i');

				// Close other open submenus
				$('.mobile-menu__item--has-children').not($parent).removeClass('mobile-menu__item--open');
				$('.mobile-menu__submenu').not($submenu).css('max-height', 0);
				$('.mobile-menu__toggle i').not($icon).css('transform', 'rotate(0deg)');

				// Toggle current submenu
				if ($parent.hasClass('mobile-menu__item--open')) {
					$parent.removeClass('mobile-menu__item--open');
					$submenu.css('max-height', 0);
					$icon.css('transform', 'rotate(0deg)');
				} else {
					$parent.addClass('mobile-menu__item--open');
					$submenu.css('max-height', $submenu[0].scrollHeight + 'px');
					$icon.css('transform', 'rotate(180deg)');
				}
			});

			// Handle click on main menu links
			$('.mobile-menu__link').on('click', function(e) {
				// If it's a toggle link, don't prevent default
				if ($(this).find('.mobile-menu__toggle').length > 0) {
					return;
				}

				// Close sidebar when clicking on menu item (for mobile)
				closeOffcanvas();
			});

			// Close button handler
			$(".offcanvas__close").on("click", function(e) {
				e.stopPropagation();
				closeOffcanvas();
			});

			// Overlay click handler
			$(".offcanvas__overlay").on("click", function() {
				closeOffcanvas();
			});

			// Toggle button handler (assuming you have a button with class 'sidebar__toggle' somewhere)
			$(".sidebar__toggle").on("click", function(e) {
				e.preventDefault();
				e.stopPropagation();
				openOffcanvas();
			});

			// Close on escape key
			$(document).on("keydown", function(e) {
				if (e.key === "Escape" && $(".offcanvas__info").hasClass("info-open")) {
					closeOffcanvas();
				}
			});

			// Prevent clicks inside offcanvas from closing it
			$('.offcanvas__info').on('click', function(e) {
				e.stopPropagation();
			});

			// Open function
			function openOffcanvas() {
				$(".offcanvas__info").addClass("info-open");
				$(".offcanvas__overlay").addClass("overlay-open");
				$("body").addClass("offcanvas-open");
				// Prevent background scrolling
				$('html, body').css('overflow', 'hidden');
			}

			// Close function
			function closeOffcanvas() {
				$(".offcanvas__info").removeClass("info-open");
				$(".offcanvas__overlay").removeClass("overlay-open");
				$("body").removeClass("offcanvas-open");
				// Restore scrolling
				$('html, body').css('overflow', '');

				// Close all submenus when closing sidebar
				$('.mobile-menu__item--has-children').removeClass('mobile-menu__item--open');
				$('.mobile-menu__submenu').css('max-height', 0);
				$('.mobile-menu__toggle i').css('transform', 'rotate(0deg)');
			}

			// Auto close submenus on window resize
			$(window).on('resize', function() {
				if ($(window).width() > 768) {
					// Reset submenus on desktop
					$('.mobile-menu__item--has-children').removeClass('mobile-menu__item--open');
					$('.mobile-menu__submenu').css('max-height', '');
					$('.mobile-menu__toggle i').css('transform', '');
				}
			});

			// Close offcanvas when clicking outside on mobile
			$(document).on('click', function(e) {
				if ($(window).width() <= 768 &&
					$(".offcanvas__info").hasClass("info-open") &&
					!$(e.target).closest('.offcanvas__info').length &&
					!$(e.target).closest('.sidebar__toggle').length) {
					closeOffcanvas();
				}
			});
		});
	</script>


	<!-- Start Header -->
	<?php include('include/header.php'); ?>
	<!-- End Header -->



	<!-- Start Popup Search Box -->

	<!-- End Popup Search Box -->

	<!-- Start Home Banner -->
	<section class="home-banner banner-3" style="background-image: url(assets/img/bg/home-banner3.jpg);">
		<div class="container position-relative">
			<div class="row">
				<div class="col-xl-6 col-lg-7 col-12 align-self-center">
					<div class="banner_content">
						<span class="wow fadeInUp" data-wow-delay=".3s">
							<img src="assets/img/icons/graduation-hat-blue.svg" alt="">
							Admissions Open 2025–26
						</span>

						<h2 class="wow fadeInUp" data-wow-delay=".5s">
							Forging Leaders through <br>
							<mark style="background:none; color:var(--blue); padding:0;">
								Skill Education.
							</mark>
						</h2>


						<p class="wow fadeInUp" data-wow-delay=".7s"
							style="font-size:14px; line-height:1.5;">
							Maharaja Agrasain – Mindmine College is redefining higher education
							by bridging the gap between academic excellence and real-world
							industry demands through outcome-driven skill education.
						</p>

						<ul class="wow fadeInUp" data-wow-delay=".8s"
							style="list-style:none; padding:0; margin-bottom:20px;">
							<li style="font-size:13px; color:#4A3AFF; line-height:1.4; margin-bottom:6px;">
								✔ UGC Approved Degree
							</li>
							<li style="font-size:13px; color:#4A3AFF; line-height:1.4;">
								✔ Industry Aligned Curriculum
							</li>
						</ul>


						<div class="d-flex gap-4 wow fadeInUp" data-wow-delay=".9s">
							<a href="contact-us.php" class="blue_btn outline_btn round_btn">
								Apply Now <i class="ph ph-arrow-right"></i>
							</a>
							<a href="#" class=" blue_btn border_btn round_btn align-self-center">
								Explore Campus
							</a>
						</div>
					</div>
				</div><!-- End Col -->

				<div class="col-xl-6 col-lg-5 d-none d-lg-block col-12 align-self-center position-relative wow fadeInUp" data-wow-delay=".4s">
					<div class="sbanner_image_wrap" style="background-image: url('assets/img/shapes/banner_bg.png');">
						<img src="assets/img/bg/banner-search.png" alt="" class="sbanner_image wow fadeInUp" data-wow-delay=".4s">
					</div>

					<div class="bbadge badge2 wow fadeInUp" data-wow-delay=".7s">
						<img src="assets/img/icons/bbadge-icon.svg" alt="">
						<div class="bb_text">
							<h3><span class="count">100</span>%</h3>
							<p>Placement</p>
						</div>
					</div>

				</div>
			</div>

			<img src="assets/img/shapes/b1.svg" alt="" class="bshape1 aniupDown position-absolute">
			<img src="assets/img/shapes/b2.svg" alt="" class="bshape2 position-absolute">
			<img src="assets/img/shapes/bstar.svg" alt="" class="bshape3 aniupDown position-absolute">
			<img src="assets/img/shapes/b4.svg" alt="" class="bshape4 anileftRight position-absolute">
		</div>
	</section>
	<!-- End Home Banner -->



	<!-- Start Program -->
	<section class="our-program section-padding">
		<div class="container">

			<!-- SECTION TITLE -->
			<div class="row">
				<div class="col-12 text-center">
					<div class="section-title wow fadeInUp">
						<span>
							<span class="ticon">
								<img src="assets/img/icons/title-icon.svg" alt="">
							</span>
							Academic Programmes
						</span>
						<h2 style="white-space: nowrap;">
							Discover <strong style="color: var(--blue);">UGC-approved</strong> <span style="color: var(--yellow);">industry-ready</span> programs
						</h2>



						<img src="assets/img/shapes/title.svg" alt="">
					</div>

					<!-- FILTER NAV -->
					<ul class="prog_nav wow fadeInUp" style="justify-content:center;">
						<li class="filter active" data-filter="all">All Programs</li>
						<li class="filter" data-filter=".degree-program">Degree Programs</li>
						<li class="filter" data-filter=".skill-program">Professional & Skill</li>
					</ul>
				</div>
			</div>

			<!-- PROGRAM ITEMS -->
			<div class="row gy-4 program_items wow fadeInUp">

				<!-- DEGREE PROGRAMS -->

				<!-- Undergraduate -->
				<div class="col-xl-4 col-md-6 col-12 mix degree-program">
					<div class="program_item">
						<div class="program_img" style="height: 350px; overflow: hidden;">
							<div class="pcat" style="font-weight: 600;">
								<i class="fa-solid fa-graduation-cap"></i>
								Undergraduate
							</div>
							<img src="assets/img/program/1.jpg" alt="" style="height: 100%; width: 100%; object-fit: cover;">
						</div>
						<div class="program_content" style="padding: 15px;">
							<h3 style="font-weight: 700; font-size: 1.3rem; margin-bottom: 10px;">
								Bachelor’s Degree (UG)
							</h3>
							<p style="font-size: 0.9rem; line-height: 1.4; color: #444;">
								<strong>BA / B.Sc / BCom / BBA / BCA</strong><br>
								Comprehensive 3-year undergraduate programs across
								<span style="color: var(--blue); font-weight: 600;">Arts, Science, Commerce</span> & <span style="color: var(--yellow); font-weight: 600;">Computer Applications</span>.
							</p>
							<div style="text-align: center; margin-top: 15px;">
								<a href="#" class="blue_btn border_btn round_btn align-self-center" style="font-size: 0.85rem;  display: inline-block; text-align: center;">
									Know More <i class="ph ph-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Postgraduate -->
				<div class="col-xl-4 col-md-6 col-12 mix degree-program">
					<div class="program_item">
						<div class="program_img" style="height: 350px; overflow: hidden;">
							<div class="pcat" style="font-weight: 600;">
								<i class="fa-solid fa-user-graduate"></i>
								Postgraduate
							</div>
							<img src="assets/img/program/2.jpg" alt="" style="height: 100%; width: 100%; object-fit: cover;">
						</div>
						<div class="program_content" style="padding: 15px;">
							<h3 style="font-weight: 700; font-size: 1.3rem; margin-bottom: 10px;">
								Master’s Degree (PG)
							</h3>
							<p style="font-size: 0.9rem; line-height: 1.4; color: #444;">
								<strong>MA / M.Sc / MCom / MBA / MCA</strong><br>
								Advanced 2-year postgraduate degrees to specialize
								and <span style="color: var(--blue); font-weight: 600;">enhance career prospects</span>.
							</p>
							<div style="text-align: center; margin-top: 15px;">
								<a href="#" class="blue_btn border_btn round_btn align-self-center" style="font-size: 0.85rem;  display: inline-block; text-align: center;">
									Know More <i class="ph ph-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- SKILL & PROFESSIONAL -->

				<!-- Healthcare Science -->
				<div class="col-xl-4 col-md-6 col-12 mix skill-program">
					<div class="program_item">
						<div class="program_img" style="height: 350px; overflow: hidden;">
							<div class="pcat" style="font-weight: 600;">
								<i class="fa-solid fa-stethoscope"></i>
								Healthcare Science
							</div>
							<img src="assets/img/program/3.jpg" alt="" style="height: 100%; width: 100%; object-fit: cover;">
						</div>
						<div class="program_content" style="padding: 15px;">
							<h3 style="font-weight: 700; font-size: 1.3rem; margin-bottom: 10px;">
								Healthcare & Medical Labs
							</h3>
							<p style="font-size: 0.9rem; line-height: 1.4; color: #444;">
								Job-oriented training in <strong>MLT, Radiology, Optometry</strong>
								and other essential healthcare services.
							</p>
							<div style="text-align: center; margin-top: 15px;">
								<a href="#" class="blue_btn border_btn round_btn align-self-center" style="font-size: 0.85rem;  display: inline-block; text-align: center;">
									Contact Us <i class="ph ph-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Design Technology -->
				<div class="col-xl-4 col-md-6 col-12 mix skill-program">
					<div class="program_item">
						<div class="program_img" style="height: 350px; overflow: hidden;">
							<div class="pcat" style="font-weight: 600;">
								<i class="fa-solid fa-palette"></i>
								Design Technology
							</div>
							<img src="assets/img/program/4.jpg" alt="" style="height: 100%; width: 100%; object-fit: cover;">
						</div>
						<div class="program_content" style="padding: 15px;">
							<h3 style="font-weight: 700; font-size: 1.3rem; margin-bottom: 10px;">
								Fashion & Interior Design
							</h3>
							<p style="font-size: 0.9rem; line-height: 1.4; color: #444;">
								Professional courses in <strong>Fashion Design, Interior Design</strong>
								& <span style="color: var(--yellow); font-weight: 600;">Jewellery Design</span> to unleash creativity.
							</p>
							<div style="text-align: center; margin-top: 15px;">
								<a href="#" class="blue_btn border_btn round_btn align-self-center" style="font-size: 0.85rem;  display: inline-block; text-align: center;">
									Contact Us <i class="ph ph-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Management & IT -->
				<div class="col-xl-4 col-md-6 col-12 mix skill-program">
					<div class="program_item">
						<div class="program_img" style="height: 350px; overflow: hidden;">
							<div class="pcat" style="font-weight: 600;">
								<i class="fa-solid fa-briefcase"></i>
								Management & IT
							</div>
							<img src="assets/img/program/5.jpg" alt="" style="height: 100%; width: 100%; object-fit: cover;">
						</div>
						<div class="program_content" style="padding: 15px;">
							<h3 style="font-weight: 700; font-size: 1.3rem; margin-bottom: 10px;">
								Business & Computing
							</h3>
							<p style="font-size: 0.9rem; line-height: 1.4; color: #444;">
								Corporate-focused programs in <strong>Retail Management, Banking, Office Accounts</strong>
								& IT.
							</p>
							<div style="text-align: center; margin-top: 15px;">
								<a href="#" class="blue_btn border_btn round_btn align-self-center" style="font-size: 0.85rem;  display: inline-block; text-align: center;">
									Contact Us <i class="ph ph-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Professional Studies -->
				<div class="col-xl-4 col-md-6 col-12 mix skill-program">
					<div class="program_item">
						<div class="program_img" style="height: 350px; overflow: hidden;">
							<div class="pcat" style="font-weight: 600;">
								<i class="fa-solid fa-screwdriver-wrench"></i>
								Professional Studies
							</div>
							<img src="assets/img/program/6.jpg" alt="" style="height: 100%; width: 100%; object-fit: cover;">
						</div>
						<div class="program_content" style="padding: 15px;">
							<h3 style="font-weight: 700; font-size: 1.3rem; margin-bottom: 10px;">
								Professional Studies
							</h3>
							<p style="font-size: 0.9rem; line-height: 1.4; color: #444;">
								Short-term specialized courses designed for immediate employment and skill enhancement.
							</p>
							<div style="text-align: center; margin-top: 15px;">
								<a href="#" class="blue_btn border_btn round_btn align-self-center" style="font-size: 0.85rem;  display: inline-block; text-align: center;">
									Contact Us <i class="ph ph-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>



	<!-- End Program -->


	<section class="features section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-12">
					<div class="feature_item fi_single wow">
						<div class="ficon">
							<img src="assets/img/features/1.svg" alt="">
						</div>
						<h3>Learning Experiences</h3>
						<p>Aliquam arcu mauris, consequat ut ante sit amet, iaculis suscipit ipsum. Praesent tempor gravida</p>
						<a href="#">Learn More..</a>
					</div>
				</div><!-- End Col -->

				<div class="col-lg-4 col-12">
					<div class="feature_item fi_single wow">
						<div class="ficon">
							<img src="assets/img/features/2.svg" alt="">
						</div>
						<h3>Professional Instructor</h3>
						<p>Aliquam arcu mauris, consequat ut ante sit amet, iaculis suscipit ipsum. Praesent tempor gravida</p>
						<a href="#">Learn More..</a>
					</div>
				</div><!-- End Col -->

				<div class="col-lg-4 col-12">
					<div class="feature_item fi_single wow">
						<div class="ficon">
							<img src="assets/img/features/3.svg" alt="">
						</div>
						<h3>Life Time Support</h3>
						<p>Aliquam arcu mauris, consequat ut ante sit amet, iaculis suscipit ipsum. Praesent tempor gravida</p>
						<a href="#">Learn More..</a>
					</div>
				</div><!-- End Col -->
			</div>
		</div>
	</section>
	<!-- End Features -->


	<!-- Start About Us Two -->
	<section class="about-us-two position-relative section-padding">
		<div class="container">
			<div class="row">

				<!-- Image Column -->
				<div class="col-xl-6 align-self-center wow fadeInUp">
					<div class="about-img position-relative">
						<div class="about_badge2 aniupDown">
							<span class="ab_icon">
								<img src="assets/img/icons/graduation-hat-white.svg" alt="">
							</span>
							<h4>Our Progress</h4>
						</div>

						<div class="ab_images position-relative z-1">
							<img src="assets/img/about/3.jpg" class="about_img_1" alt="">
							<img src="assets/img/about/4.jpg" class="about_img_2" alt="">
						</div>

						<img src="assets/img/shapes/ab_wave2.svg" class="ab_top_shape aniupDown position-absolute" alt="">
						<img src="assets/img/shapes/ab_dots.svg" class="ab_btm_shape position-absolute" alt="">
						<img src="assets/img/shapes/ab_shape.svg" class="ab_right_shape anileftRight position-absolute" alt="">
					</div>
				</div><!-- End Col -->

				<!-- Content Column -->
				<div class="col-xl-6 align-self-center">
					<div class="about-content position-relative">
						<div class="section-title mb30 wow fadeInUp">
							<span>Excellence in Numbers</span>
							<h2>Mindmine College of Skill Education <br> consistently outperforms benchmarks.</h2>
							<img src="assets/img/shapes/title.svg" alt="">
						</div>

						<p class="wow fadeInUp">
							Our focus on practical application leads to high employability and student satisfaction rates.
						</p>

						<!-- Progress Stats -->
						<div class="row gy-4 mb-4 wow fadeInUp">
							<div class="col-6">
								<div class="progress-stat">
									<h3><strong>85%</strong></h3>
									<p>Graduation Rate</p>
									<div class="progress">
										<div class="progress-bar" style="width: 85%;"></div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="progress-stat">
									<h3><strong>95%</strong></h3>
									<p>Successful Course Completion</p>
									<div class="progress">
										<div class="progress-bar" style="width: 95%;"></div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="progress-stat">
									<h3><strong>90%</strong></h3>
									<p>Student Satisfaction</p>
									<div class="progress">
										<div class="progress-bar" style="width: 90%;"></div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="progress-stat">
									<h3><strong>78%</strong></h3>
									<p>Yearly Enrollment Growth</p>
									<div class="progress">
										<div class="progress-bar" style="width: 78%;"></div>
									</div>
								</div>
							</div>
						</div>
						<style>
							.progress-stat {
								margin-bottom: 1.5rem;
							}

							.progress-stat h3 {
								font-size: 1.8rem;
								color: var(--blue);
								margin-bottom: 0.2rem;
							}

							.progress-stat p {
								font-weight: 600;
								color: var(--yellow);
								/* হালকা উজ্জ্বল, readable */
								margin-bottom: 0.5rem;
							}

							.progress {
								background-color: rgba(74, 58, 255, 0.15);
								/* var(--blue) এর হালকা ট্রান্সপারেন্ট ভার্সন */
								border-radius: 8px;
								height: 12px;
								overflow: hidden;
							}

							.progress-bar {
								height: 12px;
								background: linear-gradient(90deg, var(--blue), var(--yellow));
								border-radius: 8px;
								transition: width 1.5s ease-in-out;
							}
						</style>

						<!-- Mindmine Impact Stats -->


						<a href="about.html" class="blue_btn round_btn wow fadeInUp">View All Programs <i class="ph ph-arrow-right"></i></a>

						<img src="assets/img/icons/about/ed_cap.svg" class="ab_book_shape aniupDown position-absolute" alt="">
					</div>
				</div><!-- End Col -->

			</div>
		</div>
	</section>

	<!-- End About Us -->

	<!-- Start Counter Up -->
	<section class="counter-up position-relative z-1">
		<div class="container">
			<div class="counter_bg" style="background-image: url(assets/img/bg/counter.svg);">
				<div class="row">

					<div class="col-xxl-3 col-xl-4 col-md-6 col-12 mx-xl-auto wow fadeInUp">
						<div class="counter-item">
							<div class="coicon">
								<img src="assets/img/icons/counter/peoples.svg" alt="">
							</div>
							<div class="ccontent">
								<h3><span class="count">850</span>+</h3>
								<span>Graduates</span>
							</div>
						</div>
					</div><!-- End Col -->

					<div class="col-xxl-3 col-xl-4 col-md-6 col-12 mx-xl-auto wow fadeInUp">
						<div class="counter-item">
							<div class="coicon">
								<img src="assets/img/icons/counter/graduate-hat.svg" alt="">
							</div>
							<div class="ccontent">
								<h3><span class="count">120</span>+</h3>
								<span>Current Students</span>
							</div>
						</div>
					</div><!-- End Col -->

					<div class="col-xxl-3 col-xl-4 col-md-6 col-12 mx-xl-auto wow fadeInUp">
						<div class="counter-item">
							<div class="coicon">
								<img src="assets/img/icons/counter/expert.svg" alt="">
							</div>
							<div class="ccontent">
								<h3><span class="count">15</span>+</h3>
								<span>Specialized Programmes</span>
							</div>
						</div>
					</div><!-- End Col -->

					<div class="col-xxl-3 col-xl-4 col-md-6 col-12 mx-xl-auto wow fadeInUp d-xl-none d-xxl-block">
						<div class="counter-item">
							<div class="coicon">
								<img src="assets/img/icons/counter/satisfaction.svg" alt="">
							</div>
							<div class="ccontent">
								<h3><span class="count">250</span>+</h3>
								<span>Awards & Honors</span>
							</div>
						</div>
					</div><!-- End Col -->

				</div>
			</div>
		</div>
	</section>

	<!-- End Counter Up -->

	<!-- Start Blog -->
	<section class="blog section-padding">
		<div class="container">
			<div class="section-title text-center wow fadeInUp">
				<h2>Medical Centre & Labs</h2>
				<span>State-of-the-art facilities for our Healthcare Science students.</span>
				<img src="assets/img/shapes/title.svg" alt="">
			</div>

			<div class="blog_slider owl-carousel wow fadeInUp">
				<div class="blog_item">
					<div class="blog_img">
						<img src="assets/img/blog/1.jpg" alt="">
						<span class="b_cat">
							<a href="#"><i class="ph ph-file"></i> Pathology Lab</a>
						</span>
					</div>


				</div>
				<div class="blog_item">
					<div class="blog_img">
						<img src="assets/img/blog/1.jpg" alt="">
						<span class="b_cat">
							<a href="#"><i class="ph ph-file"></i>Skills Traning</a>
						</span>
					</div>
				</div>
				<div class="blog_item">
					<div class="blog_img">
						<img src="assets/img/blog/1.jpg" alt="">
						<span class="b_cat">
							<a href="#"><i class="ph ph-file"></i>Research Unit</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Blog -->

	<!-- Start Client two -->

	<!-- End Client -->



	<!-- Start CTA2 -->
	<section class="container pb100">
		<div class="cta student-zone-cta" style="background-image: url(assets/img/cta/bg.jpg);">
			<div class="row justify-content-end">
				<div class="col-xl-6 wow fadeInUp">
					<div class="cta-content">

						<span>STUDENT PORTAL ACCESS</span>

						<h2>
							Student Zone<br>
							Campus Digital Gateway
						</h2>

						<p class="sz-cta-desc">
							Welcome to the digital gateway of Mindmine College.
							Enter the secure portal to access your dashboard,
							academics, and examinations.
						</p>

						<div class="sz-cta-meta">
							<span class="sz-status">
								<span class="dot"></span> Server Online
							</span>
							<span class="sz-auth">Authorized Access Only</span>
						</div>

						<a href="student-login.php" class="white_btn">
							Enter Campus Portal <i class="ph ph-arrow-right"></i>
						</a>

					</div>
				</div>
			</div>
		</div>
	</section>



	<!-- End cta -->

	<!-- Start Footer -->
	<?php include('include/footer.php'); ?>
	<!-- End Footer -->

	<!-- Start progress-wrap -->
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>
	<!-- End progress-wrap -->

	<svg class="clippy">
		<defs>
			<clipPath id="clip-instructor" clipPathUnits="objectBoundingBox">
				<path d="M0 0.0252417C0 0.0113011 0.00992167 0 0.0221607 0H0.792244C0.815192 0 0.833795 0.0211896 0.833795 0.0473283V0.337608V0.559067C0.833795 0.582348 0.84866 0.602172 0.868848 0.605813L0.964947 0.623144C0.985135 0.626785 1 0.646609 1 0.66989V0.966005C1 0.979866 0.990187 0.991134 0.978018 0.991246L0.0223388 0.999999C0.0100306 1.00011 0 0.988778 0 0.974758V0.0252417Z" fill="#222222" />
			</clipPath>
		</defs>
	</svg>
	<?php include "include/js_links.php"; ?>
</body>



</html>
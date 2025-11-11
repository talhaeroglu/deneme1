<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<body class="contact-page">
<header class="header d-flex align-items-center fixed-top" id="header">
<div class="container-fluid container-xl position-relative d-flex align-items-center">
<a class="logo d-flex align-items-center me-auto" href="index.html">
<!-- Uncomment the line below if you also wish to use an image logo -->
<!-- <img src="assets/img/logo.webp" alt=""> -->
<h1 class="sitename">iConstruction</h1>
</a>
<nav class="navmenu" id="navmenu">
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="about.html">About</a></li>
<li><a href="services.html">Services</a></li>
<li><a href="projects.html">Projects</a></li>
<li><a href="team.html">Team</a></li>
<li class="dropdown"><a href="#"><span>More Pages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
<ul>
<li><a href="service-details.html">Service Details</a></li>
<li><a href="project-details.html">Project Details</a></li>
<li><a href="quote.html">Quote Form</a></li>
<li><a href="terms.html">Terms</a></li>
<li><a href="privacy.html">Privacy</a></li>
<li><a href="404.html">404</a></li>
</ul>
</li>
<li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
<ul>
<li><a href="#">Dropdown 1</a></li>
<li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
<ul>
<li><a href="#">Deep Dropdown 1</a></li>
<li><a href="#">Deep Dropdown 2</a></li>
<li><a href="#">Deep Dropdown 3</a></li>
<li><a href="#">Deep Dropdown 4</a></li>
<li><a href="#">Deep Dropdown 5</a></li>
</ul>
</li>
<li><a href="#">Dropdown 2</a></li>
<li><a href="#">Dropdown 3</a></li>
<li><a href="#">Dropdown 4</a></li>
</ul>
</li>
<li><a class="active" href="contact.html">Contact</a></li>
</ul>
<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
<a class="btn-getstarted d-none d-sm-block" href="quote.html">Request Quote</a>
</div>
</header>
<main class="main">
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/construction/showcase-2.webp);">
<div class="container position-relative">
<h1>Contact</h1>
<p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
<nav class="breadcrumbs">
<ol>
<li><a href="index.html">Home</a></li>
<li class="current">Contact</li>
</ol>
</nav>
</div>
</div><!-- End Page Title -->
<!-- Contact Section -->
<section class="contact section" id="contact">
<div class="container" data-aos="fade-up" data-aos-delay="100">
<div class="contact-main-wrapper">
<div class="map-wrapper">
<iframe allowfullscreen="" height="100%" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" style="border:0;" width="100%"></iframe>
</div>
<div class="contact-content">
<div class="contact-cards-container" data-aos="fade-up" data-aos-delay="300">
<div class="contact-card">
<div class="icon-box">
<i class="bi bi-geo-alt"></i>
</div>
<div class="contact-text">
<h4>Location</h4>
<p>8721 Broadway Avenue, New York, NY 10023</p>
</div>
</div>
<div class="contact-card">
<div class="icon-box">
<i class="bi bi-envelope"></i>
</div>
<div class="contact-text">
<h4>Email</h4>
<p>info@examplecompany.com</p>
</div>
</div>
<div class="contact-card">
<div class="icon-box">
<i class="bi bi-telephone"></i>
</div>
<div class="contact-text">
<h4>Call</h4>
<p>+1 (212) 555-7890</p>
</div>
</div>
<div class="contact-card">
<div class="icon-box">
<i class="bi bi-clock"></i>
</div>
<div class="contact-text">
<h4>Open Hours</h4>
<p>Monday-Friday: 9AM - 6PM</p>
</div>
</div>
</div>
<div class="contact-form-container" data-aos="fade-up" data-aos-delay="400">
<h3>Get in Touch</h3>
<p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipiscing.</p>
<form action="forms/contact.php" class="php-email-form" method="post">
<div class="row">
<div class="col-md-6 form-group">
<input class="form-control" id="name" name="name" placeholder="Your Name" required="" type="text"/>
</div>
<div class="col-md-6 form-group mt-3 mt-md-0">
<input class="form-control" id="email" name="email" placeholder="Your Email" required="" type="email"/>
</div>
</div>
<div class="form-group mt-3">
<input class="form-control" id="subject" name="subject" placeholder="Subject" required="" type="text"/>
</div>
<div class="form-group mt-3">
<textarea class="form-control" name="message" placeholder="Message" required="" rows="5"></textarea>
</div>
<div class="my-3">
<div class="loading">Loading</div>
<div class="error-message"></div>
<div class="sent-message">Your message has been sent. Thank you!</div>
</div>
<div class="form-submit">
<button type="submit">Send Message</button>
<div class="social-links">
<a href="#"><i class="bi bi-twitter"></i></a>
<a href="#"><i class="bi bi-facebook"></i></a>
<a href="#"><i class="bi bi-instagram"></i></a>
<a href="#"><i class="bi bi-linkedin"></i></a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section><!-- /Contact Section -->
</main>
<footer class="footer dark-background" id="footer">
<div class="container">
<div class="row gy-5">
<div class="col-lg-4">
<div class="footer-brand">
<a class="logo d-flex align-items-center mb-3" href="index.html">
<span class="sitename">iConstruction</span>
</a>
<p class="tagline">Innovating the digital landscape with elegant solutions and timeless design.</p>
<div class="social-links mt-4">
<a aria-label="Facebook" href="#"><i class="bi bi-facebook"></i></a>
<a aria-label="Instagram" href="#"><i class="bi bi-instagram"></i></a>
<a aria-label="LinkedIn" href="#"><i class="bi bi-linkedin"></i></a>
<a aria-label="Twitter" href="#"><i class="bi bi-twitter-x"></i></a>
<a aria-label="Dribbble" href="#"><i class="bi bi-dribbble"></i></a>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="footer-links-grid">
<div class="row">
<div class="col-6 col-md-4">
<h5>Company</h5>
<ul class="list-unstyled">
<li><a href="#">About Us</a></li>
<li><a href="#">Our Team</a></li>
<li><a href="#">Careers</a></li>
<li><a href="#">Newsroom</a></li>
</ul>
</div>
<div class="col-6 col-md-4">
<h5>Services</h5>
<ul class="list-unstyled">
<li><a href="#">Web Development</a></li>
<li><a href="#">UI/UX Design</a></li>
<li><a href="#">Digital Strategy</a></li>
<li><a href="#">Branding</a></li>
</ul>
</div>
<div class="col-6 col-md-4">
<h5>Support</h5>
<ul class="list-unstyled">
<li><a href="#">Help Center</a></li>
<li><a href="#">Contact Us</a></li>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Terms of Service</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-lg-2">
<div class="footer-cta">
<h5>Let's Connect</h5>
<a class="btn btn-outline" href="contact.html">Get in Touch</a>
</div>
</div>
</div>
</div>
<div class="footer-bottom">
<div class="container">
<div class="row">
<div class="col-12">
<div class="footer-bottom-content">
<p class="mb-0">© <span class="sitename">Myebsite</span>. All rights reserved.</p>
<div class="credits">
<!-- All the links in the footer should remain intact. -->
<!-- You can delete the links only if you've purchased the pro version. -->
<!-- Licensing information: https://bootstrapmade.com/license/ -->
<!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>
<!-- Scroll Top -->
<a class="scroll-top d-flex align-items-center justify-content-center" href="#" id="scroll-top"><i class="bi bi-arrow-up-short"></i></a>
<!-- Preloader -->
<div id="preloader"></div>
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<!-- Main JS File -->
<script src="assets/js/main.js"></script>
</body>

<?php include 'includes/footer.php'; ?>
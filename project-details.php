<?php
include 'db.php';

// Güvenlik kontrolü
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: projects.php");
    exit();
}

$project_id = intval($_GET['id']);

// Ana proje bilgisi
$sql = "SELECT * FROM projects WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $project_id);
$stmt->execute();
$result = $stmt->get_result();
$project = $result->fetch_assoc();

if (!$project) {
    header("Location: projects.php");
    exit();
}

// Ek görselleri çek
$images_sql = "SELECT * FROM project_images WHERE project_id = ?";
$img_stmt = $conn->prepare($images_sql);
$img_stmt->bind_param("i", $project_id);
$img_stmt->execute();
$images_result = $img_stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Project Details - <?php echo htmlspecialchars($project['name']); ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="project-details-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="index.php" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">iConstruction</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="team.html">Team</a></li>
                <li><a href="contact.html">Contact</a></li>
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
            <h1>Project Details</h1>
            <p><?php echo htmlspecialchars($project['name']); ?> - Project Information</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li class="current"><?php echo htmlspecialchars($project['name']); ?></li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Project Details Section -->
    <section id="project-details" class="project-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <div class="project-hero" data-aos="zoom-out" data-aos-delay="200">
                        <!-- Ana proje resmi buraya gelecek -->
                        <img src="http://localhost/deneme/uploads/<?php echo htmlspecialchars($project['main_image']); ?>"
                             alt="<?php echo htmlspecialchars($project['name']); ?>"
                             class="img-fluid rounded"
                             onerror="this.src='assets/img/construction/project-8.webp'">

                        <div class="project-hero-overlay">
                            <div class="project-status">Completed</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="project-info" data-aos="fade-left" data-aos-delay="300">
                        <div class="project-meta">
                            <span class="category">Commercial</span>
                            <span class="location">Downtown Metropolitan</span>
                        </div>
                        <h1 class="project-title"><?php echo htmlspecialchars($project['name']); ?></h1>
                        <p class="project-description"><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Galeri Bölümü -->
        <?php if ($images_result->num_rows > 0): ?>
            <div class="project-gallery section" data-aos="fade-up" data-aos-delay="400">
                <div class="container">
                    <h3 class="gallery-title text-center mb-5">Project Gallery</h3>
                    <div class="row g-4">
                        <?php while ($img = $images_result->fetch_assoc()): ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="gallery-item">
                                    <img src="http://localhost/deneme/uploads/<?php echo htmlspecialchars($img['image']); ?>"
                                         alt="Project Image"
                                         class="img-fluid rounded"
                                         loading="lazy"
                                         onerror="this.src='assets/img/construction/project-3.webp'">
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <!-- Proje Detayları -->
        <div class="project-content section" data-aos="fade-up" data-aos-delay="500">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="content-section">
                            <h3>Project Overview</h3>
                            <p><?php echo nl2br(htmlspecialchars($project['details'])); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Project Details Section -->
</main>

<footer id="footer" class="footer dark-background">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4">
                <div class="footer-brand">
                    <a href="index.php" class="logo d-flex align-items-center mb-3">
                        <span class="sitename">iConstruction</span>
                    </a>
                    <p class="tagline">Innovating the digital landscape with elegant solutions and timeless design.</p>
                    <div class="social-links mt-4">
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" aria-label="Dribbble"><i class="bi bi-dribbble"></i></a>
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
                    <a href="contact.html" class="btn btn-outline">Get in Touch</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom-content">
                        <p class="mb-0">© <span class="sitename">iConstruction</span>. All rights reserved.</p>
                        <div class="credits">
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
</html>
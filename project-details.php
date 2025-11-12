<?php
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';
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



<body class="project-details-page">



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
                                         >
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
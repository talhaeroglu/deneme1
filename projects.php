<?php
include 'db.php';
$result = $conn->query("SELECT * FROM projects ORDER BY created_at DESC");
$page_title = "Projects - iConstruction";
$body_class = "projects-page";
include 'includes/header.php';
include 'includes/navbar.php';
?>

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/construction/showcase-2.webp);">
            <div class="container position-relative">
                <h1>Projects</h1>
                <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li class="current">Projects</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Projects Section -->
        <section id="projects" class="projects section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="project-card">
                                <div class="project-image">
                                    <img src="http://localhost/deneme/uploads/<?php echo $row['main_image']; ?>" alt="Project" class="img-fluid">
                                    <div class="project-overlay">
                                        <div class="project-actions">
                                            <a href="project-details.php?id=<?php echo $row['id']; ?>" class="btn-project">View Details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <div class="project-category"><h4><?php echo $row['name']; ?></h4></div>
                                    <p class="project-description"><?php echo $row['description']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>

            </div>

        </section><!-- /Projects Section -->

    </main>

<?php include 'includes/footer.php'; ?>
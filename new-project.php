<?php
include 'db.php';

// Form gönderildiyse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $details = trim($_POST['details']);

    $main_image = '';
    $upload_dir = 'uploads/';

    // --- ANA RESİM YÜKLEME ---
    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['main_image']['name'], PATHINFO_EXTENSION);
        $main_image = uniqid('main_') . '.' . $ext;
        move_uploaded_file($_FILES['main_image']['tmp_name'], $upload_dir . $main_image);
    }

    // --- PROJEYİ VERİTABANINA EKLE ---
    $stmt = $conn->prepare("INSERT INTO projects (name, description, details, main_image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $description, $details, $main_image);
    $stmt->execute();
    $project_id = $stmt->insert_id;

    // --- EK GÖRSELLERİ YÜKLE ---
    if (!empty($_FILES['images']['name'][0])) {
        $stmt_img = $conn->prepare("INSERT INTO project_images (project_id, image) VALUES (?, ?)");
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION);
                $filename = uniqid('img_') . '.' . $ext;
                move_uploaded_file($tmp_name, $upload_dir . $filename);
                $stmt_img->bind_param("is", $project_id, $filename);
                $stmt_img->execute();
            }
        }
    }

    header("Location: projects.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Proje Ekle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/header.php'; ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Yeni Proje Ekle</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <!-- Proje Adı -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Proje Adı</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <!-- Kısa Açıklama -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Kısa Açıklama</label>
                            <textarea class="form-control" id="description" name="description" rows="2" required></textarea>
                        </div>

                        <!-- Detaylı Bilgi -->
                        <div class="mb-3">
                            <label for="details" class="form-label">Proje Detayları</label>
                            <textarea class="form-control" id="details" name="details" rows="4" required></textarea>
                        </div>

                        <!-- Ana Resim -->
                        <div class="mb-3">
                            <label for="main_image" class="form-label">Ana Resim</label>
                            <input type="file" class="form-control" id="main_image" name="main_image" accept="image/*" required>
                            <div class="form-text">Bu resim proje listesinde görünecek.</div>
                        </div>

                        <!-- Ek Resimler -->
                        <div class="mb-3">
                            <label for="images" class="form-label">Ek Resimler (isteğe bağlı)</label>
                            <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
                            <div class="form-text">Birden fazla resim seçebilirsin.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Projeyi Kaydet</button>
                        <a href="projects.php" class="btn btn-secondary">İptal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

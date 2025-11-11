<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $details = $_POST["details"];
    $image = "";

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "uploads/";
        $image = basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    }

    $stmt = $conn->prepare("INSERT INTO projects (name, description, details, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $description, $details, $image);
    $stmt->execute();

    header("Location: projects.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Yeni Proje Ekle</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-5">
  <h2>Yeni Proje Ekle</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Proje İsmi</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Açıklama</label>
      <textarea name="description" class="form-control" rows="3" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Detay</label>
      <textarea name="details" class="form-control" rows="5" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Resim</label>
      <input type="file" name="image" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
  </form>
</div>

<?php include 'footer.php'; ?>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

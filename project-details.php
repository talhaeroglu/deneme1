<?php
include 'db.php';
$id = $_GET['id'] ?? 0;
$stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$project = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($project['name']); ?></title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-5">
  <h2><?php echo htmlspecialchars($project['name']); ?></h2>
  <img src="uploads/<?php echo $project['image']; ?>" class="img-fluid mb-4" alt="Proje Görseli">
  <p><?php echo nl2br(htmlspecialchars($project['details'])); ?></p>
</div>

<?php include 'footer.php'; ?>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

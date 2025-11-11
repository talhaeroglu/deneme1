<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "charity_db";

// Bağlantı oluştur
$conn = new mysqli($servername, $username, $password);

// Veritabanı yoksa oluştur
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Tablo yoksa oluştur
$conn->query("CREATE TABLE IF NOT EXISTS projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  details TEXT NOT NULL,
  image VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");
?>

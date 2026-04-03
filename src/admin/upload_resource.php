<?php
require_once '../config.php';
require_once '../db.php';
require_once 'auth_check.php';

$file = $_FILES['pdf'];

if ($file['type'] !== 'application/pdf') {
  die("Only PDFs allowed.");
}

$filename = time() . '_' . basename($file['name']);
move_uploaded_file($file['tmp_name'], "../uploads/resources/$filename");

$conn->query("INSERT INTO resources (filename) VALUES ('$filename')");

header("Location: dashboard.php");
exit;
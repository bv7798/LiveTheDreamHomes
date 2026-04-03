<?php
require_once '../config.php';
require_once '../db.php';
require_once 'auth_check.php';

$name = $conn->real_escape_string($_POST['name']);
$description = $conn->real_escape_string($_POST['description']);

$image = $_FILES['image'];
$filename = time() . '_' . basename($image['name']);
move_uploaded_file($image['tmp_name'], "../uploads/team/$filename");

$conn->query("
  INSERT INTO team_members (name, description, image)
  VALUES ('$name', '$description', '$filename')
");

header("Location: dashboard.php");
exit;
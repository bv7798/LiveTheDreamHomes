<?php
require_once 'config.php';
require_once '../Backend/db.php';
require_once 'auth_check.php';

$file = $_FILES['video'];

if ($file['type'] !== 'video/mp4') {
  die("Only MP4 videos allowed.");
}

$filename = time() . '_' . basename($file['name']);
$target = "../uploads/videos/" . $filename;

move_uploaded_file($file['tmp_name'], $target);

$conn->query("INSERT INTO videos (filename) VALUES ('$filename')");

header("Location: dashboard.php");
exit;
``
<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

// CSRF check
if (empty($_POST['token']) || !hash_equals($_SESSION['login_token'] ?? '', $_POST['token'])) {
    header('Location: login.php?error=1');
    exit;
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

global $ADMIN_USERNAME, $ADMIN_PASSWORD_HASH;

if ($username === $ADMIN_USERNAME && password_verify($password, $ADMIN_PASSWORD_HASH)) {
    // Regenerate session ID to prevent fixation
    session_regenerate_id(true);
    $_SESSION['admin_logged_in'] = true;
    unset($_SESSION['login_token']);
    header('Location: dashboard.php');
    exit;
} else {
    header('Location: login.php?error=1');
    exit;
}

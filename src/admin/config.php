<?php
// Strong session settings
ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);

session_start();

// Admin credentials
$ADMIN_USERNAME = 'admin';

// Hashed password for: password#
$ADMIN_PASSWORD_HASH = '$2y$10$QpZmcAkGerhlbgm8xJoOjO.2CnbQtYjU4.gxmQo25BFCPnHOZNP6q';



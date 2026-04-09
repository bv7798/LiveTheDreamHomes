<?php
require_once 'config.php';

// If already logged in, go straight to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

// CSRF token
if (empty($_SESSION['login_token'])) {
    $_SESSION['login_token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['login_token'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - LiveTheDreamHomes</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<header>
        <div class="site-title-container">
            <h1 class="site-title stacked-title">
                <span>Live</span>
                <span>The</span>
                <span>Dream</span>
                <span>Homes</span>
            </h1>
        </div>
        <div class="admin-login-title">
            Admin Login
        </div>
</header>

<nav>
    <a href="../Index.php">Home</a>
    <a href="../about.php">About Us</a>
    <a href="../contact.html">Contact Us</a>
    <a href="../resources.php">Resources</a>
</nav>


<section>
    <div class="container">
        <h2>Admin Access</h2>
        <?php if (!empty($_GET['error'])): ?>
            <p style="color:red;">Invalid credentials or session error.</p>
        <?php endif; ?>
        <form action="login_process.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

            <button type="submit">Login</button>
        </form>
    </div>
</section>

<footer>
    <p>LiveTheDreamHomes Admin</p>
</footer>

</body>
</html>


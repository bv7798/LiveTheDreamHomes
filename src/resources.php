<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LiveTheDreamHomes - Resources</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    
<h1 class="site-title-container">
    <img src="logo.png" alt="Live The Dream Homes Logo" class="site-logo">
</h1>

    <nav>
        <a href="Index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="contact.html">Contact Us</a>
        <a href="resources.php">Resources</a>
    </nav>

    <a href="admin/login.php" class="admin-login-btn">Admin Login</a>
</header>



<section>
    <h2>Helpful Resources</h2>


    <?php
    require_once 'Backend/db.php';
    $result = $conn->query("SELECT * FROM resources");
    while ($row = $result->fetch_assoc()):
    ?>
    <a href="uploads/resources/<?php echo $row['filename']; ?>" target="_blank">
        View Resource
    </a>
    <?php endwhile; ?>


</section>

<footer>
    <p>Connect with us:</p>
    <a href="https://www.facebook.com/rj.brophyrealtor" target="_blank">Facebook</a>
    <a href="hhttps://www.instagram.com/raymondbrophyrealestate/" target="_blank">Instagram</a>
</footer>

</body>
</html>

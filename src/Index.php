<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LiveTheDreamHomes - Home</title>
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

    <?php
    require_once 'Backend/db.php';
    $result = $conn->query("SELECT * FROM videos ORDER BY uploaded_at DESC");
    while ($row = $result->fetch_assoc()):
    ?>
    <video controls>
        <source src="uploads/videos/<?php echo $row['filename']; ?>" type="video/mp4">
    </video>
    <?php endwhile; ?>


    <div class="testimonials">
        <h3>Customer Testimonials</h3>
        <p>"LiveTheDreamHomes helped us find our forever home!" – Sarah & Tom</p>
        <p>"Professional and friendly. Highly recommended." – James R.</p>
    </div>
</section>

<footer>
  <p>Connect with us:</p>
  <a href="https://www.facebook.com/rj.brophyrealtor" target="_blank">Facebook</a>
  <a href="https://www.instagram.com/raymondbrophyrealestate/" target="_blank">Instagram</a>
</footer>

</body>
</html>

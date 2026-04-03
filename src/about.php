<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LiveTheDreamHomes - About Us</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
  
<h1 class="site-title stacked-title">
  <span>Live</span>
  <span>The</span>
  <span>Dream</span>
  <span>Homes</span>
</h1>


  <a href="admin/login.php" class="admin-login-btn">Admin Login</a>
</header>


<nav>
  <a href="index.html">Home</a>
  <a href="about.html">About Us</a>
  <a href="contact.html">Contact Us</a>
  <a href="resources.html">Resources</a>
</nav>

<section>
    <h2>Meet Our Team</h2>

    <?php
    require_once 'db.php';
    $result = $conn->query("SELECT * FROM team_members");
    while ($row = $result->fetch_assoc()):
    ?>
    <div class="team-member">
        <img src="uploads/team/<?php echo $row['image']; ?>">
        <p>
            <strong><?php echo htmlspecialchars($row['name']); ?></strong><br>
            <?php echo htmlspecialchars($row['description']); ?>
        </p>
    </div>
    <?php endwhile; ?>
    ``

</section>

<footer>
  <p>Connect with us:</p>
  <a href="https://www.facebook.com/rj.brophyrealtor" target="_blank">Facebook</a>
  <a href="https://www.instagram.com/raymondbrophyrealestate/" target="_blank">Instagram</a>
</footer>

</body>
</html>

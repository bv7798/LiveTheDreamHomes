<?php
require_once 'auth_check.php';
require_once 'db.php'; // <-- connects to MySQL

$rows = [];

// Query the database
$sql = "SELECT name, age, familial_status, price_range, county, notes, submitted_at 
        FROM submissions 
        ORDER BY submitted_at DESC";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - LiveTheDreamHomes</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background: #f0f4f8;
            text-align: left;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
</header>

<section>
    <div class="top-bar">
        <h2>Client Submissions</h2>
        <a href="logout.php" style="color:#c00; font-weight:bold;">Logout</a>
    </div>

    <?php if (empty($rows)): ?>
        <p>No submissions yet.</p>
    <?php else: ?>
        <table>
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Age</th>
                <th>Familial Status</th>
                <th>Price Range</th>
                <th>County</th>
                <th>Notes</th>
                <th>Submitted At</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                    <td><?php echo htmlspecialchars($row['familial_status']); ?></td>
                    <td><?php echo htmlspecialchars($row['price_range']); ?></td>
                    <td><?php echo htmlspecialchars($row['county']); ?></td>
                    <td><?php echo htmlspecialchars($row['notes']); ?></td>
                    <td><?php echo htmlspecialchars($row['submitted_at']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>

<h2>Manage Content</h2>

<h3>Upload Home Page Video</h3>
<form action="upload_video.php" method="post" enctype="multipart/form-data">
  <input type="file" name="video" accept="video/mp4" required>
  <button type="submit">Upload Video</button>
</form>

<h3>Upload Resource PDF</h3>
<form action="upload_resource.php" method="post" enctype="multipart/form-data">
  <input type="file" name="pdf" accept="application/pdf" required>
  <button type="submit">Upload PDF</button>
</form>

<h3>Add Team Member</h3>
<form action="upload_team.php" method="post" enctype="multipart/form-data">
  <input type="text" name="name" placeholder="Name" required>
  <textarea name="description" placeholder="Description" required></textarea>
  <input type="file" name="image" accept="image/*" required>
  <button type="submit">Add Member</button>
</form>


<footer>
    <p>LiveTheDreamHomes Admin</p>
</footer>

</body>
</html>

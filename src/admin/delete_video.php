<?php
require_once 'config.php';
require_once '../Backend/db.php';

// Ensure the video ID is passed
if (isset($_GET['id'])) {
    $videoId = intval($_GET['id']);

    // Fetch the filename from the database
    $sql = "SELECT filename FROM videos WHERE id = $videoId";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filename = $row['filename'];

        // Delete the video file from the server
        $filePath = "../uploads/videos/$filename";
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the video entry from the database
        $sqlDelete = "DELETE FROM videos WHERE id = $videoId";
        if ($conn->query($sqlDelete) === TRUE) {
            echo "Video deleted successfully!";
        } else {
            echo "Error deleting video: " . $conn->error;
        }
    } else {
        echo "Video not found.";
    }
} else {
    echo "No video ID provided.";
}

header("Location: dashboard.php"); // Redirect back to the dashboard
exit;
?>

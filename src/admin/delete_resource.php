<?php
require_once 'config.php';
require_once '../Backend/db.php';

// Ensure the resource ID is passed
if (isset($_GET['id'])) {
    $resourceId = intval($_GET['id']);

    // Fetch the filename from the database
    $sql = "SELECT filename FROM resources WHERE id = $resourceId";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filename = $row['filename'];

        // Delete the resource file from the server
        $filePath = "../uploads/resources/$filename";
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the resource entry from the database
        $sqlDelete = "DELETE FROM resources WHERE id = $resourceId";
        if ($conn->query($sqlDelete) === TRUE) {
            echo "Resource deleted successfully!";
        } else {
            echo "Error deleting resource: " . $conn->error;
        }
    } else {
        echo "Resource not found.";
    }
} else {
    echo "No resource ID provided.";
}

header("Location: dashboard.php"); // Redirect back to the dashboard
exit;
?>
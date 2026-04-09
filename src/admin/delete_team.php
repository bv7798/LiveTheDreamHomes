<?php
require_once 'config.php';
require_once '../Backend/db.php';

// Ensure the team member ID is passed
if (isset($_GET['id'])) {
    $teamId = intval($_GET['id']);

    // Fetch the image filename from the database
    $sql = "SELECT image FROM team_members WHERE id = $teamId";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filename = $row['image'];

        // Delete the team member image from the server
        $filePath = "../uploads/team/$filename";
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the team member entry from the database
        $sqlDelete = "DELETE FROM team_members WHERE id = $teamId";
        if ($conn->query($sqlDelete) === TRUE) {
            echo "Team member deleted successfully!";
        } else {
            echo "Error deleting team member: " . $conn->error;
        }
    } else {
        echo "Team member not found.";
    }
} else {
    echo "No team member ID provided.";
}

header("Location: dashboard.php"); // Redirect back to the dashboard
exit;
?>
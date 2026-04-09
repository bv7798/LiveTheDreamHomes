<?php
require_once 'config.php';
require_once '../Backend/db.php';

// Ensure the submission ID is passed
if (isset($_GET['id'])) {
    $submissionId = intval($_GET['id']);  // Sanitize the ID

    // Delete the submission from the database
    $sqlDelete = "DELETE FROM submissions WHERE id = ?";
    $stmt = $conn->prepare($sqlDelete); // Use prepared statement for safety
    $stmt->bind_param("i", $submissionId);  // Bind the parameter to prevent SQL injection

    if ($stmt->execute()) {
        // If deletion is successful, redirect to the dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error deleting submission: " . $stmt->error;
    }
} else {
    echo "No submission ID provided.";
}

?>
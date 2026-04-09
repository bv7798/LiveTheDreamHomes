<?php
require_once "db.php";

// Validate required fields
if (
    !isset($_POST['name']) ||
    !isset($_POST['age']) ||
    !isset($_POST['Familial Status']) ||
    !isset($_POST['price_range']) ||
    !isset($_POST['county'])
) {
    die("Invalid form submission.");
}

// Sanitize inputs
$name = $conn->real_escape_string($_POST['name']);
$age = intval($_POST['age']);
$familial = $conn->real_escape_string($_POST['Familial Status']);
$price = $conn->real_escape_string($_POST['price_range']);
$county = $conn->real_escape_string($_POST['county']);
$notes = $conn->real_escape_string($_POST['notes'] ?? "");

// Prepare SQL insert
$sql = "INSERT INTO submissions 
        (name, age, familial_status, price_range, county, notes, submitted_at)
        VALUES 
        ('$name', $age, '$familial', '$price', '$county', '$notes', NOW())";

if ($conn->query($sql) === TRUE) {
    header("Location: success.html");
    exit;
} else {
    echo "Error: " . $conn->error;
}
// OPTIONAL: Email notification
$to = "brandonverrone@yahoo.com";
$subject = "New Client Submission from LiveTheDreamHomes";
$message = "Name: $name\nAge: $age\nFamilial Status: $familial\nPrice Range: $price\nCounty: $county\nNotes: $notes";
mail($to, $subject, $message);


// Redirect to success page
header("Location: /Backend/success.html");
exit;
?>

<?php
$apiKey = 'YOUR_API_KEY';  // Replace with your actual API key
$placeId = 'YOUR_PLACE_ID';  // Replace with your Google Business Place ID

// Google Places API URL
$url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$placeId&fields=reviews&key=$apiKey";

// Get the JSON response from Google Places API
$response = file_get_contents($url);

// Decode the JSON response
$data = json_decode($response, true);

// Check if reviews exist
if (isset($data['result']['reviews'])) {
    $reviews = $data['result']['reviews'];
} else {
    $reviews = [];
}
?>
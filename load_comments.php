<?php
// Get the path from the query string
$path = isset($_GET['asc']) ? trim($_GET['asc']) : '';

// Construct the full data file path
$dataFile = $path . '.json'; // e.g., "asc/1.json"

// Check if the constructed file exists
if (file_exists($dataFile)) {
    $json = file_get_contents($dataFile);
    echo $json;
} else {
    echo json_encode([]); // Return empty array if file not found
}
?>

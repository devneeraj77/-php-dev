<?php
header('Content-Type: application/json'); 

$jsonFilePath = 'data.json'; 
if (file_exists($jsonFilePath)) {
    $jsonData = file_get_contents($jsonFilePath); 
    $data = json_decode($jsonData, true); 

    if (json_last_error() === JSON_ERROR_NONE) {
        echo json_encode($data); 
    } else {
        echo json_encode(['error' => 'Error decoding JSON: ' . json_last_error_msg()]);
    }
} else {
    echo json_encode(['error' => 'JSON file not found.']);
}
?>
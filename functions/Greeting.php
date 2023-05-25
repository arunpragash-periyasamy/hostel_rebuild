<?php

// Check if name parameter is provided
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $name = $_GET['name'];
    // Construct the greeting message
    $message = "GET Thanks for being with us, Mr. $name.";
    // Output the message as JSON
    header('Content-Type: application/json');
    echo json_encode(['message' => $message]);
}



// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if name parameter is provided in the POST request
    if (isset($_POST['name'])) {
        // Get the name parameter from the POST request
        $name = $_POST['name'];
        // Construct the greeting message
        $message = "POST Thanks for being with us, Mr. $name.";
        // Output the message as JSON
        header('Content-Type: application/json');
        echo json_encode(['message' => $message]);
        exit; // Stop further execution
    } else {
        // If name parameter is not provided, return an error message
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['error' => 'Name parameter is required.']);
        exit; // Stop further execution
    }
} else {
    // If request method is not POST, return an error message
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Only POST requests are allowed.']);
    exit; // Stop further execution
}
?>

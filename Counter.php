<?php
session_start(); // Start the session

// Check if the counter is already set in the session
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0; // Initialize the counter in the session
}

// Increment the counter
$_SESSION['counter']++;

// Display the counter
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session-Based Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }
        h1 {
            font-size: 48px;
            color: #4CAF50;
        }
        p {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <h1>Session-Based Counter</h1>
    <p>This page has been refreshed <strong>{$_SESSION['counter']}</strong> times.</p>
</body>
</html>
HTML;
?>

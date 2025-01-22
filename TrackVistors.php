<?php
// File to store the visitor count
$visitorFile = "visitors.txt";

// Check if the file exists
if (!file_exists($visitorFile)) {
    // Initialize the file with 0 visitors
    file_put_contents($visitorFile, 0);
}

// Check if the visitor has a cookie
if (!isset($_COOKIE['unique_visitor'])) {
    // Increment the visitor count for a new visitor
    $visitorCount = (int) file_get_contents($visitorFile);
    $visitorCount++;
    file_put_contents($visitorFile, $visitorCount);

    // Set a cookie to identify the visitor for future requests
    setcookie('unique_visitor', 'true', time() + (86400 * 30)); // Cookie valid for 30 days
}

// Get the current visitor count
$currentVisitors = file_get_contents($visitorFile);

// Display the visitor count
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        h1 {
            font-size: 40px;
            color: #4CAF50;
        }
        p {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <h1>Welcome to My Website</h1>
    <p>Total Unique Visitors: <strong>$currentVisitors</strong></p>
</body>
</html>
HTML;
?>

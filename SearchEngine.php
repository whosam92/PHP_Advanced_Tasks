
<?php 
// Display the form using HEREDOC syntax

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture the URL input from the form
    $url = $_POST['url'] ?? '';

    // Validate the URL format
    if (!empty($url) && filter_var($url, FILTER_VALIDATE_URL)) {
        // Redirect to the URL
        header("Location: $url");
        exit(); // Ensure no further code is executed after redirection
    } else {
// Display an error message if the URL is invalid
$error = "Invalid URL. Please enter a valid URL starting with http:// or https://.";
    }
}

// Display the form using HEREDOC syntax
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>My Redirect Form</title>
</head>
<body>
    <h1>URL Redirect Form</h1>
    <form method="POST">
        <label for="url">Enter Website URL:</label>
        <input type="text" id="url" name="url" placeholder="https://example.com" required>
        <br><br>
        <button type="submit">Go to Website</button>
    </form>
HTML;

// Display error message if any
if (!empty($error)) {
    echo "<p style='color: orange;'>$error</p>";
}

echo <<<HTML
</body>
</html>
HTML;
?>


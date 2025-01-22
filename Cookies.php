<?php
// Step 1: Create Cookies
$cookie_name = "user";
$cookie_value = "Mohammad Ali";
$expiry_time = time() + (86400 * 3); // 3 days from now
$cookie_path = "/";
$secure = false; // Set true if using HTTPS
$httponly = true; // Prevent access from JavaScript

// Create the cookie
setcookie($cookie_name, $cookie_value, $expiry_time, $cookie_path, "", $secure, $httponly);

// Create another cookie for demonstration
setcookie("theme", "dark", $expiry_time, $cookie_path, "", $secure, $httponly);

// Step 2: Retrieve Cookies
echo "<h1>Retrieve All Cookies</h1>";
if (count($_COOKIE) > 0) {
    foreach ($_COOKIE as $key => $value) {
        echo "Cookie Name: $key, Cookie Value: $value<br>";
    }
} else {
    echo "No cookies found!<br>";
}

// Step 3:  How to Delete Cookies .. 
if (isset($_POST['delete'])) {
    // Set expiry time to the past to delete cookies
    setcookie($cookie_name, "", time() - 3600, $cookie_path);
    setcookie("theme", "", time() - 3600, $cookie_path);
    echo "<p>All cookies have been deleted. Refresh the page to verify.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies Example</title>
</head>
<body>
    <h1>Cookies Example</h1>
    <p>Cookies for the user and theme have been created.</p>
    <form method="POST">
        <button type="submit" name="delete">Delete All Cookies</button>
    </form>
</body>
</html>

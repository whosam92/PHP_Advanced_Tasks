<?php 

// Display the form using HEREDOC syntax
echo <<<form
   <form  method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email">
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password here">
        <br><br>
        <button type="submit">Submit</button>
    </form>
form;


// First step - Initialize variables
$email = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Check if email and password fields exist in the POST request
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email']; // Assign the posted email value
        $password = $_POST['password']; // Assign the posted password value
    }

    // Display the submitted data
    echo "Email: " .($email) . "<br>";
    echo "Password: " .($password) . "<br>";
}
?>


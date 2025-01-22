<?php

// Initialize variables for inputs and result
$num1 = $num2 = $result = '';
$operation = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get inputs and operation from the form
    $num1 = $_POST['num1'] ?? '';
    $num2 = $_POST['num2'] ?? '';
    $operation = $_POST['operation'] ?? '';

    // Validate inputs and perform the calculation
    if (is_numeric($num1) && is_numeric($num2)) {
        switch ($operation) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Error: Division by zero!";
                }
                break;
            default:
                $result = "Invalid operation.";
        }
    } else {
        $result = "Please enter valid numbers.";
    }
}

// Display the calculator form using HEREDOC
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY Calculator</title>
</head>
<body>
    <h1>Simple Calculator Task</h1>
    <form action="" method="POST">
        <label for="num1">Number 1:</label>
        <input type="text" id="num1" name="num1" value="$num1" required>
        <br><br>
        
        <label for="num2">Number 2:</label>
        <input type="text" id="num2" name="num2" value="$num2" required>
        <br><br>
        
        <label for="operation">Operation:</label>
        <select id="operation" name="operation" required>
            <option value="+" " . ($operation === "+" ? "selected" : "") . ">+</option>
            <option value="-" " . ($operation === "-" ? "selected" : "") . ">-</option>
            <option value="*" " . ($operation === "*" ? "selected" : "") . ">*</option>
            <option value="/" " . ($operation === "/" ? "selected" : "") . ">/</option>
        </select>
        <br><br>
        
        <button type="submit">Calculate</button>
    </form>
HTML;



// Display the result if any
if ($result !== '') {
    echo "<h2>Result: $result</h2>";
}

echo <<<HTML
</body>
</html>
HTML;
?>

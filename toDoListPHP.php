<?php
// Start the session to store the to-do list
session_start();

// Initialize the to-do list if it doesn't exist
if (!isset($_SESSION['todo_list'])) {
    $_SESSION['todo_list'] = [];
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task']) && !empty(trim($_POST['task']))) {
        // Add the task to the list
        $task = $_POST['task']; // clean and Sanitize input
        $_SESSION['todo_list'][] = $task;
    } elseif (isset($_POST['clear'])) {
        // Clear the to-do list
        $_SESSION['todo_list'] = [];
    }
}

// Generate the HTML using HEREDOC

$tasksHTML = "";
if (!empty($_SESSION['todo_list'])) {
    foreach ($_SESSION['todo_list'] as $index => $task) {
        $tasksHTML .= "<li>Task " . ($index + 1) . ": $task</li>";
    }
} else {
    $tasksHTML = "<li> No tasks added yet. </li>";
}

echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Simple To-Do List</title>
    
    
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 5px 0;
        }
        form {
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 12px;
            margin-top: 10px;
            cursor: pointer;
            
        }
    </style>
</head>
<body>
    <h1>Simple To-Do List</h1>
    <ul>
        $tasksHTML
    </ul>
    <form action="" method="POST">
        <input type="text" name="task" placeholder="Enter a new task" required>
        <br><br>
        <button type="submit">Add Task</button>
    </form>
    <form action="" method="POST" style="margin-top: 20px;">
        <button type="submit" name="clear" style="background-color: red; color: white;">Clear All Tasks</button>
    </form>
</body>
</html>
HTML;
?>




<!-- dtermine  the project name, and script name #4 answer below for this file  -->

<?php 

// script name 
// echo $_SERVER ['SCRIPT_NAME'] .'<br>';

// project name 
// $full_path=$_SERVER['SCRIPT_NAME'];


//showing prject name 
// $project_name = explode('/', trim($full_path, '/'))[2]; // index will show the which "/" will be trimming the name after 

// echo''. $project_name .''. "<br>";


// =============================================================


// Determine page requested time

// date_default_timezone_set('Asia/Amman'); //time zone  
//  $time= $_SERVER['REQUEST_TIME'];
// echo date("H:i:s", $time) .'<br>'; // note for full  date and time  we can use  Y-m-d H:i:s 
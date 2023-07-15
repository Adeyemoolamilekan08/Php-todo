<?php
include('config.php');


// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Retrieve user's tasks from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE user_id = '$user_id'";
$result = mysqli_query($con, $sql);
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Add new task
if (isset($_POST['add_task'])) {
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];

    // Insert new task into the database
    $sql = "INSERT INTO tasks (user_id, task_name, task_description) VALUES ('$user_id', '$task_name', '$task_description')";
    mysqli_query($con, $sql);

    // Refresh the page
    header("Location: tasks.php");
    exit;
}

// Delete a task
if (isset($_GET['delete_task'])) {
    $task_id = $_GET['delete_task'];

    // Delete task from the database
    $sql = "DELETE FROM tasks WHERE id = '$task_id' AND user_id = '$user_id'";
    mysqli_query($con, $sql);

    // Refresh the page
    header("Location: tasks.php");
    exit;
}

// Logout
if (isset($_GET['logout'])) {
    // Destroy session and redirect to login page
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>To-Do List</title>


    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>

<body>
    <h1>Welcome to Your To-Do List</h1>

    <form method="post" action="">
        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" required>

        <label for="task_description">Task Description:</label>
        <textarea name="task_description" required></textarea>

        <button type="submit" name="add_task">Add Task</button>
    </form>

    <h2>Your Tasks:</h2>

    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li>
                <h3><?php echo $task['task_name']; ?></h3>
                <p><?php echo $task['task_description']; ?></p>
                <a href="tasks.php?delete_task=<?php echo $task['id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><a href="tasks.php?logout">Logout</a></p>
</body>

</html>

<?php
// Close database connection
mysqli_close($con);
?>
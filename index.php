<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>

    <style>
        body {
  background-color: #f1f1f1;
  font-family: Arial, sans-serif;
}

.container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
input[type="password"] {
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

    </style>
</head>
<body>
    <h1>Welcome to Todo App</h1>
    <p>
        <a href="register.php">Register</a> or
        <a href="login.php">Login</a> to start managing your tasks.
    </p>
</body>
</html>
<!-- do it in php for me Store the user's to-do items in a database to retain the data even after the user logs out or closes the browser. -->

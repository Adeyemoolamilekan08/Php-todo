<?php
// Database connection
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'todos';

$con = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
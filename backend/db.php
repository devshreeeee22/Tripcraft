<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tripcraft";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

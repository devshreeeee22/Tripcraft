<?php
include('./db.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $conn = new mysqli("localhost", "root", "", "tripcraft");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Signup successful. <a href='../frontend/login.php'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

}
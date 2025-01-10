<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli("localhost", "root", "", "tripcraft");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    if ($hashedPassword && password_verify($password, $hashedPassword)) {
        echo "<script>alert('Signup successful !! Please login again !');
        window.location.href='../frontend/login.php';</script>";
        exit();
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../home.html?error=" . urlencode($error));
    exit();
}
?>

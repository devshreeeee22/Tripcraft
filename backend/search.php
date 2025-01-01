<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = 'localhost';
$username='root';
$password='';
$dbname='Tripcraft';

$conn=mysqli_connect($host,$username,$password,$dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error);
}

if(isset($_GET['destination'])){
    $destination = $conn -> real_escape_string($_GET['destination']);
    $sql = $sql = "SELECT * FROM travel_packages WHERE destination LIKE '%$destination%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='package'>";
            echo "<img src='" . $row['image_url'] . "' alt='" . $row['package_name'] . "'>";
            echo "<h2>" . $row['package_name'] . "</h2>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p>Price: $" . $row['price'] . "</p>";
            echo "<p>Duration: " . $row['duration'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No packages found for '$destination'.</p>";
    }
}

$conn->close();
?>



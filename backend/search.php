<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tripcraft"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the destination from the form
$destination = mysqli_real_escape_string($conn, $_GET['destination']);

// Query the database for the destination
$sql = "SELECT * FROM travel_packages WHERE destination LIKE '%$destination%'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results for "<?php echo htmlspecialchars($destination); ?>"</h1>

    <?php
    if ($result->num_rows > 0) {
        // Output data for each package
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . htmlspecialchars($row['package_name']) . "</h2>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<p>Price: ₹" . htmlspecialchars($row['price']) . "</p>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>No packages found for this destination.</p>";
    }
    ?>

</body>
</html>

<?php
$conn->close();
?>

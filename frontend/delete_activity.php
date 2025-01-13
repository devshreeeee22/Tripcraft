<?php
include('../backend/db.php');
$conn = mysqli_connect("localhost", "root", "", "tripcraft");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['destination'])) {
    $id = intval($_GET['id']);
    $destination = mysqli_real_escape_string($conn, $_GET['destination']);

    // Prepare the SQL statement
    $sql = "DELETE FROM itinerary_activities WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Activity deleted successfully!');
                window.location.href='fetch_itinerary.php?destination=" . urlencode($destination) . "';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting activity.');
                window.history.back();
              </script>";
    }

    $stmt->close();
} else {
    echo "<script>
            alert('Invalid request. Destination or activity ID missing.');
            window.history.back();
          </script>";
}

$conn->close();
?>

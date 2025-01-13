<?php
include('../backend/db.php');
$conn = mysqli_connect("localhost", "root", "", "tripcraft");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']);
$destination = mysqli_real_escape_string($conn, $_GET['destination'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $activity = mysqli_real_escape_string($conn, $_POST['activity']);
    $time_of_day = mysqli_real_escape_string($conn, $_POST['time_of_day']);
    $day = intval($_POST['day']);

    // Update the activity in the database
    $sql = "UPDATE itinerary_activities SET activity = ?, time_of_day = ?, day = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $activity, $time_of_day, $day, $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Activity updated successfully!');
                window.location.href='fetch_itinerary.php?destination=" . urlencode($destination) . "';
              </script>";
    } else {
        echo "<script>alert('Error updating activity.');</script>";
    }

    $stmt->close();
    $conn->close();
    exit;
}

// Fetch the existing activity details
$sql = "SELECT * FROM itinerary_activities WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Activity not found.'); window.history.back();</script>";
    exit;
}

$activity = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Activity</title>
    <link rel="stylesheet" href="../main.css">
    <style>
        body {
            align-items: center;
            justify-content: center;
        }
        
        .search-header { 
            width: 80%;
            /* height: 95vh; */
            border: 1px solid white;
            margin: auto;
        }

        .search-header nav {
            width: 95%;
            height: 7%;
            /* border: 1px solid white; */
            /* margin: auto; */
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            position: fixed;
            left: 1%;
            margin-bottom: 30px;
            background-color: #ed8de7;
            color: white;
            font-family: 'ubuntu';
            letter-spacing: 5px;
            padding: 10px 20px;
        }

        .search-header nav ul {
            display: flex;
            list-style: none;
        }

        .search-header nav ul li {
            padding: 3px 15px;;
            text-decoration: none;
            transition: all .3s linear;
            font-weight: 50;
        }

        .search-header nav ul li:hover {
            transform: scale(1.05);
            color: rgb(255, 213, 0);
            /* text-decoration: underline; */
        }

        .search-header nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 17px;
            font-weight: 500;
        }
        .container{
            border: 1px solid black;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 100px;
            border-radius: 20px;
            background: rgba(182, 113, 182, 0.9);
            margin-bottom: 50px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="search-header">
            <nav>
                    <h1 class="logo" href="./home.html">TRIPCRAFT</h1>
                    <ul>
                        <li><a href="./home.php">Home</a></li>
                        <li><a href="./budget.php">Budget</a></li>
                        <li><a href="./packages.php">Packages</a></li>
                        <li><a href="./location_plan.php">Plan Trip</a></li>
                    </ul>
                    </div>
                    <i class="bi bi-three-dots"></i>
            </nav>
    </div>
    <div class="container">
        <h1>Edit Activity</h1>
        <form action="" method="POST">
            <label for="activity">Activity:</label><br>
            <input type="text" id="activity" name="activity" value="<?php echo htmlspecialchars($activity['activity']); ?>" required><br><br>

            <label for="time_of_day">Time of Day:</label><br>
            <input type="text" id="time_of_day" name="time_of_day" value="<?php echo htmlspecialchars($activity['time_of_day']); ?>" required><br><br>

            <label for="day">Day:</label><br>
            <input type="number" id="day" name="day" value="<?php echo htmlspecialchars($activity['day']); ?>" required><br><br>

            <button type="submit">Update Activity</button>
        </form>
        <a href="fetch_itinerary.php?destination=<?php echo urlencode($destination); ?>">Cancel</a>
    </div>
    <?php
    include('./footer.php');
    ?>
</body>
</html>

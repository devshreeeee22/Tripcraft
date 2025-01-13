<?php
include '../backend/db.php';
$conn = mysqli_connect("localhost", "root", "", "tripcraft");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$destination = mysqli_real_escape_string($conn, $_GET['destination'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tripcraft Packages</title>
    <link rel="stylesheet" href="../main.css">
    <link href="https://fonts.googleapis.com/css2?family=Almendra:ital,wght@0,400;0,700;1,400;1,700&family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
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
        .packages-section {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 100px;
        }
        .package {
            width: 90vh;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s;
        }
        .package img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .package:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .info {
            padding: 15px;
        }
        .package-name {
            font-size: 20px;
            font-weight: bold;
        }
        .package-price {
            color: #8e1494;
            font-size: 18px;
            margin-top: 10px;
        }
        .quick-view a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #8e1494;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .quick-view a:hover {
            background-color: #5e0d66;
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

    <div class="packages-section">
        
        <?php
        if ($destination) {
            $sql = "SELECT * FROM travel_packages WHERE destination LIKE ?";
            $stmt = $conn->prepare($sql);
            $searchTerm = "%$destination%";
            $stmt->bind_param("s", $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='package'>";
                    echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['destination']) . "'>";
                    echo "<div class='info'>";
                    echo "<h4 class='package-name'>" . htmlspecialchars($row['package_name']) . "</h4>";
                    echo "<p class='package-price'>₹" . htmlspecialchars($row['price']) . "</p>";
                    echo "</div>";
                    echo "<div class='quick-view'>";
                    echo "<a href='./package_details.php?id=" . htmlspecialchars($row['id']) . "' class='quick-view'>Quick View</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No packages found for the selected destination.</p>";
            }

            $stmt->close();
        

        } else {
            echo "<p>Please enter a destination to search for packages.</p>";
        }
        $conn->close();
        ?>
    </div>
    <?php
    include('./footer.php');
    ?>
</body>
</html>

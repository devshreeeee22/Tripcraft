<?php 
$conn = new mysqli('localhost', 'root', '', 'tripcraft');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$destination = $_POST['destination'];
$travelStyle = $_POST['travelStyle'];
$days = intval($_POST['days']);
$travellers = intval($_POST['numPeople']);

$columnPrefix = '';
switch ($travelStyle) {
    case 'budget':
        $columnPrefix = 'Budget';
        break;
    case 'midrange':
        $columnPrefix = 'Midrange';
        break;
    case 'luxury':
        $columnPrefix = 'Luxury';
        break;
}

$sql = "SELECT 
            {$columnPrefix}_Accommodation_Cost AS accommodation,
            {$columnPrefix}_Food_Cost AS food,
            {$columnPrefix}_Transport_Cost AS transport,
            {$columnPrefix}_Activity_Cost AS activities
        FROM budgets
        WHERE Destination = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $destination);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tripcraft Travel Budget</title>
    <style>
        body {
            background-image: url('../Images/budget2.png'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh; 
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .budget-header { 
            width: 80%;
            /* height: 95vh; */
            border: 1px solid white;
            margin: auto;
        }

        .budget-header nav {
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

        .budget-header nav ul {
            display: flex;
            list-style: none;
        }

        .budget-header nav ul li {
            padding: 3px 15px;;
            text-decoration: none;
            transition: all .3s linear;
            font-weight: 50;
        }

        .budget-header nav ul li:hover {
            transform: scale(1.05);
            color: rgb(255, 213, 0);
        }

        .budget-header nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 17px;
            font-weight: 500;
        }
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10%);
            }
            10% {
                opacity: 1;
                transform: translateY(0%);
            }
        }
        #container {
            max-width: 1000px;
            margin: 100px auto;
            padding: 50px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeIn 6s ease-in-out forwards;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }

        .card {
            margin-bottom: 15px;
            padding: 15px;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
        }

        .highlight {
            font-weight: bold;
            color: #3b82f6;
        }

        .cta {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="budget-header">
            <nav>
                    <h1 class="logo" href="./home.html">TRIPCRAFT</h1>
                    <ul>
                        <li><a href="../home.html">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="./packages.php">Packages</a></li>
                    </ul>
                    </div>
                    <i class="bi bi-three-dots"></i>
            </nav>
    </div>
    <div id="container">
        <?php
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalCostPerDay = $row['accommodation'] + $row['food'] + $row['transport'] + $row['activities'];
            $totalCost = $totalCostPerDay * $days * $travellers;

            echo "<h1 class='text-center text-3xl font-semibold mb-6'>Travel Budget for $destination</h1>";
            echo "<div class='card'>";
            echo "<p><span class='highlight'>Travel Style:</span> " . ucfirst($travelStyle) . "</p>";
            echo "<p><span class='highlight'>Number of Days:</span> $days</p>";
            echo "</div>";

            echo "<div class='card'>";
            echo "<p><span class='highlight'>Total Cost Per Day:</span> ₹" . number_format($totalCostPerDay, 2) . "</p>";
            echo "<p><span class='highlight'>Estimated Total Cost for $days days for $travellers people:</span> ₹" . number_format($totalCost, 2) . "</p>";
            echo "</div>";

            echo "<div class='cta'>";
            echo "<a href='../frontend/budget.php' class='text-blue-500 underline'>Back to Calculator</a>";
            echo "</div>";
        } else {
            echo "<p>No data available for the selected destination and travel style.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>

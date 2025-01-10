<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Budget Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url(../Images/budget.jpg) no-repeat center center/cover;
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
            /* text-decoration: underline; */
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
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeIn 6s ease-in-out forwards;
            background-color: rgba(255, 255, 255, 0.8);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color:rgb(49, 132, 53);
            transform: scale(1.05);
        }
        .slider-container {
            margin: 20px 0;
        }
        .slider-value {
            text-align: right;
            font-size: 14px;
            margin-top: -10px;
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
        <h1>Travel Budget Calculator</h1>
        <form action="../backend/budget.php" method="POST">
        <label for="destination">Select Destination:</label>
            <select id="destination" name="destination" required>
                <option value="">-- Select a City --</option>
                <?php
                $conn = new mysqli('localhost', 'root', '', 'tripcraft');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT DISTINCT Destination FROM budgets ORDER BY Destination";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['Destination']) . "'>" . htmlspecialchars($row['Destination']) . "</option>";
                    }
                } else {
                    echo "<option value=''>No cities available</option>";
                }

                $conn->close();
                ?>
            </select>

            <label for="travelStyle">Select Travel Style:</label>
            <select id="travelStyle" name="travelStyle" required>
                <option value="">-- Select Style --</option>
                <option value="budget">Budget</option>
                <option value="midrange">Midrange</option>
                <option value="luxury">Luxury</option>
            </select>
            <label for="numPeople">How many people are going on this trip?</label>
            <input type="number" id="numPeople" name="numPeople" min="1" value="1" required>

            <label for="days">How many nights will you sleep at your destination?</label>
            <input type="number" id="days" name="days" min="1" value="1" required>
 
            <div class="slider-container">
                <label for="airfare">Round-trip airfare/train-fare per person:</label>
                <input type="range" id="airfare" name="airfare" min="0" max="100000" step="50" value="100" oninput="updateSliderValue('airfareValue', this.value)">
                <div class="slider-value">
                    <span id="airfareValue">Rs.10000</span> per person
                </div>
            </div>

            <button type="submit">Calculate</button>
        </form>
    </div>

    <script>
        function updateSliderValue(spanId, value) {
            document.getElementById(spanId).innerText = `Rs.${value}`;
        }
    </script>
</body>
</html>

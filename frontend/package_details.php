<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tripcraft";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch package details using the ID
if (isset($_GET['id'])) {
    $packageId = intval($_GET['id']);
    $sql = "SELECT * FROM travel_packages WHERE id = $packageId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $package = $result->fetch_assoc();
    } else {
        echo "Package not found!";
        exit;
    }
} else {
    echo "No package selected!";
    exit;
}
$accordionDetails = [];
$sqlAccordion = "SELECT * FROM package_details WHERE package_id = $packageId";
$resultAccordion = $conn->query($sqlAccordion);

if ($resultAccordion->num_rows > 0) {
    while ($row = $resultAccordion->fetch_assoc()) {
        $accordionDetails[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $package['package_name']; ?>Tripcraft- Package Details</title>
    <link rel="stylesheet" href="../main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra:ital,wght@0,400;0,700;1,400;1,700&family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playwrite+MX+Guides&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            /* line-height: 1.6; */
        }
        .package-details-header {
            width: 80%;
            /* height: 95vh; */
            border: 1px solid white;
            margin: auto;
        }

        .package-details-header nav {
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

        .package-details-header nav ul {
            display: flex;
            list-style: none;
        }

        .package-details-header nav ul li {
            padding: 3px 15px;;
            text-decoration: none;
            transition: all .3s linear;
            font-weight: 50;
        }

        .package-details-header nav ul li:hover {
            transform: scale(1.05);
            color: rgb(255, 213, 0);
            /* text-decoration: underline; */
        }

        .package-details-header nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 17px;
            font-weight: 500;
        }

        main {
            max-width: 1200px;
            margin:100px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 30px;
            border: 1px solid white;
        }

        main img {
            width: 100%;
            height: auto;
            max-width: 800px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        main h2 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #8e1494;
        }

        main p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #555;
        }

        main p strong {
            font-weight: 600;
            color: #333;
        }

        .details-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: flex-start;
            justify-content: space-between;
        }

        .details-container .details-text {
            flex: 1;
            min-width: 300px;
        }

        .details-container .details-image {
            flex: 1;
            min-width: 300px;
        }
        footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            background: #8e1494;
            color: #fff;
            font-size: 14px;
        }

        footer a {
            color: #ffffff;
            text-decoration: underline;
        }

        footer a:hover {
            color: #f06459;
        }
        .accordion {
            margin-top: 20px;
        }

        .accordion-item {
            border: 1px solid white;
            margin-bottom: 10px;
            border-radius: 5px;
            overflow: hidden;
        }
        .accordion-item a {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 40px;
            text-decoration: none;
            transition: .5s ease;
        }

        .accordion-header {
            background: white;
            padding: 15px;
            cursor: pointer;
            font-weight: bold;
        }

        .accordion-header:hover {
            background: #e2e2e2;
        }

        .accordion-content {
            display: none;
            padding: 15px;
            background: #fff;
        }

        .accordion-content:target {
            display: block;
        }
        .accordion-icon i {
            color: #8e1494;
        }
    </style>

</head>
<body>
    <div class="package-details-pg">
        <!-- <header class="header">
                <nav>
                        <h1 class="logo" href="./home.html">TRIPCRAFT</h1>
                        <ul>
                            <li><a href="./home.html">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="./packages.php">Packages</a></li>
                            <li><a href="#book">Book</a></li> 
                            <li><a href="#Contact">Contact</a></li> 
                        </ul>
                        

                        </div>
                        <i class="bi bi-three-dots"></i>
                </nav>
                
        </header>  -->
        <div class="package-details-header">
                <nav>
                        <h1 class="logo" href="./home.html">TRIPCRAFT</h1>
                        <ul>
                            <li><a href="./home.html">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="./packages.php">Packages</a></li>
                            <li><a href="#book">Book</a></li> 
                            <li><a href="#Contact">Contact</a></li> 
                        </ul>
                        

                        </div>
                        <i class="bi bi-three-dots"></i>
                </nav>
        </div>
        <main>

            <div class="details-container">
                <div class="details-image">
                    <img src="<?php echo $package['image_url']; ?>" alt="<?php echo $package['package_name']; ?>">
                </div>
                <div class="details-text">
                    <h2><?php echo $package['package_name']; ?></h2>
                    <p><strong>Price:</strong> ₹<?php echo $package['price']; ?></p>
                    <p><strong>Description:</strong> <?php echo $package['description']; ?></p>
                    <p><strong>Destination:</strong> <?php echo $package['destination']; ?></p>
                </div>
            </div>
            <div class="accordion">
                    <?php foreach ($accordionDetails as $index => $detail): ?>
                        <div class="accordion-item">
                            <a href="#content-<?php echo $index; ?>" class="accordion-header">
                                <?php echo $detail['title']; ?>
                                <span class="accordion-icon"><i class="bi bi-plus"></i></span>
                            </a>
                            
                            <i class="bi bi-plus"></i>
                            <div class="accordion-content" id="content-<?php echo $index; ?>">
                                <?php echo nl2br($detail['content']); ?>
                            </div>
                        </div>
                        <hr style="color:#ed8de7">
                    <?php endforeach; ?>
            </div>
        </main>

    </div>

    <footer>
        &copy; 2025 Tripcraft. All rights reserved. | <a href="#">Privacy Policy</a>
    </footer>

</body>
</html>

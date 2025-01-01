<?php
include '../backend/db.php';
$conn = mysqli_connect("localhost","root","","tripcraft");
$sql = "SELECT * from travel_packages";
$result= mysqli_query($conn,$sql);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tripcraft Packages</title>
    <link rel="stylesheet" href="../main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra:ital,wght@0,400;0,700;1,400;1,700&family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playwrite+MX+Guides&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f5f5f5;
        }
        /* .filter-section {
            width: 20%;
            padding: 20px;
            background: #f8f8f8;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */
        .packages-section {
            width: 95%;
            padding: 20px;
            left: 0%;
            top: 10%;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            border: 1px solid white;
            align-items: center;
            justify-content: center;
        }
        .package-cont {
            margin-top: 80px;
            display: flex;
            width: 95%;
            height:180px;
            border: 1px solid white;
            text-align: center;
            flex-direction: column;
            justify-content: center;
            align-items:center;
            border-radius: 30px;
            margin-bottom: 0px;
        }
        .package-cont h1 {
            font-family: "Almendra", serif;
            font-weight: 700;
            font-style: italic;
            font-size: 70px;
            color: #000;

        }
        .package-cont h1 span {
            font-family: "Almendra", serif;
            font-weight: 700;
            font-style: italic;
            font-size: 70px;
            color: #8e1494;
            
            
        }
        .package-cont p {
            letter-spacing: 3px;
            margin-top:0;
            margin-bottom: 120px;
        }
        .package {
            width: 300px;
            border: 1px solid white;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
            position: relative;
        }
        .package img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: all .7s ease-out;
        }
        .package:hover {
            transform: scale(1.08);
            transform: translateY(-7%);
            box-shadow: 2px 2px 4px #8e1494;
        }
        /* .hover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }  */
        .package:hover .hover-overlay {
            opacity: 1;
        }
        .info {
            padding: 10px;
        }
        .package-name {
            font-family: "Almendra", serif;
            font-weight: 500;
            font-style: normal;
            font-size: 24px;
            margin-top:0;
            text-align: left;
        }
        .package-hidden-cont {
            padding:15px 1rem;
            background-color: white;
            border: 1px solid white;
            color: black;
            transform: translateY(-10%);
            transition: .3s ease;
        }
        .quick-view {
            position: absolute;
            bottom: 45px;
            left: 0;
            width: 100%;
            background-color: rgba(239, 233, 233, 0.6);
            color: black;
            font-size: 20px;
            padding: 3px 0;
            text-align: center;
            transform: translateY(-30px);
            opacity: 0;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
        }

        .package:hover .quick-view {
            transform: translateY(0);
            opacity: 1;
        }

        .package-price {
            position: absolute;
            top: 4px;
            left: 10px;
            background-color: #f06459;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 3px;
            z-index: 2;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>
    <?php
        // include("../backend/db.php");
        // include("./header.php");
    ?>
    <div class="packages-pg">
        <header class="header">
            <nav>
                    <h1 class="logo" href="./home.html">TRIPCRAFT</h1>
                    <ul>
                        <li><a href="./home.html">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="./packages.php">Packages</a></li>
                        <li><a href="#book">Book</a></li> 
                        <!-- <li><a href="#Contact">Contact</a></li> -->
                    </ul>
                    

                    </div>
                    <i class="bi bi-three-dots"></i>
            </nav>
            
        </header>     
        <div class="packages-section">
            <div class="package-cont">
                <h1>Discover Your <span>Perfect</span> Journery</h1>
                <p>From thrilling expeditions to cultural escapades, find your ideal journey.</p>
            </div>
            
            <?php

            while($row=mysqli_fetch_assoc($result))

            {

            ?>
            <div class='package'>
                <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['destination']; ?>">
                
                <div class='info'>
                    <h4 class="package-name"><?php echo $row['package_name']?></h4>
                    <p class="package-price">₹</i><?php echo $row['price']?></p>
                </div>
                <!-- <button href="#"  class="package-btn">Enquire</button> -->
                <div class="quick-view">
                    <a href="./package_details.php?id=<?php echo $row['id']; ?>" class="quick-view">Quick View</a>
                </div>
            </div>

            <?php
            }
                

            ?>
            
        </div>
    </div>

</body>
</html>

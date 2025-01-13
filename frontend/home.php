<?php
include('../backend/db.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>TripCraft</title>
        <link href="../main.css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Almendra:ital,wght@0,400;0,700;1,400;1,700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
    </head>
    <body>
        <header class="header">
            <nav>
                <h1 class="logo" href="./home.php">TRIPCRAFT</h1>
                <ul>
                        <li><a href="./home.php">Home</a></li>
                        <li><a href="./budget.php">Budget</a></li>
                        <li><a href="./packages.php">Packages</a></li>
                        <li><a href="./location_plan.php">Plan Trip</a></li>
                        <li><a href="./login.php" class="btn">Login</a></li>
                        <li><a href="./signup.php" class="btn">Sign Up</a></li>
                </ul>
                

                </div>
                <i class="bi bi-three-dots"></i>
            </nav>
            <div class="content">
                <div class="cont_box">
                    <h1>Your dream travel plan at your fingertips.</h1>
                    <p>Turning travel dreams into beautifully crafted itineraries</p>
                    
                    

                </div>
                
                <form action="./search_result.php" method="GET" class="trip_box">
                    <div class="search_box">
                        
                        <div class="card">
                            <h4>Location <i class="bi bi-caret-down-fill"></i></h4>
                            <select name="destination">
                                <?php
                                $sql = "SELECT name FROM destinations";
                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . htmlspecialchars($row['name']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="card">
                            <h4>Date <i class="bi bi-caret-down-fill"></i></h4>
                            <input type="date" name="travel_date" min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="card">
                            <h4>People <i class="bi bi-caret-down-fill"></i></h4>
                            <input type="number" placeholder="How many People?" min="1" max="20">
                        </div>
                        <!-- <input type="button" value="Explore Now"> -->
                        <button type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>

                 
                  
                
               
            </div>
            <section id="about">
                <div class="container">
                    <div class="about-content">
                        <div class="leftside">
                            <p class="normal-text">THE BEST TRAVEL AGENCY</p>
                            <h1>DISCOVER THE <span>WORLD</span> WITH OUR GUIDE</h1>
                            <p>
                                You can choose any country with good tourism.Whether you are planning a relaxing getaway, an adventurous expedition, or a luxurious escape, we’ve got you covered. With years of experience and a passion for crafting unforgettable journeys, we ensure your trip is nothing less than extraordinary.
                            </p>
                            <ul>
                                <li>
                                    <div class="icons">
                                        <i class="bi bi-check-lg"></i>
                                        <p>20+ Years Of Experience</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icons">
                                        <i class="bi bi-check-lg"></i>
                                        <p>Best itineraries</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icons">
                                        <i class="bi bi-telephone-fill"></i>
                                        <p>818 818 8888</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="rightside">
                            <div class="img">
                                <img src="../Images/img5.avif" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="choose-place">
                <div class="container">
                    <p class="choose-place">CHOOSE YOUR PLACE</p>
                    <h2 class="popular-tours">POPULAR <span>TOURS</span></h2>
                    <div class="choose">
                        <div class="img-leftside">
                            <div class="lg-img">
                                <img class="maldives" src="../Images/andaman.png"  alt="" />
                                <div class="img-content">
                                    <h2>Andaman Tours</h2>
                                    <div class="hidden-content">
                                        <span><i class="bi bi-clock-fill"></i> 5 Days </span>
                                        <span><i class="bi bi-person-fill"></i> 12+ </span>
                                        <span><i class="bi bi-geo-alt-fill"></i> Andaman </span>
                                    </div>
                                </div>
                                <div class="price">
                                    <p> Rs. 45000 </p>
                                </div>
                            </div>
                        </div>
                        <div class="img-rightside">
                            <div class="lg-img">
                                <img class="italy" src="../Images/shimla.avif"  alt="" />
                                <div class="img-content">
                                    <h2>Shimla Tours</h2>
                                    <div class="hidden-content">
                                        <span><i class="bi bi-clock-fill"></i> 4 Days </span>
                                        <span><i class="bi bi-person-fill"></i> 12+ </span>
                                        <span><i class="bi bi-geo-alt-fill"></i> Shimla </span>
                                    </div>
                                </div>
                                <div class="price">
                                    <p> Rs. 25000 </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row-wise-img">
                        <div class="lg-img">
                            <img class="france" src="./Images/france.jpeg"  alt="" />
                            <div class="img-content">
                                <h2>France Tours</h2>
                                <div class="hidden-content">
                                    <span><i class="bi bi-clock-fill"></i> 10 Days </span>
                                    <span><i class="bi bi-person-fill"></i> 12+ </span>
                                    <span><i class="bi bi-geo-alt-fill"></i> France </span>
                                </div>
                            </div>
                            <div class="price">
                                <p> Rs. 15000 </p>
                            </div>
                        </div>
                        <div class="lg-img">
                            <img class="greece" src="./Images/greece2.jpg"  alt="" />
                            <div class="img-content">
                                <h2>Greece Tours</h2>
                                <div class="hidden-content">
                                    <span><i class="bi bi-clock-fill"></i> 10 Days </span>
                                    <span><i class="bi bi-person-fill"></i> 12+ </span>
                                    <span><i class="bi bi-geo-alt-fill"></i> Greece </span>
                                </div>
                            </div>
                            <div class="price">
                                <p> Rs. 15000 </p>
                            </div>
                        </div>
                    </div> -->
                </div>
                </div>
            </section> 
            <!-- <section id="static-counter">
                <div class="container">
                    <div class="static-wrapper">
                        <div class="static-icons">
                            <i class="bi bi-airplane-fill"></i>
                            <p class="number">600</p>
                            <p class="txt">Flight Booking</p>
                        </div>
                        <div class="static-icons">
                            <i class="bi bi-airplane-fill"></i>
                            <p class="number">250</p>
                            <p class="txt">Amazing Tours</p>
                        </div>
                        <div class="static-icons">
                            <i class="bi bi-airplane-fill"></i>
                            <p class="number">100</p>
                            <p class="txt">Cruises Booking</p>
                        </div>
                        <div class="static-icons">
                            <i class="bi bi-airplane-fill"></i>
                            <p class="number">600</p>
                            <p class="txt">Tickets Booking</p>
                        </div>
                    </div>
                </div>
            </section> -->

            <?php
                include('./footer.php');
            ?>
        </header>

    </body>

</html>
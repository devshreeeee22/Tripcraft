<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tripcraft-Plan Your Trip</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra:ital,wght@0,400;0,700;1,400;1,700&family=Dancing+Script:wght@400..700&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playwrite+MX+Guides&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sixtyfour&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
            color: #333;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                url(../Images/location.webp) no-repeat center center/cover;
        }
        .plan-trip-header { 
            width: 80%;
            /* height: 95vh; */
            border: 1px solid white;
            margin: auto;
        }

        .plan-trip-header nav {
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

        .plan-trip-header nav ul {
            display: flex;
            list-style: none;
        }

        .plan-trip-header nav ul li {
            padding: 3px 15px;;
            text-decoration: none;
            transition: all .3s linear;
            font-weight: 50;
        }

        .plan-trip-header nav ul li:hover {
            transform: scale(1.05);
            color: rgb(255, 213, 0);
            /* text-decoration: underline; */
        }

        .plan-trip-header nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 17px;
            font-weight: 500;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
        }

        .left {
            max-width: 60%;
            margin-left: 10%;
            margin-right: 10%;
        }

        .left h1 {
            color: white;
            font-size: 4rem;
            font-family: "Ubuntu", serif;
            font-weight: 400;
            font-style: normal;
            letter-spacing: 5px;
            animation: fadeIn 6s ease-in-out forwards;
            line-height: 1.2;
            margin-bottom: 15px;
            margin-left: 30%;
            margin-top: 15%;
            margin-right: 4rem;
        }

        .right {
            background: rgba(135, 134, 135, 0.9);
            padding: 20px 30px;
            border-radius: 15px;
            width: 60%;
            align-items: center;
            margin-top: 10%;
            animation: fadeIn 6s ease-in-out forwards;
        }

        .right h2 {

            font-size: 2rem;
            margin-bottom: 15px;
            color: white;
            text-align: center;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-group input,
        .form-group select,
        .form-row input,
        .form-row select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group label,
        .form-row label {
            margin-bottom: 5px;
            font-size: 0.9rem;
            color: #333;
        }

        .btn {
            background-color: #5a67d8;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            
            text-align: center;
        }

        .btn:hover {
            background-color: #434190;
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
        .form-row {
            display: flex;
            padding: 10px;
            border-radius: 5px;
            font-size: 1rem;
            margin: 10px;
            gap: 1rem;
        }
    </style>
</head>
<body>
    <div class="plan-trip-header">
            <nav>
                    <h1 class="logo" href="./home.html">TRIPCRAFT</h1>
                    <ul>
                        <li><a href="../home.html">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="./packages.php">Packages</a></li>
                        <li><a href="#book">Book</a></li> 
                        <li><a href="#Contact">Contact</a></li> 
                    </ul>
                    

                    </div>
                    <i class="bi bi-three-dots"></i>
            </nav>
    </div>
    <div class="container">
        <div class="left">
            <h1>Plan your next trip to India in seconds</h1>
        </div>
        <div class="right">
            <h2>Create a day-by-day trip plan customized to you!</h2>
            <form action="./plan_trip.php" method="POST">
                <div class="form-group">
                    <label for="destination">Enter destination (city)</label>
                    <input type="text" id="destination" placeholder="Enter destination">
                    <button onclick="fetchPlaces()">Get Places</button>
                </div>
                <div class="form-group">
                    <label for="dates">Dates</label>
                    <input type="date" id="dates">
                </div>
                <div class="form-row">
                    <label for="guests">Guests</label>
                    <select id="guests1">
                        <option>1 Adult</option>
                        <option>2 Adults</option>
                        <option>3 Adults</option>
                    </select>
                    <select id="guests2">
                        <option>0 Children</option>
                        <option>1 Children</option>
                        <option>2 Children</option>
                        <option>3 Children</option>
                        <option>4 Children</option>
                        <option>5 Children</option>
                    </select>
                </div>
                <button class="btn" type="submit">Plan my trip</button>
            </form>
        </div>
    </div>
</body>
</html>
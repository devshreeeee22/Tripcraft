<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tripcraft: Enquire Now</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
            color: #333;
            background: url(../Images/enquire-bg.jpg) no-repeat center center/cover;
            opacity:0.9;
        }
        .enquire-header { 
            width: 80%;
            /* height: 95vh; */
            border: 1px solid white;
            margin: auto;
        }

        .enquire-header nav {
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

        .enquire-header nav ul {
            display: flex;
            list-style: none;
        }

        .enquire-header nav ul li {
            padding: 3px 15px;;
            text-decoration: none;
            transition: all .3s linear;
            font-weight: 50;
        }

        .enquire-header nav ul li:hover {
            transform: scale(1.05);
            color: rgb(255, 213, 0);
            /* text-decoration: underline; */
        }

        .enquire-header nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 17px;
            font-weight: 500;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .form-box {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            text-align: center;
            margin-top: 3%;
        }

        h1 {
            margin-bottom: 10px;
            font-size: 2rem;
            color: black;
        }

        p {
            margin-bottom: 20px;
            font-size: 0.9rem;
            color: #666;
        }

        .form-row {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .form-row input {
            flex: 1;
            padding: 10px;
            font-size: 0.9rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        textarea {
            width: 100%;
            padding: 10px;
            font-size: 0.9rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
            resize: none;
            outline: none;
        }

        label {
            font-size: 0.9rem;
            margin-right: 10px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input::placeholder,
        textarea::placeholder {
            color: #aaa;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="enquire-header">
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

        <div class="form-box">
            <h1>Enquire Now!</h1>
            <p>Travel with us for an unforgettable journey. Fill in your details to get started!</p>
            <form action="../backend/enquiry_backend.php" method="POST">
                <div class="form-row">
                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-row">
                    <input type="tel" name="phone" placeholder="Phone" required>
                    <input type="text" name="postcode" placeholder="Post Code">
                </div>
                <div class="form-row">
                    <input type="date" name="departure_date" placeholder="Departure Date (Optional)">
                    <input type="text" name="travel_length" placeholder="Length of Travel">
                </div>
                <textarea name="who_traveling" placeholder="Who are travelling? (Numbers & ages of adults/ seniors/ children)" rows="2"></textarea>
                <textarea name="message" placeholder="Other questions or requirements of your enquiry?" rows="4"></textarea>
                <div class="form-row">
                    <label>
                        <input type="radio" name="contact_method" value="email" required> Email
                    </label>
                    <label>
                        <input type="radio" name="contact_method" value="phone"> Phone
                    </label>
                </div>
                <input type="text" name="referral" placeholder="How did you find us?">
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>

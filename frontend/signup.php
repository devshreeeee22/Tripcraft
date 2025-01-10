<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tripcraft Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: url(../Images/signup2.webp) no-repeat center center/cover;
        }
        .login-header { 
            width: 80%;
            /* height: 95vh; */
            border: 1px solid white;
            margin: auto;
        }

        .login-header nav {
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

        .login-header nav ul {
            display: flex;
            list-style: none;
        }

        .login-header nav ul li {
            padding: 3px 15px;;
            text-decoration: none;
            transition: all .3s linear;
            font-weight: 50;
        }

        .login-header nav ul li:hover {
            transform: scale(1.05);
            color: rgb(255, 213, 0);
            /* text-decoration: underline; */
        }

        .login-header nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 17px;
            font-weight: 500;
        }
        #login-box {
            animation: fadeIn 6s ease-in-out forwards;
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

    </style>
</head>

<body class="bg-gray-100">
    <div class="login-header">
            <nav>
                    <h1 class="logo" href="./home.html">TRIPCRAFT</h1>
                    <ul>
                        <li><a href="../home.html">Home</a></li>
                        <li><a href="#about">About</a></li>
                    </ul>
                    </div>
                    <i class="bi bi-three-dots"></i>
            </nav>
    </div>
    <div class="min-h-screen flex items-center justify-center">
        
        <div id="login-box" class="bg-white bg-opacity-90 shadow-lg rounded-lg p-8 max-w-xl w-full">
            <h2 class="text-2xl font-bold text-center mb-6">Sign Up</h2>
            <p class="text-center text-black mb-8">Join us to start your next adventure!</p>
            <form action="../backend/signup_backend.php" method="POST">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                </div>  
                <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 px-3 py-2 border rounded-md w-full">
                </div>
                <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 px-3 py-2 border rounded-md w-full">
                </div>
                <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Login</button>
                <div class="mt-6 text-center">
                    <p class="font-bold text-black">Already have an account? <a href="./login.php" class="text-purple-500 hover:underline">Login here</a></p>
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>
<?php
session_start();

// Check if the user is already logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Process logout request
if (isset($_POST['logout'])) {
    // Clear session data
    session_destroy();
    header("Location: login.php"); // Redirect to login page after logout
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your styles here -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1590567887024-e1c288e6b0a4'); /* Grocery-related background */
background-size: cover;

            background-position: center;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-size: 16px;
        }

        .logout-container {
            background-color: rgba(0, 0, 0, 0.7); /* Darker, richer background */
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px); /* Adds a slight blur to background */
        }

        h1 {
            color: #ff6347; /* Warm Coral color for the header */
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            color: #f9f9f9;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .logout-form {
            font-size: 18px;
        }

        .input-field {
            margin: 10px 0;
            padding: 12px;
            width: 100%;
            border: 1px solid #fff;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.3); /* Semi-transparent input field */
            color: #fff;
        }

        .btn {
            background-color: #4CAF50; /* Vibrant Green button */
            color: white;
            padding: 15px 32px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2193b0; /* Bright Blue color for the link */
            font-weight: bold;
            font-size: 18px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="logout-container">
    <h1>Are you sure you want to log out?</h1>
    <p>Before you go, please confirm your username and password to log out safely!</p>

    <form action="logout.php" method="POST" class="logout-form">
        <input type="text" name="username" class="input-field" placeholder="Enter your username" required><br>
        <input type="password" name="password" class="input-field" placeholder="Enter your password" required><br>

        <button type="submit" name="logout" class="btn">Log Out</button>
    </form>

    <a href="index.html" class="back-link">← Back to Home</a>
</div>

</body>
</html>

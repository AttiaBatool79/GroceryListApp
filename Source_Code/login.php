<?php
session_start(); // Start the session
include('test_connection.php'); // Include the database connection

// Logout functionality
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Destroy the session to log out the user
    session_destroy();
    echo "<script>alert('You have been logged out.');</script>";
    header("Location: login_logout.php");
    exit();
}

// Login functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_GET['action'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    // If user exists and password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Store user info in session to keep them logged in
        $_SESSION['username'] = $username;

        // Redirect to home.php after successful login
        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Invalid credentials!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery List - Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://images.unsplash.com/photo-1606788075763-0e50c1a4d6a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            text-align: center;
            width: 350px;
        }

        h2 {
            margin-bottom: 20px;
            color: #2c3e50;
            font-size: 28px;
        }

        form input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        form button {
            width: 95%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            background-color: #27ae60;
            color: white;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #219150;
        }

        p {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }

        p a {
            color: #27ae60;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }

        .logout-button {
            background-color: #e74c3c;
            color: white;
            padding: 12px 32px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<?php
// If user is logged in, show the logout option
if (isset($_SESSION['username'])) {
    echo "
        <div class='container'>
            <h2>Welcome, " . $_SESSION['username'] . "!</h2>
            <a href='login_logout.php?action=logout' class='logout-button'>Log Out</a>
        </div>
    ";
} else {
    // If user is not logged in, show the login form
    echo "
        <div class='container'>
            <h2>Welcome Back!</h2>
            <form action='login_logout.php' method='POST'>
                <input type='text' name='username' placeholder='Enter your username' required>
                <input type='password' name='password' placeholder='Enter your password' required>
                <button type='submit'>Login</button>
            </form>
            <p>Don't have an account? <a href='signup.html'>Sign Up</a></p>
        </div>
    ";
}
?>

</body>
</html>

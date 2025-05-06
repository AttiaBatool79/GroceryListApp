<?php
session_start(); // Start the session

include('test_connection.php');  // Include the database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the password and confirm password match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists!";
        exit();
    }

    // Insert the new user into the database
    $insert_sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    if (mysqli_query($conn, $insert_sql)) {
        echo "Registration successful!";
        header("Location: index.html"); // Redirect to login page after successful signup
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery List - Signup</title>
    <style>
        /* Add your CSS styling here */
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Your Account</h2>
        <form action="signup.php" method="POST">
            <input type="text" name="username" placeholder="Choose a username" required>
            <input type="password" name="password" placeholder="Create a password" required>
            <input type="password" name="confirm_password" placeholder="Confirm your password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="index.html">Login</a></p>
    </div>
</body>
</html>

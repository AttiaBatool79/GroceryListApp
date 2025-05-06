<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Fetch the username from the session
$username = $_SESSION['username'];

// Display the dashboard for logged-in users
echo "Welcome to the dashboard, " . $username . "!";
?>

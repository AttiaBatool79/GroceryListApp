<?php
$host = "localhost";
$user = "root";
$password = ""; // default password is blank in XAMPP
$dbname = "attiadb";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if ($conn) {
    echo "✅ Connected to MySQL successfully!";
} else {
    die("❌ Connection failed: " . mysqli_connect_error());
}
?>

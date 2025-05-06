<?php
session_start();  // Start the session
include('test_connection.php');  // Include the correct database connection file

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");  // Redirect to login if not logged in
    exit();
}

$username = $_SESSION['username'];  // Get the logged-in username

// Fetch all grocery items for the logged-in user
$sql = "SELECT id, item_name, category, quantity, price FROM grocery_items WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

echo "<h1>Welcome to the Dashboard, $username!</h1>";

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Your Grocery List</h2>";
    echo "<table>";
    echo "<tr><th>Item Name</th><th>Category</th><th>Quantity</th><th>Price (Per Item)</th><th>Total Price</th></tr>";

    // Loop through the result and calculate the total price
    while($row = mysqli_fetch_assoc($result)) {
        $total_price = $row['quantity'] * $row['price'];  // Calculate total price (quantity * price)
        echo "<tr>";
        echo "<td>" . $row['item_name'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $total_price . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Calculate the grand total
    $total_sql = "SELECT SUM(quantity * price) AS grand_total FROM grocery_items WHERE username = '$username'";
    $total_result = mysqli_query($conn, $total_sql);
    $total_row = mysqli_fetch_assoc($total_result);
    $grand_total = $total_row['grand_total'];

    echo "<h3>Grand Total: " . $grand_total . "</h3>";
} else {
    echo "<p>No items found in your grocery list.</p>";
}
?>

<!-- You can add other options like add items, view grocery list, logout below -->
<a href="add_item.php">Add Item</a>
<a href="logout.php">Logout</a>

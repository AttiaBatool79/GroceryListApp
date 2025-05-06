<?php
session_start();
include('test_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username']; // Get the logged-in username

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST['item_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Check if the item already exists in the user's grocery list
    $check_sql = "SELECT * FROM items WHERE username = '$username' AND item_name = '$item_name'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Item exists, update the quantity and price
        $update_sql = "UPDATE items SET quantity = quantity + '$quantity', price = '$price' WHERE username = '$username' AND item_name = '$item_name'";
        if (mysqli_query($conn, $update_sql)) {
            header("Location: home.php"); // fixed wrong redirection (home.html -> home.php)
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Insert a new item
        $insert_sql = "INSERT INTO items (username, item_name, category, quantity, price) VALUES ('$username', '$item_name', '$category', '$quantity', '$price')";
        if (mysqli_query($conn, $insert_sql)) {
            header("Location: home.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Grocery Item</title>
    <style>
        body {
    background: url('i.jpg') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    min-height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

        .form-container {
            background: white;
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 25px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
            font-weight: bold;
            text-align: left;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
        }
        button {
            padding: 12px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #219150;
        }
        .back-link {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #2193b0;
            font-weight: bold;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        select {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    width: 100%;
}

    </style>
</head>
<body>

<div class="form-container">
    <h2>Add a Grocery Item</h2>
    <form method="POST" action="">
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
    <option value="" disabled selected>Select a category</option>
    <option value="Dairy">Dairy</option>
    <option value="Snacks">Snacks</option>
    <option value="Vegetables">Vegetables</option>
    <option value="Fruits">Fruits</option>
    <option value="Home">Home</option>
</select>


        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>

        <label for="price">Price (Per Item):</label>
        <input type="number" step="0.01" id="price" name="price" required>

        <button type="submit">➕ Add Item</button>
    </form>

    <a href="home.php" class="back-link">← Back to Home</a>
</div>

</body>
</html>

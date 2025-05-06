<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('test_connection.php');

$username = $_SESSION['username'];

// ✅ Handle delete action
if (isset($_POST['delete_item']) && isset($_POST['item_id'])) {
    $item_id = intval($_POST['item_id']);
    $delete_sql = "DELETE FROM items WHERE id = $item_id AND username = '$username'";
    mysqli_query($conn, $delete_sql);
}

$sql = "SELECT * FROM items WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

$grand_total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Grocery List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #2193b0;
            color: white;
            margin: 0;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #27ae60;
            color: white;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .delete-button {
            background: none;
            border: none;
            color: red;
            font-size: 18px;
            cursor: pointer;
        }

        .delete-button:hover {
            color: darkred;
        }

        .grand-total {
            text-align: right;
            font-size: 18px;
            padding: 10px;
            font-weight: bold;
            color: #333;
            width: 80%;
            margin: auto;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background-color: #2193b0;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 18px;
            width: 200px;
            margin: 30px auto;
        }

        .back-link:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>

<h1>Your Grocery List</h1>

<table>
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['item_name']); ?></td>
                <td><?php echo htmlspecialchars($row['category']); ?></td>
                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                <td><?php echo htmlspecialchars($row['price']); ?></td>
                <td>
                    <?php
                    $item_total = $row['quantity'] * $row['price'];
                    $grand_total += $item_total;
                    echo number_format($item_total, 2);
                    ?>
                </td>
                <td>
                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_item" class="delete-button">🗑️</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<div class="grand-total">
    <p>Grand Total: Rs <?php echo number_format($grand_total, 2); ?></p>
</div>

<a href="home.php" class="back-link">Back to Dashboard</a>

</body>
</html>

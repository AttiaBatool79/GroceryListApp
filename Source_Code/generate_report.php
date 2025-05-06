<?php
include 'test_connection.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$conn = mysqli_connect("localhost", "root", "", "attiadb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Total expense
$query_total = "SELECT SUM(price * quantity) AS total_expense FROM items WHERE username = '$username'";
$result_total = mysqli_query($conn, $query_total);
$row_total = mysqli_fetch_assoc($result_total);
$totalExpense = $row_total['total_expense'] ?? 0;

// Total quantity
$query_quantity = "SELECT SUM(quantity) AS total_quantity FROM items WHERE username = '$username'";
$result_quantity = mysqli_query($conn, $query_quantity);
$row_quantity = mysqli_fetch_assoc($result_quantity);

// Get all unique categories used by user
$query_categories = "SELECT DISTINCT category FROM items WHERE username = '$username'";
$result_categories = mysqli_query($conn, $query_categories);

$categoryData = [];

while ($row = mysqli_fetch_assoc($result_categories)) {
    $category = $row['category'];

    $query = "SELECT SUM(quantity) AS total_items, SUM(price * quantity) AS total_value 
              FROM items 
              WHERE username = '$username' AND category = '$category'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    
    $items = $data['total_items'] ?? 0;
    $value = $data['total_value'] ?? 0;
    $percentage = $totalExpense > 0 ? ($value / $totalExpense) * 100 : 0;

    $categoryData[] = [
        'name' => $category,
        'items' => $items,
        'value' => $value,
        'percentage' => $percentage
    ];
}

// Find the top category
usort($categoryData, function($a, $b) {
    return $b['percentage'] <=> $a['percentage'];
});
$topCategory = $categoryData[0]['name'] ?? 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grocery Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        p {
            font-size: 18px;
            color: #555;
            text-align: center;
        }
        .bar-wrapper {
            margin: 20px 0;
        }
        .bar-label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .bar-container {
            background-color: #ddd;
            height: 20px;
            border-radius: 5px;
            overflow: hidden;
        }
        .bar {
            height: 100%;
            text-align: right;
            padding-right: 5px;
            line-height: 20px;
            color: white;
            background-color: #4CAF50;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: block;
            margin: 30px auto;
            text-decoration: none;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Grocery Expense Report</h1>

    <h2>Total Expense:</h2>
    <p><?php echo number_format($totalExpense, 2); ?> Pkr</p>

    <h2>Total Quantity:</h2>
    <p><?php echo $row_quantity['total_quantity'] ?? 0; ?> items</p>

    <h2 style="color: #4CAF50;">Top Spending Category:<br><br><strong style="font-size: 30px;"><?php echo $topCategory; ?></strong></h2>

    <h2>Category Contributions</h2>

    <?php foreach ($categoryData as $data): ?>
        <div class="bar-wrapper">
            <div class="bar-label"><?php echo $data['name']; ?> (<?php echo number_format($data['percentage'], 2); ?>%)</div>
            <div class="bar-container">
                <div class="bar" style="width: <?php echo $data['percentage']; ?>%;"><?php echo $data['percentage'] > 10 ? number_format($data['percentage'], 2).'%' : ''; ?></div>
            </div>
        </div>
    <?php endforeach; ?>

    <a href="home.php" class="button">← Back to Home</a>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>

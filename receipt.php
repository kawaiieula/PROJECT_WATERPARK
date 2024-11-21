<?php
session_start();
include 'db_connection.php';

// Save purchase to database
$purchase = $_SESSION['purchase'];
$user= $_SESSION['user']; // Assume the user is logged in and their ID is stored
$payment_method = $_POST['payment-method'];
$purchase_date = date('Y-m-d');

$sql = "INSERT INTO purchases (user_id, ticket_id, quantity, total_price, purchase_date) 
        VALUES ({$user['id']}, {$purchase['ticket_id']}, {$purchase['quantity']}, {$purchase['total_price']}, '$purchase_date')";

if ($conn->query($sql) === TRUE) {
    // Clear session data after successful purchase
    unset($_SESSION['ticket'], $_SESSION['purchase']);
} else {
    echo "Error: " . $conn->error;
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <link rel="stylesheet" href="receipt.css">
</head>

<?php include('header.php'); ?>

<body>
    <div class="receipt-container">
        <h2>Receipt</h2>
        <p class="thank-you">Thank you for your purchase!</p>
        <div class="details">
            <p><strong>Ticket:</strong> <?php echo $purchase['ticket_type']; ?></p>
            <p><strong>Quantity:</strong> <?php echo $purchase['quantity']; ?></p>
            <p><strong>Total Price:</strong> RM <?php echo $purchase['total_price']; ?></p>
            <p><strong>Payment Method:</strong> <?php echo $payment_method; ?></p>
            <p><strong>Date:</strong> <?php echo $purchase_date; ?></p>
        </div>
        <a href="user.php" class="btn">Go to Profile</a>
    </div>
</body>
</html>


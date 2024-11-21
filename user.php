<?php
session_start();
include 'db_connection.php';

// Fetch user information
$user = $_SESSION['user'];
$sql_user = "SELECT name, email FROM user WHERE id = {$user['id']}";
$result = $conn->query($sql_user)->fetch_assoc();


if ($_SESSION['role'] === 'user') {
    // Fetch purchase history
    $sql_purchases = "
        SELECT ticket.ticket_type, ticket.description, purchases.quantity, purchases.total_price, purchases.purchase_date
        FROM purchases
        JOIN ticket ON purchases.ticket_id = ticket.id
        WHERE purchases.user_id = {$user['id']}
        ORDER BY purchases.purchase_date DESC";
    $purchases = $conn->query($sql_purchases);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="index.css">
</head>

<?php include('header.php'); ?>

<body>
    <div class="profile-container">
        <h2>User Profile</h2>
        <div class="user-info">
            <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <a onclick="gotopage('editprofileform.php')" class="edit-profile-btn">Edit Profile</a>
        </div>

        <?php if ($_SESSION['role'] === 'user'): ?>
            <h2>Purchase History</h2>
            <?php if ($purchases->num_rows > 0): ?>
                <div class="purchase-history">
                    <?php while ($purchase = $purchases->fetch_assoc()): ?>
                        <div class="purchase-card">
                            <h3><?php echo $purchase['ticket_type']; ?></h3>
                            <p><?php echo $purchase['description']; ?></p>
                            <p><strong>Quantity:</strong> <?php echo $purchase['quantity']; ?></p>
                            <p><strong>Total Price:</strong> RM <?php echo $purchase['total_price']; ?></p>
                            <p><strong>Purchase Date:</strong> <?php echo $purchase['purchase_date']; ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>No purchases found.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>


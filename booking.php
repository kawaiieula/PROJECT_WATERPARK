<?php
session_start();
include 'db_connection.php';

// Fetch ticket ID and details
if (isset($_GET['ticket_id'])) {
    $ticket_id = $_GET['ticket_id'];

    $sql = "SELECT * FROM ticket WHERE id = $ticket_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $ticket = $result->fetch_assoc();
        $_SESSION['ticket'] = $ticket;
    } else {
        echo "Invalid Ticket ID.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - SplashLand Waterpark</title>
    <link rel="stylesheet" href="booking.css">
</head>

<?php include('header.php'); ?>

<body>
    <section class="booking-section">
        <div class="booking-card">
            <h2>Booking Details</h2>
            <p><strong>Ticket:</strong> <?php echo $ticket['ticket_type']; ?></p>
            <p><strong>Price:</strong> RM <?php echo $ticket['price']; ?></p>

            <form action="payment.php" method="post">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" required>

                <button type="submit" class="proceed-button">Proceed to Payment</button>
            </form>
        </div>
    </section>
</body>
</html>

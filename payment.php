<?php
session_start();
include 'db_connection.php';

// Get ticket and quantity from session
$ticket = $_SESSION['ticket'];
$quantity = $_POST['quantity'];
$total_price = $ticket['price'] * $quantity;

// Store data for receipt
$_SESSION['purchase'] = [
    'ticket_id' => $ticket['id'],
    'ticket_type' => $ticket['ticket_type'],
    'quantity' => $quantity,
    'total_price' => $total_price,
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Method</title>
    <link rel="stylesheet" href="payment.css">
</head>

<?php include('header.php'); ?>

<body>
    <div class="card">
        <h2>Payment Method</h2>
        <form action="receipt.php" method="post">
            <label for="payment-method">Choose a payment method:</label>
            <select id="payment-method" name="payment-method" onchange="toggleCreditCardForm()" required>
                <option value="credit-card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="online-banking">Online Banking</option>
            </select>

            <!-- Credit Card Form -->
            <div id="credit-card-form"  style="display: none;">
                <label for="card-name">Cardholder Name:</label>
                <input type="text" id="card-name" name="card-name" placeholder="Enter cardholder's name" required>

                <label for="card-number">Card Number:</label>
                <input type="text" id="card-number" name="card-number" maxlength="16" placeholder="Enter card number" required>

                <label for="expiry-date">Expiry Date:</label>
                <input type="month" id="expiry-date" name="expiry-date" required>

                <label for="cvv">CVV:</label>
                <input type="password" id="cvv" name="cvv" maxlength="3" placeholder="Enter CVV" required>
            </div>

            <button type="submit">Confirm Payment</button>
        </form>
    </div>

    <script>
    function toggleCreditCardForm() {
        const paymentMethod = document.getElementById('payment-method').value;
        const creditCardForm = document.getElementById('credit-card-form');
        if (paymentMethod === 'credit-card') {
            creditCardForm.style.display = 'block';
            document.getElementById('card-name').required = true;
            document.getElementById('card-number').required = true;
            document.getElementById('expiry-date').required = true;
            document.getElementById('cvv').required = true;
        } else {
            creditCardForm.style.display = 'none';
            document.getElementById('card-name').required = false;
            document.getElementById('card-number').required = false;
            document.getElementById('expiry-date').required = false;
            document.getElementById('cvv').required = false;
        }
    }

    // Initialize visibility based on default selection
    document.addEventListener('DOMContentLoaded', toggleCreditCardForm);
</script>
</body>
</html>

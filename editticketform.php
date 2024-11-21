<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ticket</title>
    <link rel="stylesheet" href="editticketform.css">
</head>
<?php

include('header.php');

?>
<body>
    <div class="background">
        <div class="card">
            <h2>Edit Ticket</h2>
            <form action="editticket.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="ticket-select">Select Ticket:</label>
                    <?php
                    // Include database connection
                    include('db_connection.php');
                   
                    session_start();
                    if ($_SESSION['role'] !== 'user') {
                        $ticket_id = $_GET['id'];

                        $sql = "SELECT * FROM ticket WHERE id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $ticket_id);
                    }
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $data = $result->fetch_assoc();

                    $stmt->close();
                    ?>
                </div>
                <div class="form-group">
                     <input type="hidden" name="ticket-id" value="<?php echo $ticket_id; ?>">
                    <label for="ticket-type">Ticket Type:</label>
                    <input type="text" id="ticket-type" name="ticket-type" value="<?php echo $data['ticket_type']; ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="price">Price (RM):</label>
                    <input type="number" step="0.01" id="price" name="price" value="<?php echo $data['price']; ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" value="<?php echo $data['description']; ?>"
                        required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Update Image (Optional):</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <button type="submit" class="btnprimary">Update Ticket</button>
            </form>
        </div>
    </div>
</body>

</html>
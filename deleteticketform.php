<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Ticket</title>
    <link rel="stylesheet" href="deleteticket.css">
</head>

<?php

include('header.php');

?>

<body>
    <div class="background">
        <div class="card">
            <h2>Delete Ticket</h2>
            <form action="deleteticket.php" method="post">
                <div class="form-group">
                    <label for="ticket-select">Select Ticket to Delete:</label>
                    <select id="ticket-select" name="ticket-select" required>
                        <?php
                        // Include database connection
                        include('db_connection.php');

                        // Fetch all tickets
                        $sql = "SELECT ticket_type FROM ticket";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . htmlspecialchars($row['ticket_type']) . "'>" . htmlspecialchars($row['ticket_type']) . "</option>";
                            }
                        } else {
                            echo "<option value=''>No tickets available</option>";
                        }

                        $conn->close();
                        ?>
                    </select>
                </div>
                <button type="submit" class="btnprimary delete-btn">Delete Ticket</button>
            </form>
        </div>
    </div>
</body>
</html>

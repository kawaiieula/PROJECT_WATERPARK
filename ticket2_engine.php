<?php
// Include the database connection
include 'db_connection.php';

// SQL query to fetch ticket data
$sql = "SELECT id, ticket_type, price, description, image FROM ticket";
$result = $conn->query($sql);

// Check if there are results and display each ticket
if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo '<div class="ticket-card">';
        echo "<img src='" . $row['image'] ."'/>";
        echo '<h3>' . htmlspecialchars($row["ticket_type"]) . ' Ticket</h3>';
        echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
        echo '<p class="price">From RM ' . htmlspecialchars($row["price"]) . '</p>';
        echo '<a href="booking.php?ticket_id='. htmlspecialchars(string: $row["id"]). '" class="btn">Book Now</a>';
        echo '</div>';
    }
} else {
    echo "<p>No tickets available.</p>";
}

// Close the database connection
$conn->close();
?>

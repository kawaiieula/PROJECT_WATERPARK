<?php
// Include database connection
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticket_type = $_POST['ticket-select'];

    // Prepare DELETE statement
    $sql = "DELETE FROM ticket WHERE ticket_type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ticket_type);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        // Redirect back with success message
        header("Location: admincontrolpanel.php?message=delete_success");
    } else {
        // Redirect back with error message
        header("Location: admincontrolpanel.php?message=delete_error");
    }

    $stmt->close();
}

$conn->close();
?>

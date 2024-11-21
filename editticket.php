<?php
// Database connection
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticket_id = $_POST['ticket-id']; // Use ID to locate the ticket
    $ticket_type = $_POST['ticket-type'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    // Prepare the UPDATE statement
    $sql = "UPDATE ticket SET ticket_type = ?, price = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdsi", $ticket_type, $price, $description, $ticket_id);

    // Execute the statement
    if ($stmt->execute()) {
        // Check if an image is uploaded
        if (!empty($image['name'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($image["name"]);
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                // Update the image path in the database
                $sql_image = "UPDATE ticket SET image = ? WHERE id = ?";
                $stmt_image = $conn->prepare($sql_image);
                $stmt_image->bind_param("si", $target_file, $ticket_id);
                $stmt_image->execute();
                $stmt_image->close();
            }
        }
        // Redirect back to admincontrolpanel.php
        header("Location: admincontrolpanel.php?message=success");
        exit(); // Stop further execution after redirection
    } else {
        // Log or handle error
        echo "Error updating ticket: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

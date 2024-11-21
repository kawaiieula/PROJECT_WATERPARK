<?php
// Include the database connection
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image'])) {
    // Capture form data
    $ticket_type = mysqli_real_escape_string($conn, $_POST['ticket_type']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Handle the image upload
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageSize = $image['size'];
    $imageError = $image['error'];
    $imageType = $image['type'];

    // Define allowed file types
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    // Check if the image is of a valid type
    if (in_array($imageType, $allowedTypes)) {
        // Check for upload errors
        if ($imageError === 0) {
            // Set the image upload path
            $imageDestination = 'uploads/' . $imageName;

            // Move the image to the desired directory
            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                // Save the image path in the database
                $imagePath = $imageDestination;



                // SQL query to insert data into the ticket table
                $sql = "INSERT INTO ticket (ticket_type, price, description, image) 
                VALUES ('$ticket_type', $price, '$description', '$imagePath')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Ticket added successfully!');</script>";
                    header("Location: admincontrolpanel.php");
                    exit;
                } else {
                    echo "<script>alert('Error: " . $conn->error . "');</script>";
                }
            }
        } else {
            echo "Error moving the file!";
        }
    } else {
        echo "There was an error uploading the file!";
    }
} else {
    echo "Invalid file type! Only JPG, PNG, and GIF are allowed.";
}


// Close the database connection
$conn->close();

?>
<?php
// Include the database connection
include 'db_connection.php';

// Check if form data is sent via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    

    // SQL query to insert data into the user table
    $sql = "INSERT INTO user (name, email, password) 
            VALUES ('$name', '$email', '$password')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New user registered. Please Log In ');</script>";
        header("Location: loginform.php");
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }

    // Close the database connection
    $conn->close();
}
?>
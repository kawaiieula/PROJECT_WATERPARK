<?php
// Start the session
session_start();
// Include database connection
include('db_connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validate passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    if ($_SESSION['role'] === 'admin') {
        $admin_id = $_POST['id'];
        // Update the admin record
        $sql = "UPDATE admin SET name = '$name', email = '$email', password = '$password' WHERE id = '$admin_id'";
    } else {
        $user = $_SESSION["user"];
        $sql = "UPDATE user SET name = '$name', email = '$email', password = '$password' WHERE id = {$user['id']}";
    }


    // Execute the query
    if ($conn->query($sql) === TRUE) {
        $_SESSION['user'] = [
            'email' => $email,
            'name' => $name,
            'id' => $_SESSION['user']['id'],
        ];
        if ($_SESSION['role'] === 'admin') {
            $url = 'admincontrolpanel.php?message=update_success';
        } else {
            $url = 'user.php?message=update_success';
        }

        echo "<script>
        localStorage.setItem('user', JSON.stringify(" . json_encode($_SESSION['user']) . "));
        window.location.href = '" . $url . "'
    </script>";

    } else {
        echo "Error updating profile: " . $conn->error;
    }

}

// Close database connection
$conn->close();
?>
<?php
// Start the session
session_start();

// Include the database connection file
include("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (strpos($email, '@splashlandwaterpark.com') !== false){
        $query = "SELECT * FROM admin WHERE email = '$email'";
        $_SESSION['role'] = 'admin';
    }
    else{
         // Check if the user exists in the database
        $query = "SELECT * FROM user WHERE email = '$email'";
        $_SESSION['role'] = 'user';
    }
    
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        // Email doesn't exist, set session error message
        $_SESSION['error'] = "Email not found.";
        header("Location: loginform.php");
        exit();
    } else {
        // Email exists, now check if the password is correct
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password'])  {
            // Password matches, login successful
            $_SESSION['user'] = [
                'id' => $row['id'],
                'email' => $row['email'],
                'name' => $row['name'],
            ];

            // admincontrolpanel
             
            // Redirect to the main page or dashboard

            if(strpos($email, '@splashlandwaterpark.com') !== false){
                $role = 'admin';
                echo "<script>
                localStorage.setItem('user', JSON.stringify(" . json_encode($_SESSION['user']) . "));
                localStorage.setItem('role', '". $role ."');
                window.location.href = 'admincontrolpanel.php';
            </script>";
            }
            else{
                $role = 'user';
                echo "<script>
                localStorage.setItem('user', JSON.stringify(" . json_encode($_SESSION['user']) . "));
                localStorage.setItem('role', '". $role ."');
                window.location.href = 'index.php';
            </script>";
            }
           

        } else {
            //Password is incorrect, set session error message
            $_SESSION['error'] = "Incorrect password.";
            header("Location: loginform.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="container">
        <!-- Tab buttons to switch between User Login, Signup, and Admin Login forms -->
        <form action="login.php" method="POST">
            <div id="loginForm">
                <h2>Login</h2>
                <div class="form-group">
                    <label for="loginEmail">Email</label>
                    <input name="email" type="email" id="loginEmail" placeholder="Enter your email" required>

                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input name="password" type="password" id="loginPassword" placeholder="Enter your password"
                        required>
                </div>
                <button type="submit" class="btnprimary">Login</button>
            </div>
        </form>
        <div style="padding-top:20px"> Register with us now to buy Tickets! </div><a href="registerform.html">Create an
            account</a>

    </div>
    <?php
    // Start session to check for errors
    session_start();
    
    // If there's an error message in session, show an alert
    if (isset($_SESSION['error'])) {
        echo "<script>alert('" . $_SESSION['error'] . "');</script>";
        unset($_SESSION['error']); // Clear the error after displaying
    }
    ?>

    <!-- <script src="script.js"></script> -->
</body>

</html>

<script>
localStorage.clear();
</script>
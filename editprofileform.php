<?php
// Include database connection
include('db_connection.php');
session_start();
if ($_SESSION['role'] !== 'user') {
    // Get admin ID from URL
    $admin_id = $_GET['id'];

    // Fetch admin data
    $sql = "SELECT * FROM admin WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $admin_id);
} else {
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user['id']);
}
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/adminedit.css">
</head>

<body>
    <div class="background">
        <div class="card">
            <h2>Edit Profile</h2>
            <form action="editprofile.php" method="post">
                <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $admin['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $admin['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                </div>
                <button type="submit" class="btnprimary">Save Changes</button>
            </form>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Panel - SplashLand Waterpark</title>
    <link rel="stylesheet" href="admincontrolpanel.css">
    <style>
        .alert {
            padding: 10px;
            margin: 15px 0;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
        }

        .alert.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<?php
include('header.php');
include('db_connection.php');


$keywordURL = '';
// Check if 'keyword' is set in the URL
if (isset($_GET['keyword'])) {
    htmlspecialchars($_GET['keyword']);
    $keywordURL = $_GET['keyword'];
    $keyword = "%" . mysqli_real_escape_string($conn, $keywordURL) . "%"; // Add wildcards to the keyword for LIKE

    // Prepare a parameterized query
    $query = "SELECT * FROM ticket WHERE ticket_type LIKE ? OR description LIKE ?";
    $stmt = mysqli_prepare($conn, $query);

    // Bind the keyword parameter to both placeholders
    mysqli_stmt_bind_param($stmt, "ss", $keyword, $keyword);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);
} else {
    // If no keyword is set, fetch all events without filtering
    $query = "SELECT * FROM ticket";
    $result = mysqli_query($conn, $query);
}
?>

<body>
    <!-- Admin Control Panel Header -->
    <div>
        <h1>Admin Control Panel</h1>
        <div style="display:flex; justify-content:center; padding-top: 10px; color: white;">Welcome, Admin! Manage tickets, update
            profile, and more.</div>
    </div>

    <!-- Main Admin Section -->
    <div class="admin-container">
        <!-- Profile Section -->
        <section class="admin-profile">
            <h2>Admin Profile</h2>
            <div class="profile-info">
                <p><strong>Name:</strong> <span id="user-name"></span></p>
                <p><strong>Email:</strong> <span id="user-email"></span></p>
                <button class="btn" onclick="gotopage('editprofileform.php')">Edit
                    Profile</button>

            </div>
        </section>
        <?php
        if (isset($_GET['message']) && $_GET['message'] == 'update_success') {
            echo "<div class='alert success'>Profile updated successfully!</div>";
        }
        ?>


        <!-- Ticket Management Section -->
        <div class="ticket-management">
            <div style="display:flex; padding-bottom: 15px; justify-content: space-between">
                <h2>Manage Tickets</h2>
                <div style="display:flex;">
                    <div class="search">
                        <input name="keyword" id="keyword" type="text" placeholder="Search by Type/Desc..."
                            onkeydown="if (event.key === 'Enter') search()" value="<?php echo $keywordURL; ?>">
                        <button onclick="search()">Go</button>
                        <button onclick="clearSearch()">Clear</button>
                    </div>
                    <button class="btn" onclick="gotopage('ticket_form.php')">Add New</button>
                </div>
            </div>

            <div class="ticket-options">
                <table>
                    <tr>
                        <th>No.</th>
                        <th>Category</th>
                        <th>Desc</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>

                    <?php

                    if ($result->num_rows > 0) {
                        $count = 1; // Counter for numbering tickets
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $count . ".</td>";
                            echo "<td>" . htmlspecialchars($row['ticket_type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                            echo "<td>RM " . number_format($row['price'], 2) . "</td>";
                            echo "<td>
                                    <button class='btn' onclick=\"gotopage('editticketform.php?id=" . $row['id'] . "')\">Edit</button>
                                    <button class='btn' onclick=\"gotopage('deleteticketform.php?id=" . $row['id'] . "')\">Delete</button>
                                  </td>";
                            echo "</tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='5'>No tickets found</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <?php
    // Display feedback message
    if (isset($_GET['message'])) {
        if ($_GET['message'] == 'delete_success') {
            echo "<div class='alert success'>Ticket deleted successfully!</div>";
        } elseif ($_GET['message'] == 'delete_error') {
            echo "<div class='alert error'>Failed to delete ticket. Please try again.</div>";
        }
    }
    ?>


    <!-- Footer -->
    <footer class="admin-footer">
        <p>&copy; 2024 SplashLand Waterpark. Admin Control Panel</p>
    </footer>

    <!-- Optional JavaScript Functions for actions -->
    <script>
        function gotopage(page) {

            if (page == 'editprofileform.php')
                page += `?id=${user.id}`;
            window.location.href = page;
        }

        if (user) {
            document.getElementById('user-name').innerHTML = user.name;
            document.getElementById('user-email').innerHTML = user.email;
        }

        function search() {
            const keyword = document.getElementById("keyword").value;
            window.location.href = `${window.location.pathname}?keyword=${encodeURIComponent(keyword)}`;
        }

        function clearSearch() {
            document.getElementById("keyword").value = '';
            window.location.href = `${window.location.pathname}`;
        }

    </script>
</body>

</html>
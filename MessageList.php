<?php
// Include database connection
include 'db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message List - Sunway Lagoon</title>
    <link rel="stylesheet" href="MessageList.css">
    <link rel="stylesheet" href="index.css">
    
</head>

<?php include('header.php'); ?>

<body>

<div class="container">
    <h1>Message List</h1>

    <!-- Event Enquiries Table -->
    <div>
        <h2 class="section-title">Event Enquiries</h2>
        <table>
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Organizer Name</th>
                    <th>Group Size</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Enquiry</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM event_enquiries ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['company_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['organizer_name']) . "</td>";
                        echo "<td>" . intval($row['group_size']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['enquiry']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No event enquiries found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Customer Feedback Table -->
    <div>
        <h2 class="section-title">Customer Feedback</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Feedback</th>
                    <th>Mobile</th>
                    <th>Subject</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM customer_feedback ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['feedback'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($row['mobile']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['subject'] ?? 'N/A') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No customer feedback found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
// Close the database connection
$conn->close();
?>

</body>
</html>

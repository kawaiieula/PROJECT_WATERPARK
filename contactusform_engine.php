<?php
// Include database connection
include 'db_connection.php';

// Initialize variables to store form feedback
$eventMessage = $feedbackMessage = "";

// Handle Events & Packages Enquiry Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['company-name'])) {
    $companyName = $conn->real_escape_string($_POST['company-name']);
    $organizerName = $conn->real_escape_string($_POST['organizer-name']);
    $groupSize = intval($_POST['group-size']);
    $email = $conn->real_escape_string($_POST['email']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $enquiry = $conn->real_escape_string($_POST['enquiry']);

    $sql = "INSERT INTO event_enquiries (company_name, organizer_name, group_size, email, contact, enquiry)
            VALUES ('$companyName', '$organizerName', $groupSize, '$email', '$contact', '$enquiry')";

    if ($conn->query($sql) === TRUE) {
        $eventMessage = "Your event enquiry has been submitted successfully!";
    } else {
        $eventMessage = "Error: " . $conn->error;
    }
}

// Handle Customer Feedback Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $emailFeedback = $conn->real_escape_string($_POST['email-feedback']);
    $feedback = isset($_POST['feedback']) ? $conn->real_escape_string($_POST['feedback']) : NULL;
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $subject = isset($_POST['subject']) ? $conn->real_escape_string($_POST['subject']) : NULL;

    $sql = "INSERT INTO customer_feedback (name, email, feedback, mobile, subject)
            VALUES ('$name', '$emailFeedback', '$feedback', '$mobile', '$subject')";

    if ($conn->query($sql) === TRUE) {
        $feedbackMessage = "Your feedback has been submitted successfully!";
    } else {
        $feedbackMessage = "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

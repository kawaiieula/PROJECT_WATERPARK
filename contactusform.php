<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Sunway Lagoon</title>
    <link rel="stylesheet" href="css/contactus.css">
    
    
    
</head>
<?php include 'contactusform_engine.php'; ?>

<?php include('header.php'); ?>
<body>

    <!-- Background Section -->
    <div class="background-section">
        <div class="contact-container">
            <h1>Contact Us</h1>

            <!-- Events & Packages Enquiry Form -->
            <div class="section">
                <h2>Events & Packages Enquiry</h2>
                <form action="contactusform_engine.php" method="post">
                    <label for="company-name">Company Name (required)</label>
                    <input type="text" id="company-name" name="company-name" required>

                    <label for="organizer-name">Organizer Name (required)</label>
                    <input type="text" id="organizer-name" name="organizer-name" required>

                    <label for="group-size">Group Size (required)</label>
                    <input type="number" id="group-size" name="group-size" required>

                    <label for="email">Email Address (required)</label>
                    <input type="email" id="email" name="email" required>

                    <label for="contact">Contact Number (required)</label>
                    <input type="tel" id="contact" name="contact" required>

                    <label for="enquiry">Your Enquiry (required)</label>
                    <textarea id="enquiry" name="enquiry" required></textarea>

                    <button type="submit">Send</button>
                </form>
            </div>
            <?php if (!empty($eventMessage)) { echo "<p class='success-message'>$eventMessage</p>"; } ?>


            <!-- Customer Feedback Form -->
            <div class="section">
                <h2>Customer Feedback</h2>
                <form action="contactusform_engine.php" method="post">
                    <label for="name">Name (required)</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email-feedback">Email Address (required)</label>
                    <input type="email" id="email-feedback" name="email-feedback" required>

                    <label for="feedback">Your Feedback</label>
                    <textarea id="feedback" name="feedback"></textarea>

                    <label for="mobile">Mobile Number (required)</label>
                    <input type="tel" id="mobile" name="mobile" required>

                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject">

                    <button type="submit">Send</button>
                </form>
            </div>
            <?php if (!empty($feedbackMessage)) { echo "<p class='success-message'>$feedbackMessage</p>"; } ?>


            <!-- Address Section -->
            <div class="address">
                <h2>SplashLand Waterpark Sdn Bhd</h2>
                <p>3, Jalan PJS 11/11, Bandar Sunway, 47500 Selangor Darul Ehsan, Malaysia.</p>
                <p>Phone: +603 5639 0000 | Fax: +603 5639 0050</p>
                <p>Email: <a href="mailto:[email protected]">[email protected]</a></p>
            </div>
        </div>
    </div>
</body>
</html>

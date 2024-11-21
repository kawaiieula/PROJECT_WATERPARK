<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
    <link rel="stylesheet" href="index.css">
    <style>
       


        /* Background Section */
        .background {
            background-image: url("OUR TEAM BACKGROUND.jpg"); /* Replace with the actual background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-top: 120px; /* Offset for fixed nav */
            background: linear-gradient(135deg, #bde0fe, #caffbf);
        }

        /* Team Section */
        .team-section {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 50px;
            width: 100%;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 22%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 30px;
        }

        .team-img {
            border-radius: 50%;
            width: 100%;
            height: auto;
            max-width: 200px;
            margin: 0 auto;
        }

        /* Social Icons */
        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .social-icons a {
            margin: 0 10px;
        }

        .social-icons img {
            width: 24px;
            height: 24px;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .card {
                width: 45%;
            }
        }

        @media screen and (max-width: 480px) {
            .card {
                width: 90%;
            }

            .menu1 {
                flex-direction: column;
            }

            .menu1 li {
                margin: 10px 0;
            }
        }
    </style>
</head>

<?php include('header.php'); ?>
<body>



    <!-- Background Section -->
    <div class="background">
        <h1>OUR TEAM</h1>

        <div class="team-section">
            <!-- Team Member 1 -->
            <div class="card">
                <img src="assets/team 1.jpeg" alt="Member 1" class="team-img">
                <h2>Vice President</h2>
                <h3>CHRIS EVANS</h3>
                <p></p>
                <div class="social-icons">
                    <a href="#"><img src="assets/facebook icon.jpeg" alt="Facebook"></a>
                    <a href="#"><img src="assets/twitter icon.jpeg" alt="Twitter"></a>
                    <a href="#"><img src="assets/Pinterest icon.jpeg" alt="Pinterest"></a>
                    <a href="#"><img src="assets/website icon.jpeg" alt="Website"></a>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="card">
                <img src="assets/team 2.jpeg" alt="Member 2" class="team-img">
                <h2>CEO</h2>
                <h3>IM YOON-AH</h3>
                <p></p>
                <div class="social-icons">
                    <a href="#"><img src="assets/facebook icon.jpeg" alt="Facebook"></a>
                    <a href="#"><img src="assets/twitter icon.jpeg" alt="Twitter"></a>
                    <a href="#"><img src="assets/Pinterest icon.jpeg" alt="Pinterest"></a>
                    <a href="#"><img src="assets/website icon.jpeg" alt="Website"></a>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="card">
                <img src="assets/team 3.jpeg" alt="Member 3" class="team-img">
                <h2>Executive Director</h2>
                <h3>ANDREW GARFIELD</h3>
                <p></p>
                <div class="social-icons">
                    <a href="#"><img src="assets/facebook icon.jpeg" alt="Facebook"></a>
                    <a href="#"><img src="assets/twitter icon.jpeg" alt="Twitter"></a>
                    <a href="#"><img src="assets/Pinterest icon.jpeg" alt="Pinterest"></a>
                    <a href="#"><img src="assets/website icon.jpeg" alt="Website"></a>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="card">
                <img src="assets/team 4.jpeg" alt="Member 4" class="team-img">
                <h2>Director</h2>
                <h3>JUNG SOMIN</h3>
                <p></p>
                <div class="social-icons">
                    <a href="#"><img src="assets/facebook icon.jpeg" alt="Facebook"></a>
                    <a href="#"><img src="assets/twitter icon.jpeg" alt="Twitter"></a>
                    <a href="#"><img src="assets/Pinterest icon.jpeg" alt="Pinterest"></a>
                    <a href="#"><img src="assets/website icon.jpeg" alt="Website"></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

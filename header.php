<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<header>
    <nav class="navbar1">
        <!-- LOGO -->
        <div class="logo">
            <a href="index.php">
                <img src="assets/SplashLand Waterpark Logo.webp" alt="SplashLand Logo">
            </a>
        </div>

        <!-- NAVIGATION -->
        <ul class="menu1" id="user-navigation">
            <li><a href="index.php">Home</a></li>
            <li><a href="ticket2.php">Tickets</a></li>
            <li class="dropdown">
                <a href="aboutus.php" class="dropbtn">About</a>
                <div class="dropdown-content">
                    <a href="ourteam.php">Our Team</a>
                    <a href="maps.php">Maps</a>
                </div>
            </li>
            <li><a href="contactusform.php">Contact</a></li>
        </ul>
        <ul class="menu1" id="admin-navigation">
            <li><a href="admincontrolpanel.php">Home</a></li>
            <li><a href="MessageList.php">Message List</a></li>
        </ul>

        <!-- SEARCH BAR & LOGIN BUTTON -->

        <div style="display: flex; align-items: center">
            <!-- <div class="search">
                <input type="text" placeholder="Search...">
                <button type="submit">Go</button>

            </div> -->

            <a href="loginform.php" class="loginBtn" id="login-button">
                Login
            </a>
            <a href="user.php">
                <div class="loginName" id="logout">
                    <span id="login-label"></span>
                </div>
            </a>
            <a onclick="logout()" class="loginBtn" id="logout-button" style="padding-left:10px">
                <i class="fa-solid fa-right-to-bracket"></i>
            </a>

        </div>

    </nav>

</header>

</html>

<script>
    let user = JSON.parse(localStorage.getItem('user'));
    let role = localStorage.getItem('role');


    if (user) {
        document.getElementById('login-button').style.display = 'none';
        let name = '';
        if (role === 'admin') {
            document.getElementById('user-navigation').style.display = 'none';
            name = 'Admin ' + user.name;
        } else {
            document.getElementById('admin-navigation').style.display = 'none';
            name = user.name;
        }
        document.getElementById('login-label').innerHTML = name;
    } else {
        document.getElementById('logout').style.display = 'none';
        document.getElementById('logout-button').style.display = 'none';
    }

    function logout() {
        localStorage.clear();
        window.location.href = 'loginform.php';
    }
    function gotopage(page) {

        if (page == 'editprofileform.php')
            page += `?id=${user.id}`;
        window.location.href = page;
    }
</script>
<!DOCTYPE html>

<?php
require_once("db_conn.php");

if (!isset($_SESSION["current_acc"])) {
    header("Location: customer_login.php");
}
?>


<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link href="utility_style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" /> -->

    <!-- font awsome library -->
    <script src="https://kit.fontawesome.com/d50e96d6ab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="script.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="img-divs.css">

    <title>Customer Home Page</title>

</head>

<body>

    <link href="stylesheet.css" rel="stylesheet" type="text/css">

    <!-- Navigation Bar -->
    <div class="nav-pc-part">
        <div class="topnavbar">
            <div class="nav-col-25">
                <a href="index.html"><img src="images/rbs_logo.png" alt="logo"></a>
            </div>
            <div class="nav-col-75">
                <div class="nav-menu">
                    <a href="customer_home.php" class="menu-item-txt" id="topnav-home">CUSTOMER HOME</a>

                    <!-- <a href="javascript:void(0);" onclick="scrolltoAbout()" class="menu-item-txt" id="topnav-about">About</a>
                    <a href="javascript:void(0);" onclick="scrolltoServices()" class="menu-item-txt">Services</a>
                    <a href="javascript:void(0);" onclick="scrolltoContacts()" class="menu-item-txt" id="topnav-contact">Contacts</a> -->

                    <button class="menu-item-btn" onclick="myFunction3()" id="pc-signin-btn">Profile</button>
                </div>
            </div>
        </div>
        <div class="pc-signin" id="pc-signin">
            <h3>Logged in as : </h3>
            <?php

            echo ("<p> NIC : " . $_SESSION["current_acc"] . "</p>");
            echo ("<p> Name : " . $_SESSION["current_customer"] . "</p>");
            echo ("<p> Email : " . $_SESSION["current_customer_email"] . "</p>");

            ?>
            <input type="button" value="Sign Out" onclick="window.open('customer_logout.php', '_self');">
        </div>
    </div>

    <div class="nav-responsive-part">
        <div class="topnavbar-res">
            <div onclick="myFunction()">
                <i class="fas fa-bars menu-icon" id="menu-icon"></i>
            </div>
            <div class="menu-logo">
                <a href="index.html"><img src="images/rbs_logo.png" alt=""></a>
            </div>
            <div onclick="myFunction2()">
                <i class="fas fa-user user-icon" id="user-icon"></i>
            </div>
        </div>
        <div class="dropdown-menu" id="dropdown-menu">
            <a href="customer_home.php"> Customer Home</a>

            <!-- <a href="javascript:void(0);" onclick="scrolltoAbout()">About</a>
            <a href="javascript:void(0);" onclick="scrolltoServices()">Services</a>
            <a href="javascript:void(0);" onclick="scrolltoContacts()">Contacts</a>
            <a href="#">Login as</a> -->
        </div>
        <div class="dropdown-signin" id="dropdown-signin">
            <h3>Logged in as : </h3>
            <?php
            echo ("<p> NIC : " . $_SESSION["current_acc"] . "</p>");
            echo ("<p> Name : " . $_SESSION["current_customer"] . "</p>");
            echo ("<p> Email : " . $_SESSION["current_customer_email"] . "</p>");

            ?>
            <input type="button" value="Sign Out" onclick="window.open('customer_logout.php', '_self');">
        </div>
    </div>


    <!-- Customer Home 3 Divisions goes here -->

    <div class="customer-home-container">
        <div class="image-div-container image-1">
            <div class="image-div-holder flex-right">
                <div class="image-div-txt-holder">
                    <h4>VIEW YOUR <span class="blue-colored-text">DETAILS</span></h4>
                    <p>Put away money for your big dreams and keep those funds growing with certificates of deposit (CDs).
                        Lock in a competitive rate for a term that fits your timeframe.</p>
                    <button onclick="window.open('customer_view_profile.php','_self');">Visit Now</button>
                </div>
            </div>
        </div>
        <div class="image-div-container image-2">
            <div class="image-div-holder flex-left">
                <div class="image-div-txt-holder">
                    <h4>MANAGE YOUR <span class="blue-colored-text">REQUESTS</span></h4>
                    <p>Put away money for your big dreams and keep those funds growing with certificates of deposit (CDs).
                        Lock in a competitive rate for a term that fits your timeframe.</p>
                    <button onclick="window.open('customer_view_requests.php','_self')">Visit Now</button>
                </div>
            </div>
        </div>
        <div class="image-div-container image-3">
            <div class="image-div-holder flex-right">
                <div class="image-div-txt-holder">
                    <h4>UPADATE YOUR <span class="blue-colored-text">CREDENTIALS</span></h4>
                    <p>Put away money for your big dreams and keep those funds growing with certificates of deposit (CDs).
                        Lock in a competitive rate for a term that fits your timeframe.</p>
                    <button onclick="window.open('customer_change_password.php','_self')">Visit Now</button>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->

    <div class="footer">
        <h1>R_B_S</h1>
        <div class="footer-icons">
            <p>
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-whatsapp"></i>
                <i class="fab fa-twitter"></i>
            </p>
        </div>
        <p>&copy; Copyright 2021. RBS Created By <a href="#about"><span class="blue-colored-text">RBS
                    Creators</span></a>
        </p>
    </div>






    <!-- Common header starts here -->

    <!-- <header>
        <img class="logo" src="images/rbs_logo.png" alt="logo">
        <nav>
            <ul class="nav__links">
                <li><a href="#">VIEW MORTGAGES</a></li>
                <li><a href="#">VIEW LOANS</a></li>
                <li><a href="customer_change_password.php">UPDATE PASSWORD</a></li>
            </ul>
        </nav>
        <a class="cta" href="customer_logout.php"><button>LOGOUT</button></a>
    </header> -->

    <!-- Common header ends here -->

    <!-- <div class="container" id="bank_header">
            <h1>CUSTOMER HOME PAGE</h1>

            </br><h1>Login as <?php echo $_SESSION["current_acc"]; ?> </br></br> WELCOME!!!</h1>

    </div> -->
</body>

</html>
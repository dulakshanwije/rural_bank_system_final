<!DOCTYPE html>

<?php
require_once("db_conn.php");
if (!isset($_SESSION["current_acc"])) {
    header("Location: customer_login.php");
}
?>

<html>

<head>
    <title>Customer Requests</title>


    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awsome library -->
    <script src="https://kit.fontawesome.com/d50e96d6ab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="script.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="login_box.css">

    <style>
        option {
            color: white;
            background-color: black;
        }

        .contact-section {
            padding-top: 150px;
        }
    </style>

</head>

<body>

    <!-- Navigation Bar -->
    <div class="nav-pc-part">
        <div class="topnavbar">
            <div class="nav-col-25">
                <a href="index.html"><img src="images/rbs_logo.png" alt="logo"></a>
            </div>
            <div class="nav-col-75">
                <div class="nav-menu">
                    <a href="javascript:void(0);" onclick="scrolltoShowcase()" class="menu-item-txt" id="topnav-home">Home</a>
                    <a href="javascript:void(0);" onclick="scrolltoAbout()" class="menu-item-txt" id="topnav-about">About</a>
                    <a href="javascript:void(0);" onclick="scrolltoServices()" class="menu-item-txt">Services</a>
                    <a href="javascript:void(0);" onclick="scrolltoContacts()" class="menu-item-txt" id="topnav-contact">Contacts</a>
                    <button class="menu-item-btn" id="pc-signin-btn" onclick="myFunction3()">Login as</button>
                </div>
            </div>
        </div>
        <div class="pc-signin" id="pc-signin">
            <h3>Logged in as : </h3>
            <?php

            echo ("<p> NIC : " . $_SESSION["current_acc"] . "</p>");
            echo ("<p> Name : " . $_SESSION["current_customer"] . "</p>");
            // echo("<p> Name :".$_SESSION[""]."</p>");
            echo ("<p> Email : " . $_SESSION["current_customer_email"] . "</p>");

            ?>
            <input type="button" value="Sign Out" onclick="window.open('customer_logout.php', '_self');">
        </div>
    </div>

    <div class="nav-responsive-part">
        <div class="topnavbar-res">
            <div onclick="myFunction()" id="menu-icon-btn">
                <i class="fas fa-bars menu-icon" id="menu-icon"></i>
            </div>
            <div class="menu-logo">
                <a href="index.html"><img src="images/rbs_logo.png" alt=""></a>
            </div>
            <div onclick="myFunction2()" id="user-icon-btn">
                <i class="fas fa-user user-icon" id="user-icon"></i>
            </div>
        </div>
        <div class="dropdown-menu" id="dropdown-menu">
            <a href="javascript:void(0);" onclick="scrolltoShowcase()">Home</a>
            <a href="javascript:void(0);" onclick="scrolltoAbout()">About</a>
            <a href="javascript:void(0);" onclick="scrolltoServices()">Services</a>
            <a href="javascript:void(0);" onclick="scrolltoContacts()">Contacts</a>
            <a href="#">Login as</a>
        </div>
        <div class="dropdown-signin" id="dropdown-signin">
            <h3>Logged in as : </h3>
            <?php

            echo ("<p> NIC : " . $_SESSION["current_acc"] . "</p>");
            echo ("<p> Name : " . $_SESSION["current_customer"] . "</p>");
            // echo("<p> Name :".$_SESSION[""]."</p>");
            echo ("<p> Email : " . $_SESSION["current_customer_email"] . "</p>");

            ?>
            <input type="button" value="Sign Out" onclick="window.open('customer_logout.php', '_self');">
        </div>
    </div>


    <!-- Login Form -->
    <div class="contact-section" id="customer-login-section">
        <div class="contact-form-container">
            <div class="contact-form">
                <h3>SEND YOUR REQEUST HERE</h3><br>
                <form action="customer_requests_processor.php" method="POST">
                    <div class="contact-form-inputs">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?>
                            </p>
                        <?php } ?>
                        <select name="req_category" id="" class="contact-txt">
                            <option value="Bank Loan">Bank Loan</option>
                            <option value="Bank Mortgages">Bank Mortgages</option>
                            <option value="Bank Savings">Bank Savings</option>
                            <option value="Other">Other</option>
                        </select>
                        <input type="text" name="req_title" placeholder="Title" class="contact-txt">
                        <textarea name="req_info" id="" cols="30" rows="4" class="contact-txt" placeholder="Type your message here"></textarea>
                        <div class="contact-txt" style="text-align :center; font-size:25px;">
                            <i class="fas fa-sad-tear"></i>
                            <input type="range" name="req_range" id="" min="0" max="4">
                            <i class="fas fa-grin-alt"></i>
                        </div>
                        <input type="submit" value="Update" class="contact-btn">
                    </div>
                </form>
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
        <p>&copy; Copyright 2021. RBS Created By <a href="./admin/index.php"><span class="blue-colored-text">RBS
                    Creators</span></a>
        </p>
    </div>

</body>

</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="customer_requests_processor.php" method = "POST">
        <select name="req_category" id="">
            <option value="Bank Loan">Bank Loan</option>
            <option value="Bank Mortgages">Bank Mortgages</option>
            <option value="Bank Savings">Bank Savings</option>
            <option value="Other">Other</option>
        </select>
        <input name = "req_title" type="text" placeholder="Title" required>
        <textarea name="req_info" id="" cols="30" rows="4" placeholder="Type your message here" required></textarea>
        <input type="submit" value="Send">
    </form>
</body>
</html> -->
<!DOCTYPE html>

<?php

// session_start();

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])){
    header("Location: bank_login.php?error=Please Login First!");
}

?>


<html>
    <head>
        <title>Bank Home Page</title>

        <!-- <link href="utility_style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" /> -->

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
                <!-- <a href="bank_customer_registration.php" class="menu-item-txt"
                    id="topnav-home">REGISTER CUSTOMERS</a>
                <a href="bank_view_customer_details.php" class="menu-item-txt"
                    id="topnav-about">VIEW CUSTOMERS</a> -->
                <a href="bank_manage_customers.php" class="menu-item-txt">MANAGE CUSTOMERS</a>
                <a href="" class="menu-item-txt">BANKS AVAILABLE</a>
                <button class="menu-item-btn" onclick="myFunction3()" id="pc-signin-btn">Profile</button>
            </div>
        </div>
    </div>
    <div class="pc-signin" id="pc-signin">
        <h3>Logged in as : </h3>
        <?php
        
        echo("<p>Bank : ".$_SESSION["crnt_b_address"]."</p>");
        echo("<p>District : ".$_SESSION["crnt_b_district"]."</p>");
        echo("<p>ID : ".$_SESSION["crnt_b_id"]."</p>");
        
        ?>
        <input type="button" value="Sign Out" onclick="window.open('bank_logout.php', '_self');">
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
        <!-- <a href="bank_customer_registration.php">REGISTER CUSTOMERS</a>
        <a href="bank_view_customer_details.php">VIEW CUSTOMERS</a> -->
        <a href="bank_manage_customers.php">MANAGE CUSTOMERS</a>
        <a href="">BANKS AVAILABLE</a>
    </div>
    <div class="dropdown-signin" id="dropdown-signin">
        <h3>Logged in as : </h3>
        <?php
        
        echo("<p>Bank : ".$_SESSION["crnt_b_address"]."</p>");
        echo("<p>District : ".$_SESSION["crnt_b_district"]."</p>");
        echo("<p>ID : ".$_SESSION["crnt_b_id"]."</p>");
        
        ?>
        <input type="button" value="Sign Out" onclick="window.open('bank_logout.php', '_self');">
    </div>
</div>

    <!-- Bank Home Body  -->

    <div class="bank-home-container">
        <div class="bank-img-container">
            <div class="bank-image-txt-holder">
                <h4>MANAGE YOUR <span class="blue-colored-text">BANK</span></h4>
                <p>Update your given bank details if you have done a specific change in regard of the bank.</p>
                <button onclick="window.open('bank_requests.php','_self');">Request an Update</button>
            </div>
        </div>

        <!-- Three Columns -->
        <div class="bank-columns-container">
            <div class="bank-columns-items">
                <h5>AVAILABLE LOANS</h5>
                <p>View the amount of loans given to the customers at a glance to make a decision regarding the bank position and about the future behavior of the bank</p>
                <button onclick="window.open('bank_view_customer_loans.php','_self');">View Loans</button>
            </div>
            <div class="bank-columns-items">
                <h5>AVAILABLE MORTGAGES</h5>
                <p>Get an idea about the amount sent from the bank on behalf of the mortgages to the customers to get a real idea about the value of the assets available in the bank</p>
                <button onclick="window.open('bank_view_customer_mortgages.php','_self')">View Mortgages</button>
            </div>
            <div class="bank-columns-items">
                <h5>AVAILABLE CUSTOMERS</h5>
                <p>Reveiw the requests done by the customers of your bank to loosen their seriousness of the rules and the regulations given by your bank when doing the transactions</p>
                <button onclick="window.open('bank_view_customer_details.php','_self');">View Customers</button>
            </div>
            <!-- <div class="bank-columns-items">
                <h5>AVAILABLE SAVINGS</h5>
                <p>Reveiw the requests done by the customers of your bank to loosen their seriousness of the rules and the regulations given by your bank when doing the transactions</p>
                <button>View Savings</button>
            </div> -->
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
                <li><a href="bank_customer_registration.php">REGISTER CUSTOMERS</a></li>
                <li><a href="bank_view_customer_details.php">VIEW CUSTOMERS</a></li>
                <li><a href="#">AVAILABLE BANKS</a></li>
            </ul>
        </nav>
        <a class="cta" href="bank_logout.php"><button>LOGOUT</button></a>
    </header> -->

    <!-- Common header ends here -->
        
        <!-- <div class="container" id="bank_header">
            <h1>BANK HOME PAGE</h1>

            </br><h2>WELCOME <?php echo $_SESSION['current_b_id']; ?> </h2>

        </div> -->
    </body>



</html>
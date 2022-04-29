<!DOCTYPE html>
<?php

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])) {
    header("Location: bank_login.php?error=Please Login First!");
}

$current_id = $_GET["customer_nic"];


?>

<html lang="en">

<head>
    <title>Send Email to Customer</title>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awsome library -->
    <script src="https://kit.fontawesome.com/d50e96d6ab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="login_box.css">
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
                    <a href="bank_home.php" class="menu-item-txt" id="topnav-home"><i class="fas fa-home"></i></a>
                    <a href="bank_manage_customers.php" class="menu-item-txt" id="topnav-home">MANAGE CUSTOMERS</a>
                    <a href="bank_view_customer_details.php" class="menu-item-txt" id="topnav-about">VIEW CUSTOMERS</a>
                    <a href="" class="menu-item-txt">BANKS AVAILABLE</a>
                    <button class="menu-item-btn" onclick="myFunction3()" id="pc-signin-btn">Profile</button>
                </div>
            </div>
        </div>
        <div class="pc-signin" id="pc-signin">
            <h3>Logged in as : </h3>
            <?php
            echo ("<p>Bank : " . $_SESSION["crnt_b_address"] . "</p>");
            echo ("<p>District : " . $_SESSION["crnt_b_district"] . "</p>");
            echo ("<p>ID : " . $_SESSION["crnt_b_id"] . "</p>");
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
            <a href="bank_home.php">BANK HOME</a>
            <a href="bank_manage_customers.php">MANAGE CUSTOMERS</a>
            <a href="bank_view_customer_details.php">VIEW CUSTOMERS</a>
            <a href="">BANKS AVAILABLE</a>
        </div>
        <div class="dropdown-signin" id="dropdown-signin">
            <h3>Logged in as : </h3>

            <?php
            echo ("<p>Bank : " . $_SESSION["crnt_b_address"] . "</p>");
            echo ("<p>District : " . $_SESSION["crnt_b_district"] . "</p>");
            echo ("<p>ID : " . $_SESSION["crnt_b_id"] . "</p>");
            ?>

            <input type="button" value="Sign Out" onclick="window.open('bank_logout.php', '_self');">
        </div>
    </div>

    <!-- User Updating Form -->

    <div id="customer-update-section">
        <div class="contact-form-container">
            <div class="contact-form">
                <h3>SEND AN EMAIL TO <?php echo $current_id; ?></h3><br>
                <form action="bank_customer_contact_sender.php?customer_nic=<?php echo $current_id; ?>" method="POST">
                    <div class="contact-form-inputs">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?>
                            </p>
                        <?php } ?>
                        <input type="text" name="email_subject" id="email_subject" placeholder="Subject" class="contact-txt" value="" required>

                        <select name="email_type_selector" id="type_selector" onchange = "showOtherDropdown()" class="contact-txt">
                            <option value="Savings">Savings</option>
                            <option value="Loans">Loans</option>
                            <option value="Mortgage">Mortgage</option>
                            <option value="Other" id = "other_select" >Other</option>
                        </select>

                        <input type="text" name="email_type" id="email_type" placeholder="Category" class="contact-txt" value="" style = "display:none;">


                        <!-- <input type="text" name="ch_lname" id="c_lname" placeholder="Last Name" class="contact-txt" value="" required> -->
                        
                        <textarea name="email_message" id="" cols="30" rows="10" class="contact-txt" placeholder="Last Name"></textarea>
                        
                        <input type="submit" id="btn_submit" value="SEND" class="contact-btn">
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

    <script>
        function showOtherDropdown() {
            
            // const other_type = document.getElementById("other_select");
            const other_text = document.getElementById("email_type");

            var sel = document.getElementById("type_selector");
            var val = sel.options[sel.selectedIndex].value;
            
            if(val == 4){
                other_text.style.display = "block";
            }
            else {
                other_text.style.display = "none";
            }
        }
    </script>

</body>

</html>
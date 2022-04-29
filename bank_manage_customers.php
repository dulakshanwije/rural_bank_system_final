<!DOCTYPE html>

<?php
require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])) {
    header("Location: bank_login.php?error=Please Login First!");
}
$current_bank_id = $_SESSION["crnt_b_id"];

if (isset($_POST["bank_q"])) {

    $value = $_POST["bank_q"];

    $delimiter = " ";
    $words =  explode($delimiter, $value);

    // $num_data = count($words);
    $count = 0;
    $sql_append_final = null;
    foreach ($words as $word) {
        $count++;
        if ($word != null) {
            $sql_append = "customer_first_name = '$word' OR customer_last_name = '$word' OR customer_email = '$word' OR customer_nic = '$word' OR customer_phone_number = '$word'";
        } else {
            $sql_append = null;
        }
        if ($count == 1) {
            $sql_append_final .= $sql_append;
        } else {
            $sql_append_final .= " OR " . $sql_append;
        }
    }
    // $sql = "SELECT * FROM $table WHERE customer_first_name = '$words[0]' OR customer_last_name = '$words[0]' OR customer_last_name = '$words[1]' OR customer_first_name = '$words[1]'";
    $sql = "SELECT * FROM customer_table WHERE customer_bank_id = '$current_bank_id' AND ($sql_append_final)";
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customers</title>

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
                    <a href="bank_home.php" class="menu-item-txt"><i class="fas fa-home"></i></a>
                    <a href="#" class="menu-item-txt">OTHER BANKS</a>
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
            <!-- <a href="bank_customer_registration.php">REGISTER CUSTOMERS</a>
        <a href="bank_view_customer_details.php">VIEW CUSTOMERS</a> -->
            <a href="bank_home.php">BANK HOME</a>
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

    <!-- Bank Home Body  -->

    <div class="bank-home-container">
        <div class="bank-img-container">
            <div class="bank-image-txt-holder">
                <h4>MANAGE YOUR <span class="blue-colored-text">CUSTOMERS</span></h4>
                <p>Update your customers' details if you have done a specific change in regard of the customer.</p>
                <div class="bank_serach_bar">
                    <form action="bank_manage_customers.php" method="POST">
                        <input type="text" name="bank_q" id="bank-search" placeholder="Enter NIC/Name/Email/Phone">
                        <!-- <input type="submit" value="SEARCH" class = "bank-btn"> -->
                        <button type="submit" value="SEARCH" id="bank-btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>

                <?php
                echo '<div class = "bank_search_results">';
                if (isset($_POST["bank_q"])) {
                    if ($_POST["bank_q"] != null) {

                        if ($result = mysqli_query($conn, $sql)) {
                            // $res = mysqli_fetch_assoc($result);
                            while ($res = mysqli_fetch_assoc($result)) {
                                echo '
                  <p><a href = "bank_customer_profile.php?customer_nic=' . $res["customer_nic"] . '">
                  <i class="far fa-address-card"></i> ' . $res["customer_nic"] .
                                    ' | <i class="far fa-user"></i> ' . $res["customer_first_name"] .
                                    ' ' . $res["customer_last_name"] . '
                  </a></p>
                  ';
                            }
                        }
                        if (isset($result)) {
                            if (mysqli_num_rows($result) < 1) {
                                echo '
                    <p>Nothing found. Please try again.</p>
                    ';
                            }
                        }
                    } else {
                        echo '
            <p>Please enter a valid NIC, name, email or phone number.</p>
            ';
                    }
                } else {
                    echo '
        <p>You can search your customers by their NIC, name, email or phone number.</p>
        ';
                }
                echo '</div>';
                ?>
            </div>
        </div>

        <!-- Three Columns -->
        <div class="bank-columns-container">
            <div class="bank-columns-items">
                <h5>REGISTER CUSTOMERS</h5>
                <!-- <p>View the amount of loans given to the customers at a glance to make a decision regarding the bank position and about the future behavior of the bank</p> -->
                <button onclick="window.open('bank_customer_registration.php','_self');">VISIT</button>
            </div>
            <div class="bank-columns-items">
                <h5>VIEW REGISTERED CUSTOMERS</h5>
                <!-- <p>Get an idea about the amount sent from the bank on behalf of the mortgages to the customers to get a real idea about the value of the assets available in the bank</p> -->
                <button onclick="window.open('bank_view_customer_details.php','_self');">VISIT</button>
            </div>
            <div class="bank-columns-items">
                <h5>CUSTOMER REQUESTS</h5>
                <!-- <p>Reveiw the requests done by the customers of your bank to loosen their seriousness of the rules and the regulations given by your bank when doing the transactions</p> -->
                <button onclick="window.open('bank_view_customer_requests.php','_self');">VISIT</button>
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

    <!-- <script>
        function showHint(str) {
            
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            xmlhttp.open("GET", "gethint.php?q=" + str);
            xmlhttp.send();
            }
        }
    </script> -->

</body>

</html>
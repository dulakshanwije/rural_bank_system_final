<!DOCTYPE html>

<?php

// session_start(); wheere bank ID danna oni      onclick="window.location.href='https://w3docs.com';"    

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])) {
    header("Location: bank_login.php?error=Please Login First!");
}

if (isset($_GET["reg"])) {
    echo "<script> alert('Customer Details Updated Successfully!');</script>";
}

$current_bank_id = $_SESSION["crnt_b_id"];

$sql = "SELECT customer_nic, customer_first_name, customer_last_name, customer_email,customer_gender, customer_address, customer_phone_number, customer_account_status FROM customer_table WHERE customer_bank_id = '$current_bank_id'";

$result = mysqli_query($conn, $sql);
// customer_nic, customer_first_name, customer_last_name, customer_email,customer_gender, customer_address, customer_phone_number, customer_account_status

?>

<html lang="en">

<head>

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
    <link href="table_styles.css" rel="stylesheet" type="text/css">


    <link href="utility_style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <title>Customer Details</title>

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
                    <a href="bank_manage_customers.php" class="menu-item-txt" id="topnav-home">MANAGE</a>
                    <a href="bank_view_customer_requests.php" class="menu-item-txt" id="topnav-about">REQUESTS</a>
                    <!-- <a href="#" class="menu-item-txt">OTHER BANKS</a> -->
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
            <a href="bank_customer_registration.php">REGISTER CUSTOMERS</a>
            <a href="bank_manage_customers.php">MANAGE CUSTOMERS</a>
            <a href="bank_view_customer_requests.php">CUSTOMER REQUESTS</a>
            <!-- <a href="">BANKS AVAILABLE</a> -->
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


    <div id="table_design" class="table-container">

        <?php


        echo "<h3>Login as $current_bank_id</h3></br>";

        echo "<table class= 'table' >";
        echo "<thead>";
        echo "<tr>";
        echo "<th> NIC</th>";
        echo "<th> First Name </th>";
        echo "<th> Last Name </th>";
        echo "<th> Email </th>";
        echo "<th> Gender </th>";
        echo "<th> Addrress </th>";
        echo "<th> Phone Number</th>";
        echo "<th> Activation Status</th>";
        echo "<th> Update Details </th>";
        // echo "<th> Delete Customer </th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            $get_acc_no = "";
            $table_heading = "";
            foreach ($res as $key => $value) {
                if ($key == "customer_nic") {
                    $get_acc_no = $value;
                }
                switch ($key) {
                    case "customer_nic":
                        $table_heading = "NIC";
                        break;
                    case "customer_first_name":
                        $table_heading = "First Name";
                        break;
                    case "customer_last_name":
                        $table_heading = "Last Name";
                        break;
                    case "customer_email":
                        $table_heading = "Email";
                        break;
                    case "customer_gender":
                        $table_heading = "Gender";
                        break;
                    case "customer_address":
                        $table_heading = "Address";
                        break;
                    case "customer_phone_number":
                        $table_heading = "Phone Number";
                        break;
                    case "customer_account_status":
                        $table_heading = "Activation Status";
                        break;
                        // case "customer_nic":
                        //     $table_heading = "Customer NIC";
                        //     break;

                }
                echo "<td d_lbl=\"" . $table_heading . "\"><p>" . $value . "</p></td>";
            }

            // echo "<td><p><a href='customer_data_update.php?get_acc_no=$get_acc_no'>Edit</a></p></td>";
            // echo "<td><p><a href='customer_data_delete.php?get_acc_no=$get_acc_no'>Delete</a></p></td>";

            // echo "<td><input type=\"button\" onclick=\"window.location.href='customer_data_update.php?get_acc_no=$get_acc_no';\" value=\"update\"></td>";

            echo "<td d_lbl=\"Update Details\"class=\"update\"><a class=\"update_link updt_btn\" href=\"bank_customer_profile.php?customer_nic=" . $get_acc_no . "\">View Profile</td></a>";

            // echo "<td d_lbl=\"Delete Customer\" class=\"delete\"><a class=\"delete_link dlt_btn\" onclick=\"return confirm('Delete this record?')\" href=\"customer_data_delete.php?get_acc_no=".$get_acc_no."\">Delete</td></a>";
            echo "</tr>";
        }
        echo "</tbody>";

        echo "</table>";

        ?>
        <div class="btn-container">
            <button onclick="window.open('bank_customer_registration.php','_self');"><i class="fas fa-user-plus"></i>&#9; ADD NEW CUSTOMER</button>
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
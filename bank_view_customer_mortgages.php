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

$sql = "SELECT * FROM mortgage_table WHERE bank_id = '$current_bank_id'";

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

    <title>Customer Mortgages</title>

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
                    <a href="bank_view_customer_loans.php" class="menu-item-txt" id="topnav-about">LOANS</a>
                    <a href="bank_view_customer_details.php" class="menu-item-txt">CUSTOMERS</a>
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
            <a href="bank_view_customer_loans.php">CUSTOMER LOANS</a>
            <a href="bank_view_customer_details.php">VIEW CUSTOMERS</a>
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
        echo "<th> Mortgage ID </th>";
        echo "<th> Descr. </th>";
        echo "<th> Value </th>";
        echo "<th> Amt. </th>";
        echo "<th> Interest Rate (%) </th>";
        echo "<th> Interest Amt. </th>";
        echo "<th> Full Amt. </th>";
        echo "<th> Instalm. </th>";
        echo "<th> Payment per Instalm. </th>";
        echo "<th> Amt. Remaining </th>";
        echo "<th> Issued Date </th>";
        echo "<th> Due Date </th>";
        echo "<th> Days per Instalm. </th>";
        echo "<th> Customer NIC </th>";
        echo "<th> Remaining Days </th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            $get_acc_no = "";
            $table_heading = "";
            foreach ($res as $key => $value) {
                if ($key == "bank_id") {
                    continue;
                }
                switch ($key) {
                    case "mortgage_id":
                        $table_heading = "Mortgage ID";
                        break;
                    case "customer_nic":
                        $table_heading = "NIC";
                        break;
                    case "mortgage_item_description":
                        $table_heading = "Item Description";
                        break;
                    case "mortgage_item_value":
                        $table_heading = "Item Value";
                        break;
                    case "mortgage_amount":
                        $table_heading = "Amount";
                        break;
                    case "mortgage_interest_rate":
                        $table_heading = "Interest Rate (%)";
                        break;
                    case "mortgage_interest_amount":
                        $table_heading = "Interest Amount";
                        break;
                    case "mortgage_full_amount":
                        $table_heading = "Full Amount";
                        break;
                    case "mortgage_payment_installments":
                        $table_heading = "Installments";
                        break;
                    case "mortgage_monthly_payment_amount":
                        $table_heading = "Payment per Installment";
                        break;
                    case "mortgage_payment_remained":
                        $table_heading = "Amount Remaining";
                        break;
                    case "mortgage_issued_date":
                        $table_heading = "Issued Date";
                        break;
                    case "mortgage_full_payment_due_date":
                        $table_heading = "Due Date";
                        break;
                    case "mortgage_days_per_installment":
                        $table_heading = "Days per Installment";
                        break;
                        // case "customer_nic":
                        //     $table_heading = "Customer NIC";
                        //     break;

                }
                echo "<td d_lbl=\"" . $table_heading . "\"><p>" . $value . "</p></td>";
            }
            $future = $res["mortgage_full_payment_due_date"];
            $future = date_create($future);
            $current_date = date('Y-m-d');
            $current_date = date_create($current_date);
            $diff = date_diff($current_date, $future);
            $days_left =  $diff->format("%a days left");

            echo '
                            <td d_lbl = "Remaining Days">' . $days_left . '</td>
                            ';

            // echo "<td><p><a href='customer_data_update.php?get_acc_no=$get_acc_no'>Edit</a></p></td>";
            // echo "<td><p><a href='customer_data_delete.php?get_acc_no=$get_acc_no'>Delete</a></p></td>";

            // echo "<td><input type=\"button\" onclick=\"window.location.href='customer_data_update.php?get_acc_no=$get_acc_no';\" value=\"update\"></td>";
            // echo "<td d_lbl=\"Delete Customer\" class=\"delete\"><a class=\"delete_link dlt_btn\" onclick=\"return confirm('Delete this record?')\" href=\"customer_data_delete.php?get_acc_no=".$get_acc_no."\">Delete</td></a>";
            echo "</tr>";
        }
        echo "</tbody>";

        echo "</table>";

        ?>
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
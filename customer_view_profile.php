<?php

require_once("db_conn.php");
if (!isset($_SESSION["current_acc"])) {
    header("Location: customer_login.php?error=Please Login First!");
}

$customer_id = $_SESSION["current_acc"];
$sql = "SELECT * FROM customer_table WHERE customer_nic = '$customer_id'";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awsome library -->
    <script src="https://kit.fontawesome.com/d50e96d6ab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="profile_page.css">
    <!-- <link rel="stylesheet" href="profile_page_11.css"> -->
    <script src="script.js"></script>
    <script src="profile_page.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <title>Customer Profile</title>

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
                    <a href="customer_home.php" class="menu-item-txt" id="topnav-home">Customer Home</a>

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
            <a href="customer_home.php">Customer Home</a>

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

    <!-- Main Profile Container  -->
    <div class="main_profile_container">
        <div class="profile_details">
            <table>
                <?php

                if ($res["customer_remove_status"] == 'Yes') {
                    echo '
                <tr>
                <td colspan = "3" style = "color:#9c1809;"><center><h2>REMOVED ACCOUNT !</h2></center></td>
                </tr>
                ';
                }
                echo '
                <tr>
                <td><i class="fas fa-user"></i></td>
                <td>Full Name :</td>
                <td>
                    <p>' . $res["customer_first_name"] . ' ' . $res["customer_last_name"] . '</p>
                </td>
                </tr>
                <tr>
                <td><i class="fas fa-at"></i></td>
                <td>Email :</td>
                <td>
                <p>' . $res["customer_email"] . '</p>
                </td>
                </tr>
                <tr>
                <td><i class="far fa-id-card"></i>&nbsp;&nbsp;</td>
                <td>NIC :</td>
                <td>
                <p>' . $res["customer_nic"] . '</p>
                </td>
                </tr>
                <tr>
                <td><i class="fas fa-home"></i></td>
                <td>Address :</td>
                <td>
                <p>' . $res["customer_address"] . '</p>
                </td>
                </tr>
                <tr>
                <td><i class="fas fa-phone-alt"></i></td>
                <td>Phone Number :</td>
                <td>
                <p>' . $res["customer_phone_number"] . '</p>
                </td>
                </tr>
                
                ';

                if ($res["customer_gender"] == 'Male') {
                    echo '
                    <tr>
                    <td><i class="fas fa-male"></i></td>
                    <td>Gender :</td>
                    <td>
                    <p>' . $res["customer_gender"] . '</p>
                    </td>
                    </tr>
                    ';
                } else if ($res["customer_gender"] == 'Female') {
                    echo '
                    <tr>
                    <td><i style = "font-size:25px;" class="fas fa-female"></i></td>
                    <td>Gender :</td>
                    <td>
                    <p>' . $res["customer_gender"] . '</p>
                    </td>
                    </tr>
                    ';
                }

                if ($res["customer_account_status"] == 'Deactive') {
                    echo '
                <tr>
                <td><i class="fas fa-file-invoice"></i></td>
                <td>Account :</td>
                <td>
                <p>' . $res["customer_account_status"] . ' <i class="fas fa-times"></i></p>
                </td>
                </tr>
                ';
                } else if ($res["customer_account_status"] == 'Active') {
                    echo '
                <tr>
                <td><i class="fas fa-file-invoice"></i></td>
                <td>Account :</td>
                <td>
                <p>' . $res["customer_account_status"] . ' <i class="fas fa-check"></i></p>
                </td>
                </tr>
                ';
                }

                ?>

            </table>
        </div>
        <div style="height: 50px;">

        </div>
        <div class="user_bank_details">
            <div class="menu_tab_container">
                <div class="menu_btn_holder">
                    <button id="tab_btn_loan" class="tab_btn tab_btn_active" onclick="viewLoans()">Loans</button>
                </div>

                <div class="menu_btn_holder">
                    <button id="tab_btn_mortgages" class="tab_btn" onclick="viewMortgages()">Mortgages</button>
                </div>

            </div>
            <div class="menu_details_container">
                <div class="loan_details" id="loan_details">
                    <?php

                    $sql_loans = "SELECT * FROM loan_table WHERE customer_nic = '$customer_id'";
                    $result_loans = mysqli_query($conn, $sql_loans);
                    if (mysqli_num_rows($result_loans) > 0) {
                        while ($row_loan = mysqli_fetch_assoc($result_loans)) {

                            echo '
                        <div class="single_data_holder">
                            <h4>Loan Index No :' . $row_loan["loan_id"] . '</h4>
                            <table>

                            <tr>
                                <td>Loan ID : </td>
                                <td>' . $row_loan["loan_id"] . '</td>
                            </tr>
                            <tr>
                                <td>Loan Amount : </td>
                                <td>' . $row_loan["loan_amount"] . '</td>
                            </tr>
                            <tr>
                                <td>Loan Interest Rate (%) : </td>
                                <td>' . $row_loan["loan_interest_rate"] . '</td>
                            </tr>
                            <tr>
                                <td>Loan Full Amount : </td>
                                <td>' . $row_loan["loan_full_amount"] . '</td>
                            </tr>
                            <tr>
                                <td>Number of Installments : </td>
                                <td>' . $row_loan["loan_payment_installments"] . '</td>
                            </tr>
                            <tr>
                                <td>Single Installment Amount : </td>
                                <td>' . $row_loan["loan_monthly_payment_amount"] . '</td>
                            </tr>
                            <tr>
                                <td>Remaining Loan Amount : </td>
                                <td>' . $row_loan["loan_payment_remained"] . '</td>
                            </tr>
                            <tr>
                                <td>Loan Issued Date : </td>
                                <td>' . $row_loan["loan_issued_date"] . '</td>
                            </tr>
                            ';
                            $future = $row_loan["loan_full_payment_due_date"]; //Future date.
                            $future = date_create($future);
                            $current_date = date('Y-m-d');
                            $current_date = date_create($current_date);
                            $diff = date_diff($current_date, $future);
                            $days_left =  $diff->format("%a days left");
                            // $timeleft = $future-$timefromdb;
                            // $daysleft = date_diff($future, $timefromdb);
                            // echo $daysleft;
                            echo '
                            <tr>
                                <td>Loan Due Date : </td>
                                <td>' . $row_loan["loan_full_payment_due_date"] . '</td>
                            </tr>
                            <tr>
                                <td>Remaing Days : </td>
                                <td>' . $days_left . '</td>
                            </tr>
                            <tr>
                                <td>Days per Installments : </td>
                                <td>' . $row_loan["loan_days_per_installment"] . '</td>
                            </tr>
                            </table>
                        </div>
                        <hr>
                        <br>
                        ';
                        }
                    } else {
                        echo '
                    <div class="single_data_holder">
                        <h4>No Loan Details Found!</h4>
                        <p>
                            There are no loan details under the NIC number
                             ' . $customer_id . '.
                        </p>
                    </div>
                    ';
                    }
                    ?>
                </div>
                <div class="mortgage_details" id="mortgage_details">
                    <?php

                    $sql_mortgages = "SELECT * FROM mortgage_table WHERE customer_nic = '$customer_id'";
                    $result_mortgage = mysqli_query($conn, $sql_mortgages);
                    if (mysqli_num_rows($result_mortgage) > 0) {
                        while ($row_mortg = mysqli_fetch_assoc($result_mortgage)) {

                            echo '
                        <div class="single_data_holder">
                            <h4>Mortgage Index No :' . $row_mortg["mortgage_id"] . '</h4>
                            <table>

                            <tr>
                                <td>Mortgage ID : </td>
                                <td>' . $row_mortg["mortgage_id"] . '</td>
                            </tr>
                            <tr>
                                <td>Item Description : </td>
                                <td>' . $row_mortg["mortgage_item_description"] . '</td>
                            </tr>
                            <tr>
                                <td>Item Value : </td>
                                <td>' . $row_mortg["mortgage_item_value"] . '</td>
                            </tr>
                            <tr>
                                <td>Mortgage Amount : </td>
                                <td>' . $row_mortg["mortgage_amount"] . '</td>
                            </tr>
                            <tr>
                                <td>Interest Rate (%) : </td>
                                <td>' . $row_mortg["mortgage_interest_rate"] . '</td>
                            </tr>
                            <tr>
                                <td>Interest Amount : </td>
                                <td>' . $row_mortg["mortgage_interest_amount"] . '</td>
                            </tr>
                            <tr>
                                <td>Mortgage Full Amount : </td>
                                <td>' . $row_mortg["mortgage_full_amount"] . '</td>
                            </tr>
                            <tr>
                                <td>Number of Installments : </td>
                                <td>' . $row_mortg["mortgage_payment_installments"] . '</td>
                            </tr>
                            <tr>
                                <td>Installment Amount : </td>
                                <td>' . $row_mortg["mortgage_monthly_payment_amount"] . '</td>
                            </tr>
                            <tr>
                                <td>Remaining Amount : </td>
                                <td>' . $row_mortg["mortgage_payment_remained"] . '</td>
                            </tr>
                            <tr>
                                <td>Mortgage Issued Date : </td>
                                <td>' . $row_mortg["mortgage_issued_date"] . '</td>
                            </tr>
                            ';
                            $future = $row_mortg["mortgage_full_payment_due_date"];
                            $future = date_create($future);
                            $current_date = date('Y-m-d');
                            $current_date = date_create($current_date);
                            $diff = date_diff($current_date, $future);
                            $days_left =  $diff->format("%a days left");
                            echo '
                            <tr>
                                <td>Mortgage Due Date : </td>
                                <td>' . $row_mortg["mortgage_full_payment_due_date"] . '</td>
                            </tr>
                            <tr>
                                <td>Remaing Days : </td>
                                <td>' . $days_left . '</td>
                            </tr>
                            <tr>
                                <td>Days per Installments : </td>
                                <td>' . $row_mortg["mortgage_days_per_installment"] . '</td>
                            </tr>
                            </table>
                        </div>
                        <hr>
                        <br>
                        ';
                        }
                    } else {
                        echo '
                    <div class="single_data_holder">
                        <h4>No Mortgage Details Found!</h4>
                        <p>
                            There are no mortgage details under the NIC number
                             ' . $customer_id . '.
                        </p>
                    </div>
                    ';
                    }
                    ?>
                </div>
                <!-- <div class="savings_details" id="savings_details">
                <div class="single_data_holder">
                    <h4>Savings</h4>
                <p>You have a choice of fixed or floating interest rates.
                    Ability to apply via ComBank Digital - If you are already registered for our ComBank Digital online banking facility, now you can apply for Personal Loans online from where ever you are at a time convenient to you.
                    Your loan will be processed within a maximum of three working days, after submitting the loan application with all required documents.
                    You can talk to our loan officers for advice and guidance at any time before and during the repayment period of your loan</p>
                </div>
            </div> -->
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
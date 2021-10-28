<?php

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])) {
    header("Location: bank_login.php?error=Please Login First!");
}

$current_bank = $_SESSION["crnt_b_id"];
$customer_id = $_GET["customer_nic"];
$sql = "SELECT * FROM customer_table WHERE customer_nic = '$customer_id'";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($result);

$sql_bank = "SELECT bank_password FROM bank_table WHERE bank_id = '$current_bank'";
$result_bank = mysqli_query($conn, $sql_bank);
$res_bank = mysqli_fetch_assoc($result_bank);

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

    <script>
        function validatePassword() {
            var currentPass = "<?php echo $res_bank["bank_password"]; ?>";
            var inputPass = document.getElementById("input_pass").value;

            if (inputPass == currentPass) {
                window.open("bank_customer_remover.php?customer_nic=<?php echo $customer_id; ?>", "_self");
            } else {
                document.getElementById("pass_error").innerHTML = "Incorrect Password, Try Again !";
            }
        }

        function activeValidatePass() {
            var currentPass = "<?php echo $res_bank["bank_password"]; ?>";
            var inputPass = document.getElementById("act_input_pass").value;

            if (inputPass == currentPass) {
                window.open("bank_customer_activator.php?customer_nic=<?php echo $customer_id; ?>", "_self");
            } else {
                document.getElementById("act_pass_error").innerHTML = "Incorrect Password, Try Again !";
            }
        }
    </script>

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
                    <!-- <a href="" class="menu-item-txt">BANKS AVAILABLE</a> -->
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
            <a href="bank_manage_customers.php">MANAGE CUSTOMERS</a>
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
        <div class="profile_btn_container">
            <?php
            if ($res["customer_account_status"] == 'Deactive') {
                echo '
                    <button class="profile_btn active_btn" onclick = "actconfirmPopup()">Activate Profile</button>
                    ';
            } else if ($res["customer_account_status"] == 'Active') {
                echo '
                    <button class="profile_btn deactive_btn" onclick = "actconfirmPopup()">Deactivate Profile
                    </button>';
            }
            ?>
            <button class="profile_btn update_btn" onclick="window.open('customer_data_update.php?customer_nic=<?php echo $res['customer_nic']; ?>','_self');">Update Profile</button>
            <?php
            if ($res["customer_remove_status"] == 'Yes') {
                echo '
                    <button class="profile_btn delete_btn profile_btn_disable" id = "cus_dlt_btn" onclick = "dltconfirmPopup()" disabled>Remove Profile</button>
                    ';
            } else {
                echo '
                    <button class="profile_btn delete_btn" id = "cus_dlt_btn" onclick = "dltconfirmPopup()">Remove Profile</button>
                    ';
            }

            ?>
        </div>
        <div class="profile_delete_confirm" id="profile_delete_confirm">
            <h3>Enter Bank Password :</h3>
            <p>(Please enter your bank password to continue the process)</p>
            <h4 id="pass_error"></h4>
            <input id="input_pass" type="password" placeholder="Password">
            <input type="submit" value="Confirm" onclick="validatePassword()">
            <span id="cus_dlt_icon" onclick="dltClose()"><i class="fas fa-window-close"></i></span>
        </div>
        <div class="profile_delete_confirm profile_active_confirm" id="profile_active_confirm">
            <h3>Enter Bank Password :</h3>
            <p>(Please enter your bank password to continue the process)</p>
            <h4 id="act_pass_error"></h4>
            <input id="act_input_pass" type="password" placeholder="Password">
            <input type="submit" value="Confirm" onclick="activeValidatePass()">
            <span id="cus_dlt_icon" onclick="actClose()"><i class="fas fa-window-close"></i></span>
        </div>

        <!-- <div class="bank-columns-container">
            <div class="bank-columns-items">
                <h5>CUSTOMER'S LOANS</h5>
                <button onclick = "window.open('bank_customer_registration.php','_self');">VISIT</button>
            </div>
            <div class="bank-columns-items">
                <h5>CUSTOMER'S MORTGAGES</h5>
                <button onclick = "window.open('bank_view_customer_details.php','_self');">VISIT</button>
            </div>
            <div class="bank-columns-items">
                <h5>CUSTOMER'S SAVINGS</h5>
                <button onclick = "window.open('bank_view_customer_requests.php','_self');">VISIT</button>
            </div>
        </div>
        </div> -->

        <div class="user_bank_details">
            <div class="menu_tab_container">
                <div class="menu_btn_holder">
                    <button id="tab_btn_loan" class="tab_btn tab_btn_active" onclick="viewLoans()">Loans</button>
                    <span class="tab_add_icon">
                        <a href="bank_customer_loan.php?customer_nic=<?php echo $customer_id; ?>">
                            <i class="far fa-plus-square"></i>
                        </a>
                    </span>
                </div>

                <div class="menu_btn_holder">
                    <button id="tab_btn_mortgages" class="tab_btn" onclick="viewMortgages()">Mortgages</button>
                    <span class="tab_add_icon">
                        <a href="bank_customer_mortgage.php?customer_nic=<?php echo $customer_id; ?>">
                            <i class="far fa-plus-square"></i>
                        </a>
                    </span>
                </div>

                <!-- <div class="menu_btn_holder">
                <button id = "tab_btn_savings" class="tab_btn" onclick="viewSavings()">Savings</button>
                <span class = "tab_add_icon">
                <a href="bank_customer_savings.php?customer_nic=<?php echo $customer_id; ?>">
                    <i class="far fa-plus-square"></i></span>
                </a>    
            </div> -->
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
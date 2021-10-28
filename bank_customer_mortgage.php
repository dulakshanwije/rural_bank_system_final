<?php
require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])) {
    header("Location: bank_login.php?error=Please Login First!");
}

$customer_id = $_GET["customer_nic"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer Mortgages</title>

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
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
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

    <!-- Add Customer Loan Details -->

    <div id="bank-loan-form-section">
        <div class="contact-form-container">
            <div class="contact-form">
                <h3>ADDING MORTGAGE DETAILS OF <?php echo $customer_id; ?></h3>
                <form action="bank_customer_mortgage_adder.php?customer_nic=<?php echo $customer_id; ?>" method="POST" onchange="autoMortgCalculation()">
                    <div class="contact-form-inputs">
                        <div class="bank-form-head-txt">
                            <input type="checkbox" id="auto_checker_mort" name="auto_checker_mort" value="auto_checked" checked>
                            <label for="auto_checker_mort">Auto Calculate</label>
                        </div>
                        <label for="mortgage_description" class="bank-form-lable-txt">Item Description :</label>
                        <textarea name="mortgage_description" id="mortgage_description" cols="30" rows="4" class="contact-txt" required></textarea>

                        <label for="mortgage_item_value" class="bank-form-lable-txt">Mortgage Item Value :</label>
                        <input id="mortgage_item_value" name="mortgage_item_value" type="number" step="0.01" class="contact-txt" onchange="autoMortgCalculation()" required>

                        <label for="mortgage_amount" class="bank-form-lable-txt">Mortgage Amount :</label>
                        <input id="mortgage_amount" name="mortgage_amount" type="number" step="0.01" class="contact-txt" onchange="autoMortgCalculation()" required>

                        <label for="mortgage_interest" class="bank-form-lable-txt">Mortgage Interest Rate (%) :</label>
                        <input id="mortgage_interest" name="mortgage_interest" type="number" step="0.01" class="contact-txt" onchange="autoMortgCalculation()" required>

                        <label for="mortgage_interest_amount" class="bank-form-lable-txt">Mortgage Interest Amount :</label>
                        <input id="mortgage_interest_amount" name="mortgage_interest_amount" type="number" step="0.01" class="contact-txt" onchange="autoMortgCalculation()" required>

                        <label for="mortgage_full_amount" class="bank-form-lable-txt">Mortgage Full Amount :</label>
                        <input id="mortgage_full_amount" name="mortgage_full_amount" type="number" step="0.01" class="contact-txt" onchange="autoMortgCalculation()" required>

                        <label for="mortgage_payment_installment" class="bank-form-lable-txt">Payment Installments :</label>
                        <input id="mortgage_payment_installment" name="mortgage_payment_installment" type="number" step="0.01" class="contact-txt" required>

                        <label for="monthly_mortgage_payment_amount" class="bank-form-lable-txt">Payment Amount per Installment :</label>
                        <input id="monthly_mortgage_payment_amount" name="monthly_mortgage_payment_amount" type="number" step="0.01" class="contact-txt" onchange="autoMortgCalculation()" required>

                        <label for="mortgage_issued_date" class="bank-form-lable-txt">Mortgage Issued Date :</label>
                        <input type="text" name="mortgage_issued_date" id="mortgage_issued_date" class="contact-txt" onfocus="(this.type = 'date')" required>

                        <label for="mortgage_due_date" class="bank-form-lable-txt">Mortgage Due Date :</label>
                        <input type="text" name="mortgage_due_date" id="mortgage_due_date" class="contact-txt" onfocus="(this.type = 'date')" required>

                        <label for="single_installment_days" class="bank-form-lable-txt">Days per Single Installment :</label>
                        <input type="number" class="contact-txt" id="single_installment_days" name="single_installment_days" onchange="autoMortgCalculation()" required>

                        <div class="bank-form-head-txt" style="text-align: justify;">
                            <input type="checkbox" id="agreement_checker" name="agreement_checker" required>
                            <label for="agreement_checker">I hereby agree to be aware that the relevant Financial Documentations and Transactions regarding the details related to this form is ALREADY DONE VIA THE BANK PHYSICALLY, and this is just a documentary process storing the data which will be helpful to our customers.
                            </label>
                        </div>
                        <input type="submit" value="ADD DETAILS" class="contact-btn">
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
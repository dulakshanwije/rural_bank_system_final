<!DOCTYPE html>
<?php

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])) {
    header("Location: bank_login.php?error=Please Login First!");
}

$current_id = $_GET["customer_nic"];
$loan_id = $_GET["loan_id"];

$sql = "SELECT * FROM loan_table WHERE customer_nic = '$current_id'and loan_id = '$loan_id'";

$result = mysqli_query($conn, $sql);

$res = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result)) {

    $loan_id = $res["loan_id"];
    $loan_amount = $res["loan_amount"];
    $loan_interest_rate = $res["loan_interest_rate"];
    $loan_interest_amount = $res["loan_interest_amount"];
    $loan_full_amount = $res["loan_full_amount"];
    $loan_payment_installments = $res["loan_payment_installments"];
    $loan_monthly_payment_amount = $res["loan_monthly_payment_amount"];
    $loan_payment_remained = $res["loan_payment_remained"];
    $loan_full_payment_due_date = $res["loan_full_payment_due_date"];
    $loan_days_per_installment = $res["loan_days_per_installment"];
}

?>

<html lang="en">

<head>
    <title>Edit Loan Details</title>

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
                <h3>UPDATING DETAILS OF LOAN ID  <?php echo $loan_id; ?> OF <?php echo $current_id; ?></h3><br>
                <form action="bank_customer_loan_updater.php?loan_id=<?php echo $loan_id; ?>" method="POST">
                    <div class="contact-form-inputs">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?>
                            </p>
                        <?php } ?>
                        
                        <!-- Savnigs Type -->

                        <label for="loan_amount" class="contact-txt" style= "border:none;" >Loan Amount</label>
                        
                        <input type="text" name="loan_amount" id="" placeholder="Loan Amount" class="contact-txt" value="<?php echo $loan_amount; ?>" required>


                        <label for="loan_interest_rate" class="contact-txt" style= "border:none;" >Loan Interest Rate</label>

                        <input type="text" name="loan_interest_rate" id="" placeholder="Loan Interest Rate" class="contact-txt" value="<?php echo $loan_interest_rate; ?>" required>



                        <label for="loan_interest_amount" class="contact-txt" style= "border:none;" >Loan Interest Amount</label>

                        <input type="text" name="loan_interest_amount" id="" placeholder="Loan Interest Amount" class="contact-txt" value="<?php echo $loan_interest_amount; ?>" required>
                        
                        
                        <label for="loan_full_amount" class="contact-txt" style= "border:none;" >Loan Full Amount</label>

                        <input type="text" name="loan_full_amount" id="" placeholder="Loan Full Amount" class="contact-txt" value="<?php echo $loan_full_amount; ?>" required>


                        <label for="loan_full_amount" class="contact-txt" style= "border:none;" >Loan Full Amount</label>

                        <input type="text" name="loan_full_amount" id="" placeholder="Loan Full Amount" class="contact-txt" value="<?php echo $loan_full_amount; ?>" required>


                        <label for="loan_payment_installments" class="contact-txt" style= "border:none;" >Loan Payment Installments</label>

                        <input type="text" name="loan_payment_installments" id="" placeholder="Loan Payment Installments" class="contact-txt" value="<?php echo $loan_payment_installments; ?>" required>


                        <label for="loan_monthly_payment_amount" class="contact-txt" style= "border:none;" >Loan Monthly Payment Amount</label>

                        <input type="text" name="loan_monthly_payment_amount" id="" placeholder="Loan Monthly Payment Amount" class="contact-txt" value="<?php echo $loan_monthly_payment_amount; ?>" required>
                        
                        
                        <label for="loan_payment_remained" class="contact-txt" style= "border:none;" >Loan Payment Remainded</label>

                        <input type="text" name="loan_payment_remained" id="" placeholder="Loan Payment Remainded" class="contact-txt" value="<?php echo $loan_payment_remained; ?>" required>
                        
                        <label for="loan_full_payment_due_date" class="contact-txt" style= "border:none;" >Loan Full Payment Due Date</label>

                        <input type="date" name="loan_full_payment_due_date" id="" placeholder="Loan Full Payment Due Date" class="contact-txt" value="<?php echo $loan_full_payment_due_date; ?>" required>
                        
                        <label for="loan_days_per_installment" class="contact-txt" style= "border:none;" >Loan Days per Installment</label>

                        <input type="text" name="loan_days_per_installment" id="" placeholder="Loan Days per Installment" class="contact-txt" value="<?php echo $loan_days_per_installment; ?>" required>
                    
                        <input type="submit" id="btn_submit" value="UPDATE" class="contact-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>

<!DOCTYPE html>
<?php

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])) {
    header("Location: bank_login.php?error=Please Login First!");
}

$current_id = $_GET["customer_nic"];
$mortgage_id = $_GET["mortgage_id"];

$sql = "SELECT * FROM mortgage_table WHERE customer_nic = '$current_id'";

$result = mysqli_query($conn, $sql);

$res = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result)) {

    $mort_id = $res["mortgage_id"];
    $mort_desc = $res["mortgage_item_description"];
    $mort_val = $res["mortgage_item_value"];
    $mort_amount = $res["mortgage_amount"];
    $mort_inte = $res["mortgage_interest_rate"];
    $mort_inte_amount = $res["mortgage_interest_amount"];
    $mort_full_amount = $res["mortgage_full_amount"];
    $mort_installments = $res["mortgage_payment_installments"];
    $mort_monthly_pay = $res["mortgage_monthly_payment_amount"];
    $mort_pay_remaind = $res["mortgage_payment_remained"];
    $mort_days_per_ins = $res["mortgage_days_per_installment"];
    $mort_due_date = $res["mortgage_full_payment_due_date"];
}

?>

<html lang="en">

<head>
    <title>Update Data</title>

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
                <h3>EDITING DETAILS OF MORTGAGE ID  <?php echo $mort_id; ?> OF <?php echo $current_id; ?></h3><br>
                <form action="customer_data_updater.php?crnt_customer_nic=<?php echo $current_id; ?>" method="POST">
                    <div class="contact-form-inputs">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?>
                            </p>
                        <?php } ?>

                        <input type="text" name="mortgage_id" id="mortgage_id" placeholder="First Name" class="contact-txt" value="<?php echo $mort_id; ?>" required>
                        
                        <label for="mortgage_item_description" class="contact-txt" style= "border:none;" >mortgage_item_description</label>
                        <textarea name="mortgage_item_description" id="" cols="30" rows="10" class="contact-txt"><?php echo $mort_desc;?></textarea>

                        <label for="mortgage_item_value" class="contact-txt" style= "border:none;" >mortgage_item_value</label>
                        <input type="text" name="mortgage_item_value" id="" placeholder="Last Name" class="contact-txt" value="<?php echo $mort_val; ?>" required>

                        <label for="mortgage_amount" class="contact-txt" style= "border:none;" >mortgage_amount</label>
                        <input type="text" name="mortgage_amount" id="mortgage_amount" placeholder="Last Name" class="contact-txt" value="<?php echo $mort_amount; ?>" required>

                        <label for="mortgage_interest_rate" class="contact-txt" style= "border:none;" >mortgage_interest_rate</label>
                        <input type="text" name="mortgage_interest_rate" id="mortgage_interest_rate" placeholder="Last Name" class="contact-txt" value="<?php echo $mort_inte; ?>" required>

                        <label for="mortgage_interest_amount" class="contact-txt" style= "border:none;" >mortgage_interest_amount</label>
                        <input type="text" name="mortgage_interest_amount" id="mortgage_interest_amount" placeholder="Last Name" class="contact-txt" value="<?php echo $mort_inte_amount; ?>" required>

                        <label for="mortgage_full_amount" class="contact-txt" style= "border:none;" >mortgage_full_amount</label>
                        <input type="text" name="mortgage_full_amount" id="mortgage_full_amount" placeholder="Last Name" class="contact-txt" value="<?php echo $mort_full_amount; ?>" required>

                        <label for="mortgage_payment_installments" class="contact-txt" style= "border:none;" >mortgage_payment_installments</label>
                        <input type="text" name="mortgage_payment_installments" id="mortgage_payment_installments" placeholder="Last Name" class="contact-txt" value="<?php echo $mort_installments; ?>" required>

                        <label for="mortgage_monthly_payment_amount" class="contact-txt" style= "border:none;" >mortgage_monthly_payment_amount</label>
                        <input type="text" name="mortgage_monthly_payment_amount" id="mortgage_monthly_payment_amount" placeholder="Last Name" class="contact-txt" value="<?php echo $mort_monthly_pay; ?>" required>

                        <label for="mortgage_payment_remained" class="contact-txt" style= "border:none;" >mortgage_payment_remained</label>
                        <input type="text" name="mortgage_payment_remained" id="mortgage_payment_remained" placeholder="Last Name" class="contact-txt" value="<?php echo $mort_pay_remaind; ?>" required>

                        <label for="mortgage_days_per_installment" class="contact-txt" style= "border:none;" >mortgage_days_per_installment</label>
                        <input type="text" name="mortgage_days_per_installment" id="mortgage_days_per_installment" placeholder="Last Name" class="contact-txt" value="<?php echo $mort_days_per_ins; ?>" required>
                        
                        <label for="mortgage_full_payment_due_date" class="contact-txt" style= "border:none;" >mortgage_full_payment_due_date</label>
                        <input type="text" name="mortgage_full_payment_due_date" id="mortgage_full_payment_due_date" placeholder="Last Name" class="contact-txt" value="<?php echo $mort_due_date; ?>" required>


                        <input type="submit" id="btn_submit" value="UPDATE" class="contact-btn">
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
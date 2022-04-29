<!DOCTYPE html>
<?php

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])) {
    header("Location: bank_login.php?error=Please Login First!");
}

$current_id = $_GET["customer_nic"];
$savings_id = $_GET["savings_id"];

$sql = "SELECT * FROM savings_table WHERE customer_nic = '$current_id'and savings_id = '$savings_id'";

$result = mysqli_query($conn, $sql);

$res = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result)) {

    $savings_id = $res["savings_id"];
    $savings_type = $res["savings_type"];
    $savings_amount = $res["savings_amount"];
    $savings_interest_rate = $res["savings_interest_rate"];
    $savings_interest_amount = $res["savings_interest_amount"];
    $savings_full_amount = $res["savings_full_amount"];
    $savings_issued_date = $res["savings_issued_date"];
}

?>

<html lang="en">

<head>
    <title>Edit Savings Details</title>

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
                <h3>EDITING DETAILS OF SAVNIGS ID  <?php echo $savings_id; ?> OF <?php echo $current_id; ?></h3><br>
                <form action="customer_data_updater.php?crnt_customer_nic=<?php echo $current_id; ?>" method="POST">
                    <div class="contact-form-inputs">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?>
                            </p>
                        <?php } ?>
                        
                        <!-- Savnigs Type -->

                        <label for="savings_amount" class="contact-txt" style= "border:none;" >Saving Amount</label>
                        
                        <input type="text" name="savings_amount" id="" placeholder="Saving Amount" class="contact-txt" value="<?php echo $savings_amount; ?>" required>


                        <label for="savings_interest_rate" class="contact-txt" style= "border:none;" >Savings Interest Rate</label>

                        <input type="text" name="savings_interest_rate" id="" placeholder="Savings Interest Rate" class="contact-txt" value="<?php echo $savings_interest_rate; ?>" required>



                        <label for="savings_interest_amount" class="contact-txt" style= "border:none;" >Savings Interest Amount</label>

                        <input type="text" name="savings_interest_amount" id="" placeholder="Savings Interest Amount" class="contact-txt" value="<?php echo $savings_interest_amount; ?>" required>
                        
                        
                        <label for="savings_full_amount" class="contact-txt" style= "border:none;" >Savings Full Amount</label>

                        <input type="text" name="savings_full_amount" id="" placeholder="Savings Full Amount" class="contact-txt" value="<?php echo $savings_full_amount; ?>" required>
                        
                        
                        <label for="savings_issued_date" class="contact-txt" style= "border:none;" >Savings Issued Date</label>

                        <input type="date" name="savings_issued_date" id="" placeholder="Savings Issued Date" class="contact-txt" value="<?php echo $savings_issued_date; ?>" required>
                    
                        <input type="submit" id="btn_submit" value="UPDATE" class="contact-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>

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